<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{

   public function productdetail ($id) {
       
        $product = DB::selectOne("select * from products where id = $id");
        

       if (! $product) {
        abort(404);
       }
        return view('productdetail ',

        ['product' => $product,
        'id' => $id,
    
    ]);

     }
}


//class ProductController extends Controller
//{

    //public function productdetail ($id) {
       
       // $product = DB::selectOne("select * from products where id = $id");
       // dump($product);

     //  if (! $product) {
     //   abort(404);
     //  }
     //   return view('productdetail ',

     //   ['product' => $product,
      //  'id' => $id,
    
 //   ]);

    //  }
//}




 //    function productdetail($id)
//{
  //  $product = Product::findOrFail($id);

   // return view('productdetail', compact('product'));
//}