<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public function searchProduct(Request $request){
        $products = Product::search($request->searched)->where('is_accept' , true)->paginate(9);

        return view('product/indexSearch', compact('products'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('is_accept', true)->paginate(9);
        return view('product/index', compact('products'));
    }

    public function bestSellerCategories($name){
        $category = Category::where('name', $name)->first();
        $products= $category->products()->where('is_accept', true)->get(); 
        return view('product/bestSellerCategories', compact('products'), compact('category'));
    }

    public function create()
    {

        return view('product/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function productUser(){
        $products= Product::where('user_id', Auth::user()->id)->get(); 
        return view('product/user', compact('products')); 
    }
}
