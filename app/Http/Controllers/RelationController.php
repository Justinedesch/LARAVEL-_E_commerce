<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;






class RelationController extends Controller
{
    function index(){

        return Category::find(3)->getProduct;
    }
   

    function index_1(){
    //dd(Product::find(1)->getCategory);
        return Product::find(4)->Category;
    }
   

 
    

    
    function index_2(){
        
            return Customer::find(2)->Order;
        }


        function index_3(){
           
                return Order::find(5)->Customer;
            }




        function index_4(){
           
                return Order::find(1)->Products;
            } 
        function index_5(){
           
                return Product::find(1)->Orders;
            }



}