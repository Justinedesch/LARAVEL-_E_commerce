@extends('template')
@section('titre')
    {{ $product->name }}
@endsection

@section('content')
    @include('includes._products._details')
@endsection
