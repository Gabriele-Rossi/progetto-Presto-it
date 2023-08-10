<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\BecomeRevisorMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function indexRevisor(){
        
        $product_to_check= Product::where('is_accept', null)->where('user_id', '!=', Auth::user()->id)->first(); 
        return view('revisor/indexRevisor', compact('product_to_check')); 
    }

    public function acceptProduct (Product $product_to_check){
        $product_to_check->setAccept(true);
        return redirect()->back()->with('message', 'Annuncio Accettato!');
    }

    public function rejectProduct (Product $product_to_check){
        $product_to_check->setAccept(false);
        return redirect()->back()->with('message', 'Annuncio Rifiutato!');
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisorMail(Auth::user()));
        return redirect('/')->with('message', 'Candidatura inviata con successo!');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ['email'=>$user->email]);
        return redirect('/')->with('message', $user->name . " " . "è diventato revisore");
    }

    public function revisorAcceptIndex(){
        $products= Product::whereNotNull('is_accept')->take(10)->orderBy('created_at' , 'desc')->get();
        return view('revisor.indexAccept', compact('products')); 
    }

    public function cancelOperation(Product $product){
        $product->setAccept(null);
        return redirect()->back()->with('message', 'Revisone annullata con successo!');
    }
}


