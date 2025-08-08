<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){

        return view('product.index', ['products' => Product::all()]);
    }

    public function create(){
        return view('product.create');
    }

    public function store(StoreProductRequest $req){
        $products = $req->validated();
        $products['user_id'] = Auth::id();

       Product::create($products);
       return redirect('dashboard');

    }

    public function edit(Product $product){
        return view('product.edit', compact('product'));
    }

     public function update(Product $product, Request $request){
        $product->update($request->validate([
            'name'          => ['required'],
            'description'   => ['required'],
            'price'         => ['required'],
            'inventory'     => ['required'],
        ]));

        return back()->with('message', "Successfully updated");

    }

    public function destroy(Product $product){
        $product->delete();
        return back()->with('message', "$product->name Successfully  deleted");
    }
}
