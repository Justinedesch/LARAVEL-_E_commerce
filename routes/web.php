<?php

use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogueController;
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

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})

->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//
//require __DIR__.'/auth.php';


Route::get('/product/{id}', [ProductController::class, 'getProduit'])->name('product.show');

//Route::get('/catalogue', [CatalogueController::class, 'catalogue']);

Route::get('/panier',[CartController::class,"index"])->name('cart.index');

Route::get('/contact',[ContactController::class,"index"])->name('contact.index');

Route::get('/catalogue', [CatalogueController::class,"getall"])->name('catalogue.index');

Route::get('/index',[ProductController::class,'index'])->name('product.index');


Route::get('/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/create', [ProductController::class, 'store'])->name('product.store');


Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/edit/{product}', [ProductController::class, 'update'])->name('product.update');


Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');





