<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function order(): View
    {
        $products = Product::all();

        return view('order', compact('products'));

    }
    public function create(): View
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'availability' => 'required|boolean|accepted'

        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $order = new Order();
        $order->id = $request->input('id');
        $order->number = $request->input('number');
        $order->customer_id = $request->input('customer_id');
        $order->total = $request->input('total');
        $order->product_id= $request->input('product_id');
        $order->save();
        return redirect()->route('order');


//
//        return redirect()->route('product.index')
//            ->with('success', 'Product created successfully.');
    }


    public function product($productid)
    {



        $product= Product::find($productid);

        if (!$product){
            abort(404);
//            dd('ereur');
        }


        $products= $product->product;

        return view('order', ['products' => $products]);
    }




}





