<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;


class CatalogueController extends Controller
{
 function catalogue()
{
    $products = Product::orderBy('price')->get();

   return view('catalogue', compact('products'));
}
 }

