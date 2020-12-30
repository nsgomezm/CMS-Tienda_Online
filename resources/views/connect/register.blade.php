@extends('templates.login')
@section('title', 'Registrate')
@section('content')
    <div class="box cross-center">
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
        {!! Form::open(['url' => '/register']) !!}
            <div class="form-group mb-4">
                <label for="name">Nombre y apellidos completos</label>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-user form-control bg-transparent border-0"></i>    
                        </div>
                    </div>
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Jose', 'required']) !!}
                    {!! Form::text('lastname', old('lastname'), ['class' => 'form-control', 'placeholder' => 'Perez', 'required']) !!}
                </div>
            </div>
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
            <div class="form-group mb-4">
                <label for="cpassword">Confirmar contraseña</label>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock form-control bg-transparent border-0"></i>    
                        </div>
                    </div>
                    {!! Form::password('cpassword', ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            {!! Form::submit('Registrarse', ['class' => 'btn btn-success w-100']) !!}

            <div class="my-4 d-flex justify-content-between flex-wrap">
                <a href="{{ Route('login') }}">Ya estoy registrado</a>
                <a href="#">Recuperar contraseña</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection