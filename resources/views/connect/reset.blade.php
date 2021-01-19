@extends('templates.login')
@section('title', 'Registrate')
@section('content')
    <div class="box cross-center">
        @if (Session::has('message'))
            <div class="jumbotron">
                <p class="lead"> {{ Session::get('message') }} </p>
                <hr class="my-4">
                <p>{{ Session::get('legend') }}</p>
                <a class="btn btn-outline-primary btn-md mx-auto" href="{{ route('login') }}" role="button">Iniciar sesión</a>
            </div>
        @else
            <script> window.location.href="/" </script>
        @endif  
    </div>
@endsection