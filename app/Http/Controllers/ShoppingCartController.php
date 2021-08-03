<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->get('productId');
        $productQuantity = $request->get('productQuantity');
        $action = $request->get('cartAction');
        $product = Product::find($productId);
        if ($product == null) {
            return view('404');
        }
        $shoppingCart = null;
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        $cartItem = null;
        $message='Thêm sản phẩm thành công';
        if (!array_key_exists($productId, $shoppingCart)) {
            $cartItem = new \stdClass();
            $cartItem->id = $product->id;
            $cartItem->name = $product->name;
            $cartItem->unitPrice = $product->unitPrice;
            $cartItem->images = $product->images;
            $cartItem->quantity = intval($productQuantity);
        } else {
            $cartItem = $shoppingCart[$productId];
            if ($action != null && $action == 'update') {
                $cartItem->quantity = $productQuantity;
                $message='Update sản phẩm thành công';
            } else {
                $cartItem->quantity += $productQuantity;
            }
        }
        $shoppingCart[$productId] = $cartItem;
        Session::put('shoppingCart', $shoppingCart);
        Session::flash('success-msg', 'thêm sản phẩm vào giỏ hàng thành công!');
        return redirect('show')->with('success-msg', $message);
    }

    public function show()
    {
        $shoppingCart = Session::get('shoppingCart');
        return view('cart', [
            'shoppingCart'=>$shoppingCart
        ]);
    }

    public function remove(Request $request)
    {
        $productId = $request->get('productId');
        $shoppingCart = null;
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
            unset($shoppingCart[$productId]);
            Session::put('shoppingCart', $shoppingCart);
            return redirect('show')->with('message-delete', 'Xoá thành công');
        }
    }

    public function save(Request $request) {
        if (!Session::has('shoppingCart') || count(Session::get('shoppingCart')) == 0) {
            Session::flash('error-msg', 'Hiện tại không có sản phẩm napf trong giỏ hàng!');
            return redirect('/products');
        }
        $shoppingCart = Session::get('shoppingCart');
        $order = new Order();
        $order->totalPrice= 0;
        $order->customerId= 0;
        $order->shipName= $request->get('shipName');
        $order->shipPhone= $request->get('shipPhone');
        $order->shipAddress= $request->get('shipAddress');
        $order->note= $request->get('note');
        $order->isCheckout= false;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->status = 0;
        $orderDetails = [];
        $messageError = '';
        foreach ($shoppingCart as $cartItem) {
            $product = Product::find($cartItem->id);
            if ($product == null) {
                $messageError = 'Có lỗi xảy ra, sản phẩm với id' . $cartItem->id . 'không tồn tại hoặc đã bị xoá';
                break;
            }
            $orderDetail = new OrderDetail();
            $orderDetail->productId = $product->id;
            $orderDetail->unirPrice = $product->price;
            $orderDetail->quantity = $cartItem->quantity;
            $order->totalPrice += $orderDetail->quantity * $orderDetail->unirPrice;
            array_push($orderDetails, $orderDetail);
        }
        if (count($orderDetails) == 0) {
            Session::flash('error-msg', $messageError);
            return redirect('/list');
        }
        try {
            DB::beginTransaction();
            $order->save();
            $orderDetailArray = [];
            foreach ($orderDetails as $orderDetail) {
                $orderDetail->orderId = $order->id;
                array_push($orderDetailArray, $orderDetail->toArray());
            }
            OrderDetail::insert($orderDetailArray);
            DB::commit();
            Session::forget('shoppingCart');
            Session::flash('success-msg', 'Lưu đơn hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error-msg', 'Lưu đơn hàng thất bại!');
        }
        return redirect('/list');
    }
}
