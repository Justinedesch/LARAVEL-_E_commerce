<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function getProductForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("backoffice");
    }
}




































//     class AddController extends Controller
//     {
//public function addProduct(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
//{
//    return view("backoffice");
//}
//  }
//
//
//
//  class ModifyController extends Controller
//  {
//
//      public function modifyProduct($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
//      {
//                      }
//  }
//
//
//  public function getProduit($id) {
//
//   $product = Product::find($id);
//
//  }
//
//
//
//
//  class DeleteController extends Controller
//  {
//public function deleteProduct($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
//
//{
//$product = Product::all($id);
//$product ->delete();
//
//   return redirect('/backoffice')->with('success', 'produit supprimé avec succèss');
//
//}
//}


