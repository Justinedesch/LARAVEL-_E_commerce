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
use App\Http\Controllers\BackOffice\GameplayController as adminGameplay;
use App\Http\Controllers\BackOffice\CategoryController as adminCategory;
use App\Http\Controllers\BackOffice\UserController as adminUser;
use App\Http\Controllers\BackOffice\AddressController as adminAddress;
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
        Route::get('/delete/{id}', [adminProduct::class, 'destroy'])->name('products.destroy');
        Route::get('/create', [adminProduct::class, 'create'])->name('products.create');
        Route::post('/store', [adminProduct::class, 'store'])->name('products.store');
        Route::get('/show/{id}', [adminProduct::class, 'show'])->name('products.show');
    });

    Route::group(['prefix' => 'admin/gameplays'], function(){
        Route::get('/', [adminGameplay::class, 'index'])->name('gameplays.index');
        Route::get('/edit/{id}', [adminGameplay::class, 'edit'])->name('gameplays.edit');
        Route::post('/update/{id}', [adminGameplay::class, 'update'])->name('gameplays.update');
        Route::get('/delete/{id}', [adminGameplay::class, 'destroy'])->name('gameplays.destroy');
        Route::get('/create', [adminGameplay::class, 'create'])->name('gameplays.create');
        Route::post('/store', [adminGameplay::class, 'store'])->name('gameplays.store');
        Route::get('/show/{id}', [adminGameplay::class, 'show'])->name('gameplays.show');
    });

    Route::group(['prefix' => 'admin/categories'], function(){
        Route::get('/', [adminCategory::class, 'index'])->name('categories.index');
        Route::get('/edit/{id}', [adminCategory::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [adminCategory::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [adminCategory::class, 'destroy'])->name('categories.destroy');
        Route::get('/create', [adminCategory::class, 'create'])->name('categories.create');
        Route::post('/store', [adminCategory::class, 'store'])->name('categories.store');
        Route::get('/show/{id}', [adminCategory::class, 'show'])->name('categories.show');
    });

    Route::group(['prefix' => 'admin/users'], function(){
        Route::get('/', [adminUser::class, 'index'])->name('users.index');
        Route::get('/edit/{id}', [adminUser::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [adminUser::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [adminUser::class, 'destroy'])->name('users.destroy');
        Route::get('/create', [adminUser::class, 'create'])->name('users.create');
        Route::post('/store', [adminUser::class, 'store'])->name('users.store');
        Route::get('/show/{id}', [adminUser::class, 'show'])->name('users.show');
    });

    Route::group(['prefix' => 'admin/addresses'], function(){
        Route::get('/', [adminAddress::class, 'index'])->name('addresses.index');
        Route::get('/edit/{id}', [adminAddress::class, 'edit'])->name('addresses.edit');
        Route::post('/update/{id}', [adminAddress::class, 'update'])->name('addresses.update');
        Route::get('/delete/{id}', [adminAddress::class, 'destroy'])->name('addresses.destroy');
        Route::get('/create', [adminAddress::class, 'create'])->name('addresses.create');
        Route::post('/store', [adminAddress::class, 'store'])->name('addresses.store');
        Route::get('/show/{id}', [adminAddress::class, 'show'])->name('addresses.show');
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
