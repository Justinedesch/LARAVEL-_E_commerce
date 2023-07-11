<?php

namespace App\Http\Controllers;
use App\Models\Product;
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

//       $product = DB::table('products')->where('id',$id)->first();

$product = Product::find($id);


        return view('productdetail',['product'=>$product]);
    }

}


//if (! isset($produits[$IDproduit])) {
//    throw new Error('Mauvais identifiant produit');
//}
//
//return $produits[$IDproduit];
//}
