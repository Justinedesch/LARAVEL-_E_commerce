{{--mettre un titre (onglet) dynamique selon les pages--}}
<title>@yield('titre')</title>

{{--Dans les autres pages suivre cette syntaxe (ne pas oublier de charger le template de base (en début de fichier) :--}}
@extends('template')

@section('titre')
    Catalogue
@endsection

{{--au dessus de main --}}
@include('components/header.blade.php')
{{--main--}}
@include('components/footer.blade.php')
{{--en dessous de main--}}
