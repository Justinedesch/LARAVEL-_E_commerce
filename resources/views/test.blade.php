@extends('template')
@section('titre')
    Accueil
@endsection



@section('content')
    <h1>
        LISTE UTILISATEURS :
    </h1>
    @foreach($users as $user)
        {{$user->gender}} {{$user->lastname}} {{$user->firstname}} <br>
        <a href="{{ url('/test1/'.$user->id) }}">
            <button type="button" class="focus:outline-none text-dark bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                VOIR INFOS DE L'UTILISATEUR
            </button>
        </a>
        <br>
    @endforeach
@endsection

