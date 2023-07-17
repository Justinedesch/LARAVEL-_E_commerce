@extends('template')
@section('titre')
    Panier
@endsection



@section('content')
    <section class="h-screen flex justify-center items-center">
        <div class="container mx-auto ">
            @include('includes._backoffice._message_flash')
            @if(session('cart'))
                @include('includes._cart._table_cart')
            @else
                <div class="alert alert-danger bg-red-600 rounded text-white m-2 flex justify-center items-center p-4">
                    <p class="font-bold">Votre panier est vide.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
