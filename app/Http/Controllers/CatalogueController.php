<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    function catalogue(): View|Application|Factory
    {
        $products = Product::with('category')->get();
        return view('catalogue', [ 'products' => $products ]);
    }
}
