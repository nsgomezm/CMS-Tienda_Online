@extends('templates.login')

@section('title',  'Login')

@section('content')
    <div class="box cross-center shadow bg-white rounded">
        @if (Session::has('message'))
            <div class="container">
                <div class="alert alert-{{ Session::get('typealert') }} ">{{--  --}}
                    {{ Session::get('message') }}
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endif
        {!! Form::open(['url' => Route('login')]) !!}
            <div class="form-group mb-4">
                <label for="email">Correo electronico</label>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="far fa-envelope-open form-control bg-transparent border-0"></i>    
                        </div>
                    </div>
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'correo@ejemplo.com', 'required']) !!}
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="password">Contraseña</label>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock form-control bg-transparent border-0"></i>    
                        </div>
                    </div>
                    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            {!! Form::submit('Ingresar', ['class' => 'btn btn-success w-100']) !!}
            <div class="my-4 d-flex justify-content-between flex-wrap">
                <a href="{{ Route('register') }}">Registrate</a>
                <a href="{{ Route('recover') }}">Recuperar contraseña</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection