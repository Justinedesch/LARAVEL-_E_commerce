<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{

    public function productdetail ( $id) {
        return view('productdetail', [
            'id' => $id
        ]);
      }

    public function productOfCat(string $nameCat): Application|View|Factory|Redirector|RedirectResponse
    {
        $cat = Categories::where('name', $nameCat)->first();

        if (!empty($cat))
        {
            $products = Product::with('category')->where('categories_id',$cat->id)->get();
            return view('products_by_cat', [ 'products' => $products, 'cat' => $cat ]);
        } else {
            return redirect('/');
        }
    }
}
