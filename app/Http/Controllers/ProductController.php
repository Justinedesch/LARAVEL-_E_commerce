<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productdetail ( $id) {
        return view('productdetail', [
            'id' => $id
        ]);
      }
}