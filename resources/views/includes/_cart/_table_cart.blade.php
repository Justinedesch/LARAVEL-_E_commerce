<div class="flex justify-center items-center m-4">
    <p class="h1">Votre panier</p>
</div>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 rounded-l-lg">
                Nom du produit
            </th>
            <th scope="col" class="px-6 py-3">
                Quantité
            </th>
            <th scope="col" class="px-6 py-3">
                Prix
            </th>
            <th scope="col" class="px-6 py-3">
                Sous-total
            </th>
            <th scope="col" class="px-6 py-3 rounded-r-lg">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @php $totalP = 0 @endphp
        @php $totalQ = 0 @endphp

        @foreach(session('cart') as $id => $details)
            @php $totalP += $details['price'] * $details['quantity'] @endphp
            @php $totalQ += $details['quantity'] @endphp
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $details['name'] }}
                </th>
                <td class="px-6 py-4">
                    <form action="{{ route('cart.update') }}" method="post">
                        @csrf
                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" />
                        <input type="hidden" name="id" value="{{ $details['id'] }}" />
                        <input type="hidden" name="">
                    </form>

                </td>
                <td class="px-6 py-4">
                    {{ $details['price'] }} € /U
                </td>
                <td class="px-6 py-4">
                    {{ $details['price'] * $details['quantity'] }} €
                </td>
                <td>
                    <a href="{{ route('cart.remove', ['id' => $details['id']]) }}" class="m-4">
                        <button type="button" class=" p-2 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="font-semibold text-gray-900 dark:text-white">
            <th scope="row" class="px-6 py-3 text-base">Total</th>
            <td class="px-6 py-3">{{ $totalQ }}</td>
            <td></td>
            <td class="px-6 py-3">{{ $totalP }} €</td>
        </tr>
        </tfoot>
    </table>
    <div class="flex justify-around">
        <a href="{{ route('cart.empty') }}" >
            <button type="button" class=" p-2 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                <i class="fa-solid fa-xmark"></i> Vider le panier
            </button>
        </a>
        <a href="{{ route('catalogue.index') }}" >
            <button type="button" class=" p-2 focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                <i class="fa-solid fa-arrow-left"></i> Continuer mes achats
            </button>
        </a>
        @include('includes._cart._modal_confirm_cart')
    </div>
</div>


