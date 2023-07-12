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
                    {{ __("Détails d'un produit.") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="container mx-auto flex justify-center items-center">
            {{--            form crea vide --}}
        </div>
    </div>
</x-app-layout>
