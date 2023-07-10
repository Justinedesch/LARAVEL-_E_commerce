@extends('template')
@section('titre')
{{ $product->name }}
@endsection

@section('content')
    @include('components._products._details')
@endsection
