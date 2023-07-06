@extends('template')
@section('titre')
    Accueil
@endsection



@section('content')
    @if(!empty($user))
        <h1>
            INFO UTILISATEUR :
        </h1>
        <ul>
            <li>
                Id : {{ $user->id }}
            </li>
            <li>
                Genre / Nom / Prénom : {{ $user->gender }} {{ $user->lastname }} {{ $user->firstname }}
            </li>
            <li>
                E-mail : {{ $user->email }}
            </li>
            <li>
                Adresse : {{ $user->address }} {{ $user->department }} {{ $user->town }} {{ $user->country }}
            </li>
            <li>
                Téléphone Fixe : {{ $user->phone1 }}
            </li>
            <li>
                Téléphone mobile : {{ $user->phone2 }}
            </li>
            <li>
                <a href="{{url('/test')}}">Retour liste des utilisateurs</a>
            </li>
        </ul>
    @else
        MAUVAIS ID !!!!!!!! <br>
        <br>
        <a href="{{url('/test')}}">Retour liste des utilisateurs</a>
    @endif

@endsection
