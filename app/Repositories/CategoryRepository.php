<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function getCategoryById($categoryId)
    {
        return Category::find($categoryId);
    }

    public function deleteCategory($categoryId)
    {
        Category::destroy($categoryId);
    }

    public function createCategory(array $categoryDetails)
    {
        return Category::create($categoryDetails);
    }

    public function updateCategory($categoryId, array $newDetails)
    {
        return Category::whereId($categoryId)->update($newDetails);
    }

    public function getProductsByCategory($categoryId)
    {
        return Category::find($categoryId)->products;
    }
}
