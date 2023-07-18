@extends('layouts.backoffice')


@section('content')
<h1>Product Update</h1>


  
<form action ="{{ route('update.product',['id' => $product ['id']]) }}"  method= "POST">
    @csrf
    @method('PUT')
    

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Product id</span>
        <input type="text" class="form-control" name='id' value="{{$product ['id']}}" aria-describedby="basic-addon1">
      </div>


    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Product name</span>
        <input type="text" class="form-control" name='name' value="{{$product ['name']}}" aria-describedby="basic-addon1">
      </div>
      
      <div class="input-group">
        <span class="input-group-text">Description</span>
        <textarea class="form-control" aria-label="With textarea">{{$product ['description']}}</textarea>
      </div>
    
      <div class="input-group mb-3">
        <span class="input-group-text">Price</span>
        <input type="text" class="form-control" name ='price' value="{{$product ['price']}}" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">€</span>
      </div>  
    
      <div class="input-group mb-3">
        <span class="input-group-text">Weight</span>
        <input type="text" class="form-control" name='weight' value="{{$product ['weight']}}" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">Kg</span>
      </div>  
      
    
      <div class="input-group mb-3">
        <span class="input-group-text">Quantity</span>
        <input type="text" class="form-control" name= 'quantity' value="{{$product ['quantity']}}" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">Piece</span>
      </div> 
    
    

      <div class="input-group mb-3">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">IndicatorAvailability</button>
        <ul class="dropdown-menu">
          <li>oui</li>
          <li>non</li>
        </ul>
        
        <input type="text" class="form-control" name='indicatorAvailability' value="{{$product ['indicatorAvailability']}}" aria-label="Text input with dropdown button">
      </div>

      
      <label for="basic-url" class="form-label">Image URL</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon3">{{$product ['image']}}</span>
        <input type="text" class="form-control" name='image' id="basic-url" aria-describedby="basic-addon3">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Categorie_id</span>
        <input type="text" class="form-control" name='categorie_id' value="{{$product ['categorie_id']}}" aria-describedby="basic-addon1">
      </div>

      <button type="submit" class="btn btn-dark"> Update</button>
</form>


@endsection

  
