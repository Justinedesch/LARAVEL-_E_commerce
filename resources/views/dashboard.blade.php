<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bonjour et bienvenue sur votre espace personnel.") }}
                </div>
            </div>
        </div>
    </div>

    @if (Route::has('login'))
        @auth
            @if(Auth::user()->roles === "ROLE_ADMIN")
                <div class="py-12">
                    <div class="container mx-auto">
                        <h2 class="text-xl font-semibold m-4"> Panel administrateur </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="h-48 max-w-full rounded-lg bg-green-500 flex justify-center items-center">
                                <a href="{{ route('users.index') }}">Gestion des utilisateurs</a>
                            </div>
                            <div class="h-48 max-w-full rounded-lg bg-green-500 flex justify-center items-center">
                                <a href="{{ route('categories.index') }}">Gestion des catégories</a>
                            </div>
                            <div class="h-48 max-w-full rounded-lg bg-green-500 flex justify-center items-center">
                                <a href="{{ route('products.index') }}">Gestion des produits</a>
                            </div>
                            <div class="h-48 max-w-full rounded-lg bg-green-500 flex justify-center items-center">
                                <a href="{{ route('gameplays.index') }}">Gestion des gameplays</a>
                            </div>
                            <div class="h-48 max-w-full rounded-lg bg-green-500 flex justify-center items-center">
                                <a href="{{ route('addresses.index') }}">Gestion des adresses</a>
                            </div>
                            <div class="h-48 max-w-full rounded-lg bg-green-500 flex justify-center items-center">
                                <a href="{{ route('commands.index') }}">Voir les commandes</a>
                            </div>
                        </div>
                    </div>

                    <div class="container mx-auto m-4">
                        <h2 class="text-xl font-semibold m-4"> Panel utilisateur </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="h-48 max-w-full rounded-lg bg-green-500 flex justify-center items-center">
                                <a href="{{ route('orders.my_orders') }}">Mes commandes</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="py-12">
                    <div class="container mx-auto m-4">
                        <h2 class="text-xl font-semibold m-4"> Panel utilisateur </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="h-48 max-w-full rounded-lg bg-green-500 flex justify-center items-center">
                                <a href="{{ route('order.my_orders') }}">Mes commandes</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    @endif

</x-app-layout>
