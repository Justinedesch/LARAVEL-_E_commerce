<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController
{




    public function getcategory($category_id)
    {


        $category = Category::find(1);
        $products= $category->products;



        return view('category', ['products' => $products]);
    }


}
