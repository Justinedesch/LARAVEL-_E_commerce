@extends('layouts.backoffice')


@section('content')
<h1>Add product</h1>


    
<form action ="{{ route('add.product') }}"  method= "POST">
    @csrf
    <input type="text"  name= "id" placeholder="Enter Product id"> <br> <br>
    @error('id')
    {{$message}}
    @enderror
    <input type="text"  name= "name" placeholder="Enter Product name"> <br> <br>
    @error('name')
    {{$message}}
    @enderror
    <input type="text"  name= "description" placeholder="Enter Product description"> <br> <br>
    @error('description')
    {{$message}}
    @enderror
    <input type="number"  name= "price" placeholder="Enter Product price"> <br> <br>
    @error('price')
    {{$message}}
    @enderror
    <input type="number"  name= "weight" placeholder="Enter Product weight"> <br> <br>
    @error('weight')
    {{$message}}
    @enderror
    <input type="number"  name= "quantity" placeholder="Enter Product quantity"> <br> <br>
    @error('quantity')
    {{$message}}
    @enderror
    <input type="text"  name= "indicatorAvailability" placeholder="Enter Product Availability"> <br> <br>
    @error('indicatorAvailability')
    {{$message}}
    @enderror
    <input type="text"  name= "image" placeholder="Enter Product image Url"> <br> <br>
    @error('image')
    {{$message}}
    @enderror
    <input type="text"  name= "categorie_id" placeholder="Enter categorie_id"> <br> <br>
    @error('id')
    {{$message}}
    @enderror

    <button type="submit" class="btn btn-dark">Add new Product</button>
    

</form>


@endsection