@extends('templates.dashboard')
@section('title', 'Listado de productos')
@section('subtitle')
    <p>Productos</p>
    <a href="{{ route('dashboard.products.form') }}" class="btn btn-outline-primary"><i class="fas fa-plus mr-2"></i>Añadir producto</a>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item "><a href="#"><i class="fas fa-boxes"></i> Productos</a></li>
@endsection
@section('content')
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste, quod?
@endsection