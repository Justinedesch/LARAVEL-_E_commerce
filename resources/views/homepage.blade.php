@extends('template')
@section('titre')
    Accueil
@endsection

@section('content')

    @if(!empty($cats))
        @include('includes._home._caroussel_cat')
    @else
        PAS DE CATEGORIE CONDITION
    @endif

@endsection


