<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\BackofficeController;
use App\Models\Backoffice;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RelationController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Route::prefix('backoffice')->group(function () {
 //   Route::get('/monsite.com/backoffice', function () {
 //       return view('backoffice.dashboard');
 //   })->name('backoffice.dashboard');
//});
    //Route::get('/catalogue', function () {
    //    return view('backoffice.catalogue');
   // })->name('backoffice.catlogue');

   // Route::get('/customers', function () {
  //      return view('backoffice.products');
  //  })->name('backoffice.products');

   // Route::get('/orders', function () {
    //    return view('backoffice.orders');
  //  })->name('backoffice.orders');

 //   Route::get('/categories', function () {
    //    return view('backoffice.categories');
  //  })->name('backoffice.categories');

    
//});






require __DIR__.'/auth.php';


Route::get('/product/{id}', [ProductController::class, 'productdetail',]);

Route::get('/catalogue', [CatalogueController::class, 'catalogue',]);

Route::get('/panier',[CartController::class,"index"]);

Route::get('/contact',[ContactController::class,"index"]);

Route::get('/backoffice', [BackofficeController::class, 'backOffice']);

Route::delete('/delete/{id}', [BackofficeController::class, 'delete'])->name('delete.product');

Route::get('/edit/{id}', [BackofficeController::class, 'showData']);

Route::put('/edit/{id}', [BackofficeController::class, 'update'])->name('update.product');

Route::post('/add', [BackofficeController::class, 'addProduct'])->name('add.product');

Route::get('/add/form', [BackofficeController::class, 'showform']);





Route::get('/data', [RelationController::class, 'index']);
Route::get('/dataa', [RelationController::class, 'index_1']);


Route::get('/order', [RelationController::class, 'index_2']);
Route::get('/customer', [RelationController::class, 'index_3']);


Route::get('/products', [RelationController::class, 'index_4']);
Route::get('/orders', [RelationController::class, 'index_5']);