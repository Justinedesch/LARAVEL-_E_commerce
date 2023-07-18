<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backoffice;
use App\Models\Product;



class BackofficeController extends Controller
{
       function backOffice() {
      
        $products = Product::all();
        return view('backoffice.backOffice',['products' => $products]);

      
     }

     function delete($id) {
        $products = Product::find($id);
        $products ->delete();
        return redirect()->back();

      
     }

     function showData($id) {
      
        
        $product= Product::find($id);
        return view ('backoffice.edit',['product' => $product]);
      
     }

      function update(Request $request, $id) {
      //dd($id);
        $product = Product::find($id);
        $product ->id=$request->id;
        $product ->name=$request->name;
        $product ->description=$request->description;
        $product ->price=$request->price;
        $product ->weight=$request->weight;
        $product ->quantity=$request->quantity;
        $product ->indicatorAvailability=$request->indicatorAvailability;
        $product ->image=$request->image;
        $product ->categorie_id=$request->categorie_id;
        $product->save();
        return redirect ('backoffice');
      
     }


     
     function addProduct(Request $request) {

      $request->validate([
         'id' => 'required|integer',
         'name' =>'required',
         'description'=>'required',
         'price'=>'required|integer|min:0',
         'weight'=>'required|integer|min:0',
         'quantity'=>'required|integer|min:0',
         'indicatorAvailability'=>'required|boolean|accepted',
         'image'=>'required|URL',
         'category_id'=>'required|integer',



      ]);
      
      //dd($request->id);
        $product= new Product;
        $product ->id=strip_tags($request->id);
        $product ->name=strip_tags($request->name);
        $product ->description=strip_tags($request->description);
        $product ->price=strip_tags($request->price);
        $product ->weight=strip_tags($request->weight);
        $product ->quantity=strip_tags($request->quantity);
        $product ->indicatorAvailability=strip_tags($request->indicatorAvailability);
        $product ->image=strip_tags($request->image);
        $product ->category_id=strip_tags($request->category_id);
        $product->save();
        return redirect ('backoffice');
        //strips_tags to prevent sending scripting during the form
      
     }


     function showform() {
      

        return view ('backoffice.addproduct');
      
     }
}

