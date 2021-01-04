@extends('templates.dashboard')
@section('title', 'Listado de productos')
@section('css')
    <style>
        .content-img{
            position: relative;
            max-width: 100px;
            max-height: 100px;
            overflow: hidden;
        }
        .content-img img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection
@section('subtitle')
    <p>Productos</p>
    <a href="{{ route('dashboard.products.form') }}" class="btn btn-outline-primary"><i class="fas fa-plus mr-2"></i>Añadir producto</a>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item "><a href="#"><i class="fas fa-boxes"></i> Productos</a></li>
@endsection
@section('content')
    <div class="table-responsive">
        @if (count($products) <= 0)
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">{{ env("app_name") }}</h4>
                <p>No tienes ningún producto que mostrar.</p>
                <hr>
                <p class="mb-0"><a href=" {{ route('dashboard.products.form') }} ">¿Deseas ingresar un nuevo producto?</a></p>
            </div>
        @else
            @if (Session::has('message'))
                <div class="alert alert-{{ Session::get('type_alert') }}  alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categorias</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr @if(!$product->status) class="table-secondary" @endif>
                            <td>{{ $product->id }}</td>
                            <td><a href="{{ asset($product->image) }}" target="_blanck" data-fancybox="gallery"> <div class="content-img"><img src="{{ asset($product->image) }}" alt="Imagen producto {{$product->name}}" loading="lazy"> </div></a> </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('dashboard.products.form') }}/{{$product->id}}" class="btn btn-outline-info fas fa-edit tolltip" title="Editar registro"></a>
                                <a href="{{ route('dashboard.products.delete', $product->id) }}" class="btn btn-outline-danger fas fa-trash-alt" title="Eliminar registro"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection