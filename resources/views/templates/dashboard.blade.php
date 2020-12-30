<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard - @yield('title')</title>
    
    <meta name="routeName" content="{{ Route::currentRouteAction() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d10f5f87f4.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    
    <script src="{{ asset('libs/ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
</head>
<body>
    <div class="full-container">
        @include('templates._sidebar')
        <div class="full-content">
            @include('templates._nav')
            <div class="full-content px-3">
                <div class="panel rounded bg-white shadow border-bottom p-3">
                    <header class="pb-3">
                        <h2 class="title d-flex justify-content-between align-items-center flex-wrap">
                            @yield('subtitle')
                        </h2>
                    </header>
                    <section>
                        @yield('content')
                    </section>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}" rel="stylesheet"></script>
    <script src="{{ asset('js/main.js') }}" rel="stylesheet"></script>
    @yield('js')
</body>
</html>