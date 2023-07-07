@extends('template')
@section('titre')
    Accueil
@endsection

@section('content')


   @if(!empty($cats))
       @include('components._home._caroussel_cat')
   @else
       PAS DE CATEGORIE CONDITION
   @endif


@endsection


