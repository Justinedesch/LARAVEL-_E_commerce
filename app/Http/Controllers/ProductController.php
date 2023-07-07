<?php

namespace App\Http\Controllers;
use Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//    public function getallproducts() {
//        $products = DB::select('select * from products');
//
//        return view('catalogue',['products'=>$products]);
//    }

   public function getProduit($id) {

//        $product = DB::select('select * from products where id =:id',['id'=>$id]);
       $product = DB::table('products')->where('id',$id)->first();

//        if (! isset($product[$id])) {
//            throw new Error('Mauvais identifiant produit');
//        }

        return view('productdetail',['product'=>$product]);
    }

}
