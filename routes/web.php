<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\TestController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BackOffice\ProductController as adminProduct;
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

Route::get('/', [HomeController::class, 'index'])->name('accueil.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::group(['prefix' => 'admin/products'], function(){
        Route::get('/', [adminProduct::class, 'index'])->name('products.index');
        Route::get('/edit/{id}', [adminProduct::class, 'edit'])->name('products.edit');
        Route::post('/update/{id}', [adminProduct::class, 'update'])->name('products.update');
        Route::post('/delete/{id}', [adminProduct::class, 'destroy'])->name('products.destroy');
        Route::get('/create', [adminProduct::class, 'create'])->name('products.create');
        Route::post('/store', [adminProduct::class, 'store'])->name('products.store');
        Route::get('/show/{id}', [adminProduct::class, 'show'])->name('products.show');
    });
})->middleware(['AdminMiddleware', 'roles' => 'ROLE_ADMIN']);

require __DIR__.'/auth.php';

Route::get('/contact',[ContactController::class,"index"])->name('contact.index');

Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue.index');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/panier',[CartController::class,"index"])->name('cart.index');

//Route::get('/test',[TestController::class,"getAllUsers"]);
//Route::get('/test1/{id}',[TestController::class,"getUserInfo"]);
