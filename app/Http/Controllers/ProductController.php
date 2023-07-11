<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Error;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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

        return view('index', compact('products'));

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
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->detail;

        $product ->save;
return redirect()->route('catalogue.index');

//
//        return redirect()->route('product.index')
//            ->with('success', 'Product created successfully.');
    }

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
    public function edit(Product $product): View
    {
        return view('product.edit', compact('products'));
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

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}
