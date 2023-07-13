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
                        {{ __("Édition de ") }} {{ $gameplay->name }}
                    </div>
                    <div>
                        <a href="{{ route('gameplays.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <button class="block text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                                <i class="fa-solid fa-left-long"></i> Retour à la liste des gameplays
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes._backoffice._display_errors_form')

    <div class="py-12">
        <div class="container mx-auto flex justify-center items-center">
            @include('includes._backoffice._gameplays._form_edit_gameplay')
        </div>
    </div>
</x-app-layout>
