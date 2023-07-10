<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productdetail ($id) {
       
        $product = DB::selectOne("select * from products where id = $id");
       // dump($product);

       if (! $product) {
        abort(404);
       }
        return view('productdetail ',

        ['product' => $product,
        'id' => $id,
    
    ]);

      }
}

//$product = DB::table('products')->where('id', $productId)->first();
