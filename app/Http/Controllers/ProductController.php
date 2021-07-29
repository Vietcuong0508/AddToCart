<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $list = Product::all();
        return view('list', ['list' => $list]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->fill($request->all());
        $products->save();
        return redirect('list');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $detail = Product::find($id);
        return view('edit', [
            'edit'=>$detail
        ]);
    }

    public function update(Request $request, $id)
    {
        $detail = Product::find($id);
        $detail->update($request->all());
        $detail->save();
        return redirect('list');
    }

    public function destroy($id)
    {
        $detail = Product::find($id);
        $detail->delete();
        return redirect('list');
    }
}
