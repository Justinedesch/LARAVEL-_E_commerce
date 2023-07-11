<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CatalogueController extends Controller
{


    public function getall() {
        $products = DB::select('select * from products');

        $products = Product::all();
//        $products = Product::orderBy('name','desc')->get();
//        $products = Product::orderBy('price','asc')->get();

        return view('catalogue',['products'=>$products]);
      }


}

