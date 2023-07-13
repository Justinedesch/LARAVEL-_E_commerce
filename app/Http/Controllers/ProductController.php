<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProductController extends Controller
{
//    public function getallproducts() {
//        $products = DB::select('select * from products');
//
//        return view('catalogue',['products'=>$products]);
//    }

    public function getProduit($id)
    {

//       $product = DB::table('products')->where('id',$id)->first();

        $product = Product::find($id);


        return view('productdetail', ['product' => $product]);
    }


    public function index(): View
    {
        $products = Product::all();

        return view('product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' =>  'required|integer|min:0',

        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }





        $product = new Product();
        $product->name = $request->input('name');

//        @if ('name'==null);
//
//    @endif

        $product->description = $request->input('detail');
        $product->price = $request->input('price');
        $product ->save();
return redirect()->route('product.index');


//
//        return redirect()->route('product.index')
//            ->with('success', 'Product created successfully.');
    }







//    public function order()
//    {
//        return view('order');
//    }


//    public function addToCart($id)
//    {
//        $product = Product::findOrFail($id);
//
//        $order = session()->get('order', []);
//
//        if(isset($order[$id])) {
//            $cart[$id]['quantity']++;
//        } else {
//            $order[$id] = [
//                "name" => $product->name,
//                "quantity" => 1,
//                "price" => $product->price,
//
//            ];
//        }
//
//        session()->put('order', $order);
//        return view('order');
//    }
//




    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
      {
          $product = Product::find($id);
        return view('product.edit',  ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $product->name = $request->name;
        $product->description = $request->detail;

//        $request->validate([
//            'name' => 'required',
//            'detail' => 'required',


        $product->update();


        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}
