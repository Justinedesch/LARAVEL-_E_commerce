<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;




class ProductController extends Controller
{
    public function productdetail($id)
    {
        $product = Product::findOrFail($id);
    
        return view('productdetail', compact('product'));
    }
}
