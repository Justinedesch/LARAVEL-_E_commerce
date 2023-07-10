<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    function catalogue() {
      $products = DB::select("select * from products");
       
        return view('catalogue', ['products' => $products]);

      //return view('catalogue', ['catalogue' => $products]);
      }
}