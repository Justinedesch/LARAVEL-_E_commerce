@extends('template')
@section('titre')
    Backoffice
@endsection

@section('content')

    <div class=" flex justify-center gap-20 m-40">

        @foreach ($products as $product)



            <div>

                <h3 class=" text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name}}</h3>

                <img class="h-[400px] max-w-full " src="{{ $product->image}}" alt="" >
                <div class="name-product">
                </div>
                <div class="columns-1 text-center"
                <span>{{ $product->description}}</span>
            </div>
            <div class="columns-1 text-center"
            <span class="text-5xl font-bold tracking-tight">{{ $product->price}} € <span </span>

    </div>
    <div class="button-ca justify-center">
        @if ($product->available == false) Out of stock @endif
        <a href= "/product/{{$product->id}}"

           class=" focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>
    </div>
    </div>

    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        Add product
    </button>
    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        edit product
    </button>
    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        delete product
    </button>
    @endforeach
    </div>

@endsection

