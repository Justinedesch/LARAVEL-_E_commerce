<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;



//class CatalogueController extends Controller
//{
  // function catalogue() {
    //  $products = DB::select("select * from products");
       
      //  return view('catalogue', ['products' => $products]);

      //return view('catalogue', ['catalogue' => $products]);
//      }
//}




//class CatalogueController extends Controller
//{
  //  function catalogue() {

//      $products = Product::orderBy('name')->get();

//     return view('catalogue', compact('products'));
    
  //  }
//}



class CatalogueController extends Controller
{
 function catalogue()
{
    $products = Product::orderBy('price')->get();

   return view('catalogue', compact('products'));
}
 }

