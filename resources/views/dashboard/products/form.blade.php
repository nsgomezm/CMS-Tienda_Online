@extends('templates.dashboard')
@section('title', 'Listado de productos')
@section('subtitle' , 'Actualizar producto')
@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('dashboard.products') }}"><i class="fas fa-boxes"></i> Productos</a></li>
    <li class="breadcrumb-item "><a href="#"><i class="fas fa-edit"></i> Actualizar</a></li>
@endsection
@section('content')
    <div class="inside">
        {!! Form::open(['url' => 'ruta' ]) !!} {{-- route('dashboard.products.update') --}}
            <div class="form-row">
                <div class="form-group col-12 col-lg-4">
                    <label>Nombre del producto: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group col-12 col-lg-4">
                    <label>Categoria: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-object-group"></i>
                            </span>
                        </div>
                        {!! Form::text('category', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group col-12 col-lg-4">
                    <label>Imagen destacada: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-camera"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            {!! Form::file('img', ['class' => 'custom-file-input', 'id' => 'img']) !!}
                            <label for="img" class="custom-file-label">Choose File</label>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="from-group col-12 col-lg-6">
                    <label >Precio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0.00', 'step' => '0.01']) !!}
                    </div>
                </div>
                <div class="from-group col-12 col-lg-6">
                    <label>Descuento del producto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            {!! Form::select('discount', ['0' => 'No', '1' => 'Si'], 0,  ['class' => 'custom-select']) !!}
                        </div>
                        {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0.00', 'step' => '0.01']) !!}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                %
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-12">
                    <label>Descripción:</label>
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <a href="#" class="btn btn-outline-danger">Eliminar producto</a>
                    <a href="#" class="btn btn-success">Guardar</a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection