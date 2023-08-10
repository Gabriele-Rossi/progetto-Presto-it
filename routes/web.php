<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'welcome'])->name('homePage');

Route::get('/product/category/{category}' , [PublicController::class, 'categoryShow'])->name('product.category');

Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/index/products', [ProductController::class, 'index'])->name('product.index');


Route::middleware(['auth'])->group(function(){

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::get('/become/revisor',[RevisorController::class, 'becomeRevisor'])->name('become.revisor');

Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit'); 

Route::get('product/user', [ProductController::class, 'productUser'])->name('product.user'); 


});

Route::middleware(['isRevisor'])->group(function(){
    
    // Home Revisor

    Route::get('revisor/indexRevisor', [RevisorController::class, 'indexRevisor'])->name('revisor.index');   
    
    
    // Rotta Accetta Annuncio
    Route::patch('product/accept/{product_to_check}', [RevisorController::class, 'acceptProduct'])->name('revisor.accept'); 
    
    // Rotta Rifiuta Annuncio
    Route::patch('product/reject/{product_to_check}', [RevisorController::class, 'rejectProduct'])->name('revisor.reject');

    Route::get('/product/indexRevisorAccepted', [RevisorController::class, 'revisorAcceptIndex'])->name('revisor.acceptIndex'); 

    Route::patch('product/cancel/operation/{product}', [RevisorController::class, 'cancelOperation'])->name('revisor.cancelOperation'); 
});

Route::get('/product/indexSearch', [ProductController::class,'searchProduct'])->name('product.search');

// Route::get('/product/provaSideBar' , [PublicController::class, 'provaNavbar'])->name('product.prova');

Route::get('/product/bestSellerCategories/{name}' , [ProductController::class, 'bestSellerCategories'])->name('product.bestSellerCategories');

Route::post('/language/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale'); 





