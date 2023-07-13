<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class OrderController extends Controller
{
//    public function order()
//    {
//
//
//        $client = Customer::find(1);
//        $orders= $client->orders;
//
//        return view('order', ['orders' => $orders]);
//    }


    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'availability' => 'required|boolean',

        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return 'hello';
    }


        public function order()
        {

            $product = Product::find(2);

            if (!$product) {
                abort(404);
            }

            return view('order', ['product' => $product]);
        }

    }




