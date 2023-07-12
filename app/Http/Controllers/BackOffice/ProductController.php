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

        ]);

        $productRepository->createProduct($request->all());

        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View|Application|Factory
    {
        return view('backoffice/products/product_show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, ProductRepositoryInterface $productRepository): View|Application|Factory
    {
        $product = $productRepository->getProductById($product);
        return view('backoffice/products/product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, ProductRepositoryInterface $productRepository): RedirectResponse
    {
        $request->validate([

        ]);

        $productRepository->updateProduct($product, $request->all());

        return redirect()->route('products.index')->with('success', 'Produit modifié avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductRepositoryInterface $productRepository): RedirectResponse
    {
        $productRepository->deleteProduct($product);

        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succés.');
    }
}
