@extends('template')
@section('titre')
Catalogue
@endsection




@section('content')
<div class="welcome">
    <h2 class="text-4xl font-extrabold dark:text-white">Nos Produits</h2>
    <p class="my-4 text-lg text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
<div class= catalogue>
    @foreach ($products as $product)
    @if($product ->indicatorAvailability === 'oui')
           
    
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <img class="h-auto max-w-full rounded-lg" src="{{ $product->image}}" alt="">
                <div class="name-product">
                    <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name}}</h3>
                    <span class="text-5xl font-extrabold tracking-tight">{{ $product->price}}<span class="text-3xl font-semibold">€</span></span>
                    <span>IndicatorAvailability: {{$product ->indicatorAvailability}}</span>
                </div>
                <div class="button-ca">
                    <a href="{{url('/product/'.$product->id)}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>
                </div>
            </div>
        </div>
        @else// <p>Sorry this product is not available !</p>

    </div>


    @endif
    @endforeach
    @endsection
    
    


