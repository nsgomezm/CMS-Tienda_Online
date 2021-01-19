@extends('templates.mailto')
@section('css')
    <style>
        a{
            display: inline-block;
            margin:  20px auto;
        }

        a.btn{
            background-color: #2caaff;
            color: white;
            padding: 12px;
            border-radius: 4px solid white;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <h1>Hola,  <b>{{ $user->name }}</b></h1>
    <p>
        Hemos recibido una solicitud para modificar la contraseña de Facebook. <br> Introduce el siguiente código para restablecer la contraseña:
        <hr>
        También puedes cambiar la contraseña directamente.
        <a href="{{ $url }}" class="btn">Recuperar contraseña</a>
    </p>
    <hr>
    <p>
        Att: <a href="{{ route('home') }}">{{ env("APP_NAME") }}</a> 
    </p>
@endsection