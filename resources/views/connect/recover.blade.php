@extends('templates.login')

@section('title',  'Recuperar contraseña')

@section('content')
    <div class="box cross-center shadow bg-white rounded">
        @if (Session::has('message'))
            <div class="container">
                <div class="alert alert-{{ Session::get('typealert') }} ">
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
        @if(!Session::has('reset'))
            {!! Form::open(['url' => Route('recover')]) !!}
                <div class="form-group mb-4">
                    <label for="email">Correo electronico</label>
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="far fa-envelope-open form-control bg-transparent border-0"></i>    
                            </div>
                        </div>
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'correo@ejemplo.com']) !!}
                    </div>
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                {!! Form::submit('Recuperar contraseña', ['class' => 'btn btn-success w-100']) !!}
                <div class="my-4 d-flex justify-content-between flex-wrap">
                    <a href="{{ Route('login') }}">Iniciar sesión</a>
                </div>
            {!! Form::close() !!}
        @endif
    </div>
@endsection