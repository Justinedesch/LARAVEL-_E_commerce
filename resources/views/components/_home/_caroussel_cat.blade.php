<!-- component -->
<div class="flex justify-center items-center">
    <div class="2xl:mx-auto 2xl:container py-12 px-4 sm:px-6 xl:px-20 2xl:px-0 w-full">
        <div class="flex flex-col jusitfy-center items-center space-y-10">
            <div class="flex flex-col justify-center items-center ">
                <h1 class="text-3xl xl:text-4xl font-semibold leading-7 xl:leading-9 text-gray-800 dark:text-white">Nos types de jeux</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-x-4 md:gap-x-8 w-full">
                @foreach($cats as $cat)
                    <div class="relative group flex justify-center items-center h-full w-full">
                        <img class="object-center object-cover h-full w-full" src="{{ $cat->image }}" alt="{{ $cat->alt }}"/>
                        <div class="dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 z-10 absolute text-center font-medium leading-none text-gray-800 py-3 w-36 bg-white">
                            <a href="{{ url('/catalogue/'.$cat->name) }}">{{ $cat->link }}</a>
                        </div>
                        <div class="absolute opacity-0 group-hover:opacity-100 transition duration-500 bottom-3 py-6 z-0 px-20 w-36 bg-white bg-opacity-50"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
