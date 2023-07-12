<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index(): View|Application|Factory
    {
        $products = Product::with('category')->get();
        return view('catalogue', [ '_products' => $products ]);
    }
}
