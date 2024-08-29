<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller{


    public function index()
    {
        $products = Product::query()->latest()->paginate(15);
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::query()->get(['id','name']);
        return view('admin.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);

        $data = $request->only([
            'name','category_id','description','price'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('products-images/'), $imageName);
            $data['image'] = $imageName;
        }
        $data['status'] = $request->status ? 'active' : 'inactive';
        $product = Product::query()->create($data);
        if ($product){
            return redirect()->route('products.create')->with('product-created','');
        }else{
            return redirect()->back();
        }
    }

    public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::query()->get(['id','name']);
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        $data = $request->only([
            'name','category_id','description','price'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('products-images/'), $imageName);
            $data['image'] = $imageName;
        }
        $data['status'] = $request->status ? 'active' : 'inactive';
        $product = $product->update($data);
        if ($product){
            return redirect()->route('products.index')->with('product-updated','');
        }else{
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $product = Product::destroy($request->id);
        if ($product){
            return redirect()->route('products.index')->with('product-deleted','');
        }else{
            return redirect()->back();
        }
    }
}
