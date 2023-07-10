<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Gameplay;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{

    public function productdetail (string $nameProduct): View|Application|Factory|Redirector|RedirectResponse
    {
        $product = Product::where('name', $nameProduct)->first();

        if (!empty($product))
        {
            $imgsGp = Gameplay::with('product')->where('products_id', $product->id)->get();
            return view('productdetail', [ 'product' => $product, 'imgsGp' => $imgsGp] );
        } else {
            return redirect('/');
        }
      }

    public function productOfCat(string $cat): Application|View|Factory|Redirector|RedirectResponse
    {
        $category = Categories::where('name', $cat)->first();

        if (!empty($category))
        {
            $products = Product::with('category')->where('categories_id',$category->id)->get();
            return view('products_by_cat', [ 'products' => $products, 'cat' => $category ]);
        } else {
            return redirect('/');
        }
    }
}
