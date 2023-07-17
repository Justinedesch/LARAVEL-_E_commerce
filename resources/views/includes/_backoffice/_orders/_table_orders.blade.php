<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
            N° de commande
        </th>
        <th scope="col" class="px-6 py-3">
            Vous
        </th>
        <th scope="col" class="px-6 py-3">
            Id produit associé
        </th>
        <th scope="col" class="px-6 py-3">
            Action(s)
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($ordersList as $order)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $order->identifiant }}
            </th>
            <td class="px-6 py-4">
                {{ $request->user()->gender }} {{ $request->user()->lastname }} {{ $request->user()->firstname }}
            </td>
            <td class="px-6 py-4">
                {{ $order->product_id }}
            </td>
            <td class="px-6 py-4 flex flex-col md:flex-row">
                <a href="{{ route('order.show', ['id' => $order->id ]) }}"
                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    <button
                        class="m-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
