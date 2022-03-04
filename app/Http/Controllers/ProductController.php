<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //to show requeird  product form user
    public function index()
    {
        $products = Product::latest()->paginate(4);
        return view('product.index', compact('products'));
    }

    public function trashproducts()
    {
        //     $products = Product::withTrashed()->latest()->paginate(4);
        $products = Product::onlyTrashed()->latest()->paginate(4);
        return view('product.trash', compact('products'));
    }

    //to create a new product
    public function create()
    {
        return view('product.create');
    }

    //to store information a new create product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required'
        ]);
        $product = Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }
    //to show all products
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    //to edit the product
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required'
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
    public function softDelete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function backSoftDelete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
    public function deleteForEver($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('product.trash')->with('success', 'Product deleted successfully');
    }
}
