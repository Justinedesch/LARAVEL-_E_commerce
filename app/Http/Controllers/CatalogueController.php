<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
    public function getall() {
        $products = DB::select('select * from products');

        return view('catalogue',['products'=>$products]);
      }


}

