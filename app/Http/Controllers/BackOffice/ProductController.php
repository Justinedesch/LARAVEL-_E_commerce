<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductRepositoryInterface $productRepository): View|Application|Factory
    {
        $productsList = $productRepository->getAllProducts();
        return view('backoffice/products/bo_products', compact('productsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        return view('backoffice/products/product_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProductRepositoryInterface $productRepository): RedirectResponse
    {
        $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
            'description_title' => ['bail', 'required', 'string', 'max:255'],
            'description' => ['bail', 'required', 'string', 'min:1'],
            'price' => ['bail', 'required', 'integer','gte:0'],
            'isAvailable' => ['bail', 'required','in:0,1'],
            'weight' => ['bail', 'required', 'integer','gte:0'],
            'stock' => ['bail', 'required', 'integer','gte:0'],
            'discount' => ['bail', 'integer', 'nullable','gte:0']
        ]);

        $productRepository->createProduct([
            'name' => $request->name,
            'description_title' => $request->description_title,
            'description' => $request->description,
            'price' => $request->price,
            'isAvailable' => $request->isAvailable,
            'weight' => $request->weight,
            'stock' => $request->stock,
            'discount' => !empty($request->discount) ? $request->discount : null
        ]);

        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ProductRepositoryInterface $productRepository): View|Application|Factory
    {
        $productId = $request->route('id');
        $product = $productRepository->getProductById($productId);
        $gameplaysOfProduct = $productRepository->getGameplaysByProduct($productId);
        return view('backoffice/products/product_show', ['product' => $product, 'gameplays' => $gameplaysOfProduct]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ProductRepositoryInterface $productRepository): View|Application|Factory
    {
        $productId = $request->route('id');
        $product = $productRepository->getProductById($productId);
        return view('backoffice/products/product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductRepositoryInterface $productRepository): RedirectResponse
    {
        $request->validate([
            'name' => ['bail', 'nullable', 'string', 'max:255'],
            'description_title' => ['bail', 'nullable', 'string', 'max:255'],
            'description' => ['bail', 'nullable', 'string', 'min:1'],
            'price' => ['bail', 'nullable', 'integer','gte:0'],
            'isAvailable' => ['bail', 'in:0,1'],
            'image' => ['bail', 'nullable', 'string', 'max:255'],
            'alt' => ['bail', 'nullable', 'string', 'max:255'],
            'weight' => ['bail', 'nullable', 'integer','gte:0'],
            'stock' => ['bail', 'nullable', 'integer','gte:0'],
            'discount' => ['bail', 'integer', 'nullable','gte:0']
        ]);

        $productId = $request->route('id');
        $product = $productRepository->getProductById($productId);

        $productRepository->updateProduct($product->id, [
            'name' => !empty($request->name) ? $request->name : $product->name,
            'description_title' => !empty($request->description_title) ? $request->description_title : $product->description_title,
            'description' => !empty($request->description) ? $request->description : $product->description,
            'price' => !empty($request->price) ? $request->price : $product->price,
            'isAvailable' => (int)$request->isAvailable,
            'image' => !empty($request->image) ? $request->image : $product->image,
            'alt' => !empty($request->alt) ? $request->alt : $product->alt,
            'weight' => !empty($request->weight) ? $request->weight : $product->weight,
            'stock' => !empty($request->stock) ? $request->stock : $product->stock,
            'discount' => !empty($request->discount) ? $request->discount : $product->discount
        ]);

        return redirect()->route('products.index')->with('success', 'Produit modifié avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, ProductRepositoryInterface $productRepository): RedirectResponse
    {
        $productId = $request->route('id');
        $product = $productRepository->getProductById($productId);
        $productRepository->deleteProduct($product->id);
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succés.');
    }
}
