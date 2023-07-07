@extends('template')

@section('titre')
    Nos {{ $cat->name }}
@endsection

@section('content')
    @include('components._products._productsByCat')
@endsection
