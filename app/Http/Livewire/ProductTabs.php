<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductTabs extends Component
{
    public function render()
    {
        $products= Product::where('user_id', Auth::user()->id)->get(); 
        return view('livewire.product-tabs', compact('products'));
    }

    public function deleteProduct($id){
        $product= Product::findOrFail($id)->delete(); 
    }
}
