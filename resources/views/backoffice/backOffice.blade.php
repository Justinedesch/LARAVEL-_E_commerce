@extends('layouts.backoffice')

@section('content')
    <h1>BackOffice</h1>
</div>
<div class= catalogue>
    @foreach ($products as $product)
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Product</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><span class="text-5xl font-extrabold tracking-tight">{{ $product->id}}</span></th>
            <td><h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name}}</h3></td>
            <form action="{{ route('delete.product',['id' => $product['id']]) }}" method ="post">
              @csrf
              @method ('delete')
            <td><button type="submit" class="btn btn-dark">Supprimer</button></td>
            </form>
            <td><button type="submit" class="btn btn-dark"><a href ={{ route('update.product',['id' => $product ['id']]) }}> Modifier </a></button></td>
          </tr>
          <tr>
</div>
@endforeach 
@endsection