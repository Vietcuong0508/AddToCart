<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function save(Request $request){
        if(!Cart::content() || Cart::count() == 0){
            return redirect()->route('listProduct')->with('error-msg','Hiện tại không có sản phẩm nào trong giỏ hàng!');
        }
        $cart = Cart::content();
        $order = new Order();
        $order->totalPrice = 0;
        $order->customerId = 1;
        $order->shipName = $request->shipName;
        $order->shipPhone = $request->shipPhone;
        $order->shipAddress = $request->shipAddress;
        $order->note = $request->note;
        $order->isCheckout = false;

        $orderDetails = [];
        $messageError = '';
        foreach ($cart as $item){
            $product = Product::find($item->id);
            if($product == null){
                $messageError = 'Có lỗi xảy ra, sản phẩm với id'.$item->id.'không tồn tại hoặc đã bị xóa!';
                break;
            }
            $orderDetail = new OrderDetail();
            $orderDetail->productId = $product->id;
            $orderDetail->unitPrice = $product->price;
            $orderDetail->quantity = $item->qty;
            $order->totalPrice += $orderDetail->quantity*$orderDetail->unitPrice;
            array_push($orderDetails,$orderDetail);
        }
        if(count($orderDetails) == 0){
            return redirect()->route('listProduct')->with('error-msg',$messageError);
        }
        try {
            DB::beginTransaction();
            $order->save();
            $orderDetailArray = [];
            foreach ($orderDetails as $orderDetail){
                $orderDetail->orderId = $order->id;
                array_push($orderDetailArray,$orderDetail->toArray());
            }
            OrderDetail::insert($orderDetailArray);
            DB::commit();
            Cart::destroy();
        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }
        return redirect()->route('listProduct');
    }
}
