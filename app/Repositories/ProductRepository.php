<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    public function getProductById($productId)
    {
        return Product::find($productId);
    }

    public function deleteProduct($productId)
    {
        Product::destroy($productId);
    }

    public function createProduct(array $productDetails)
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productId, array $newDetails)
    {
        return Product::whereId($productId)->update($newDetails);
    }

    public function getGameplaysByProduct($productId)
    {
        return Product::find($productId)->gameplays;
    }
}
