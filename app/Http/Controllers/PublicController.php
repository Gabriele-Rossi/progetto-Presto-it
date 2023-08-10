<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function welcome() {

        $products = Product::where('is_accept', true)->take(6)->orderBy('created_at' , 'desc')->get();
        
        return view('welcome' , compact('products'));
    }
    
    public function categoryShow(Category $category){  

        $products= $category->products()->where('is_accept', true)->get(); 

        return view('product.category', compact('products'), compact('category'));
    }

    public function provaNavbar(){
        return view('provaSidebar');
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back(); 
    }

    
    

}
