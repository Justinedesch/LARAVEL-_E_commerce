<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-row justify-around">
                    <div class="m-2">
                        {{ __("Gestion de mes commandes.") }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="container mx-auto">
            <h2 class="text-xl font-semibold m-4"> Liste de mes commandes </h2>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @include('includes._backoffice._orders._table_orders')
            </div>
        </div>
    </div>
</x-app-layout>
