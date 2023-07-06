@extends('template')
@section('titre')
Product
@endsection

@section('content')
<div class = detail>
            <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            
                    <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                        <a href="#">
                        <img class="rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/content-gallery-3.png" alt="image description">
                        </a>
                    </figure>
                
                        <div class="p-5">
                            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product name</h3>
                            <span class="text-5xl font-extrabold tracking-tight">49<span class="text-3xl font-semibold">€</span></span>
                        </div>
                    <div class="add"><button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Add to cart</button></div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Description Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                
                    <h2 class="title mb-2 text-lg font-semibold text-gray-900 dark:text-white">Product detail:</h2>
                      <div class="ol">
                        <ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
                        <li>
                            <span class="font-semibold text-gray-900 dark:text-white">detail :</span> complete 1 
                        <li>
                            <span class="font-semibold text-gray-900 dark:text-white">detail :</span> complete 2
                        </li>
                        <li>
                            <span class="font-semibold text-gray-900 dark:text-white">detail :</span> complete 3
                        </li>
                    </ol></div>

                    <div class = "continue">
                        <a href="#" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                            Continue Shopping
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
            </div>
</div>


@endsection