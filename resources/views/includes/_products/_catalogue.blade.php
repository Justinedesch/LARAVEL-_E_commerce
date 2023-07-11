<section>
    <div class="container mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($products as $product)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-0">
                    <a href="#">
                        <img class="rounded-t-lg object-cover w-full h-48" src="{{ $product->image }}" alt="{{ $product->alt }}" />
                    </a>
                    <div class="p-5 flex flex-col justify-center items-center">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->description_title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>

                        @if($product->isAvailable === 1)
                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <i class="fa-solid fa-arrow-right-long"></i> Voir produit
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


