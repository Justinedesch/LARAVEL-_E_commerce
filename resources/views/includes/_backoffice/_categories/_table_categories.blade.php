<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
            Nom de la catégorie
        </th>
        <th scope="col" class="px-6 py-3">
            Description
        </th>
        <th scope="col" class="px-6 py-3">
            Nom du lien
        </th>
        <th scope="col" class="px-6 py-3">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($categoriesList as $category)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $category->name }}
            </th>
            <td class="px-6 py-4">
                {{ $category->description }}
            </td>
            <td class="px-6 py-4">
                {{ $category->link }}
            </td>
            <td class="px-6 py-4 flex flex-col md:flex-row">
                <a href="{{ route('categories.show', ['id' => $category->id ]) }}"
                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    <button
                        class="m-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </a>
                <a href="{{ route('categories.edit', ['id' => $category->id ]) }}"
                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    <button
                        class="m-2 block text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                        type="button">
                        <i class="fa-solid fa-file-pen"></i>
                    </button>
                </a>
                @include('includes._backoffice._categories._modal_delete_category')
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
