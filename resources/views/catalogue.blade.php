@extends('template')
@section('titre')
    Catalogue
@endsection




@section('content')
    <div class=" flex justify-center gap-20 m-40">

        <div>
          <h1>Categories</h1>

            <li>
                <a href="/categorie/1" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">Categorie1</a>
            <li>
                <a href="/categorie/2" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">Categorie2</a>
            </li>
            <li>
                <a href=/categorie/3" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">Categorie3</a>
            </li>
            </li>


        </div>

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


    @endforeach
    </div>




    {{--{ --}}
    {{--if (! isset($products)) {--}}
    {{--<span Mauvais identifiant produit ;--}}
    {{--}--}}

    {{--return $produits[$IDproduit];--}}
    {{--}--}}



    {{--<div class="welcome">--}}
    {{--    <h2 class="text-4xl font-extrabold dark:text-white">Nos Produits</h2>--}}
    {{--    <p class="my-4 text-lg text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
    {{--        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
    {{--</div>--}}
    {{--        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/1")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/2")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/3")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/4")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/5")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/6")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/7")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/8")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/9")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/10")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/11")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div>--}}
    {{--            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg" alt="">--}}
    {{--            <div class="name-product">--}}
    {{--                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>--}}
    {{--                <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>--}}
    {{--            </div>--}}
    {{--            <div class="button-ca">--}}
    {{--                <a href="{{url("/product/12")}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Shop</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection


