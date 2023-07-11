@extends('template')

@section('titre')
    Nos {{ $cat->name }}
@endsection

@section('content')
    @include('includes._products._productsByCat')
@endsection
