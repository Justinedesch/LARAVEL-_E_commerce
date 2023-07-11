<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Gameplay;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function show(Request $request): View|Application|Factory|Redirector|RedirectResponse
    {
        $productId = $request->route('id');
        $product = $this->productRepository->getProductById($productId);
        if (empty($product)) { return  redirect('/'); }

        $gameplaysOfProduct = $this->productRepository->getGameplaysByProduct($productId);

        return view('productdetail', ['product' => $product, 'gameplays' => $gameplaysOfProduct ]);
    }
}
