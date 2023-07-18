<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController
{




    public function getcategory($categoryId)
    {


        $category = Category::find($categoryId);

        if (!$category){
            abort(404);

        }


        $products= $category->products;

        return view('category', ['products' => $products]);
    }


}
