@extends('product.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajoutez, éditez ou supprimez un produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if(isset($errors) && $errors->any())

        <div class="alert alert-danger">

            @foreach($errors->all() as $error)

                <p>{{ $error }}</p>

            @endforeach

        </div>

    @endif


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">price</th>
            <th width="280px">availability</th>
            <th width="280px">action</th>
        </tr>
        @foreach ($products as $product)
            <tr>

                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->available }}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>

                    <form action="{{ route('product.delete',['product'=>$product]) }}" method="POST">

                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>

@endsection
