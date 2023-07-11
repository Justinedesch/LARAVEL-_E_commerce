<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);

        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }
}










//namespace App\Http\Controllers;
//
//use App\Models\Product;
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Contracts\View\View;
//use Illuminate\Foundation\Application;
//use Illuminate\Http\Request;
//
//class BackofficeController extends Controller
//{
//    public function getProductForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
//    {
//        return view("backoffice");
//    }
//
//
//    public function store(Request $request)
//    {
////{$product =new product();
//        $product = new Product();
////[
////        'product' => [
////            'iD' => $request->input('id'),
////            'name'=>$request->input('name'),
////            'description' => $request->input('description'),
////            'price' => $request->input('price'),
////            'weight' => $request->input('weight'),
////            'image' => $request->input('image'),
////            'quantity' => $request->input('quantity'),
////            'available' => $request->input('available'),
////            'categorie_id' => $request->input('categorie_id'),
////        ],)
////    ];
//
//        return redirect('catalogue');
//
//    }
//
//
//    public function edit(Request $request)
//    {
//        $id = [
//            'product' => [
//                'iD' => $request->get('id'),
//                'name' => $request->get('name'),
//                'description' => $request->get('description'),
//                'price' => $request->get('price'),
//                'weight' => $request->get('weight'),
//                'image' => $request->get('image'),
//                'quantity' => $request->get('quantity'),
//                'available' => $request->get('available'),
//                'categorie_id' => $request->get('categorie_id'),
//            ]
//        ];
//
//        return redirect('catalogue');
//    }
//
//
//    public function destroy(Request $request)
//    {
////        $id = [
////            'product' => [
////                'iD' => $request->delete('id'),
////                'name' => $request->delete('name'),
////                'description' => $request->delete('description'),
////                'price' => $request->delete('price'),
////                'weight' => $request->delete('weight'),
////                'image' => $request->delete('image'),
////                'quantity' => $request->delete('quantity'),
////                'available' => $request->delete('available'),
////                'categorie_id' => $request->delete('categorie_id'),
////            ],
//        return redirect('catalogue');
//
//
//    }
//
//}
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
////     class AddController extends Controller
////     {
////public function addProduct(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
////{
////    return view("backoffice");
////}
////  }
////
////
////
////  class ModifyController extends Controller
////  {
////
////      public function modifyProduct($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
////      {
////                      }
////  }
////
////
////  public function getProduit($id) {
////
////   $product = Product::find($id);
////
////  }
////
////
////
////
////  class DeleteController extends Controller
////  {
////public function deleteProduct($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
////
////{
////$product = Product::all($id);
////$product ->delete();
////
////   return redirect('/backoffice')->with('success', 'produit supprimé avec succèss');
////
////}
////}
//
//
