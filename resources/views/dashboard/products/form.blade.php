@extends('templates.dashboard')
@section('title', 'Listado de productos')
@section('subtitle' , 'Actualizar producto')
@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('dashboard.products') }}"><i class="fas fa-boxes"></i> Productos</a></li>
    <li class="breadcrumb-item "><a href="#"><i class="fas fa-edit"></i> Actualizar</a></li>
@endsection
@section('content')
    <div class="inside">
        {!! Form::open(['url' => route('dashboard.products.create'), 'enctype' => 'multipart/form-data' ]) !!} 
            <div class="form-row">
                <div class="form-group col-12 col-lg-4">
                    <label>Nombre del producto: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control {{ ($errors->first('name')) ? 'is-invalid' : '' }}">
                    </div>
                    <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group col-12 col-lg-4">
                    <label>Categoria: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-object-group"></i>
                            </span>
                        </div>
                        <select name="category_id" class="custom-select {{ ($errors->first('category_id')) ? 'is-invalid' : '' }}" value="">
                            <option value="null">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <small class="form-text text-danger">{{ $errors->first('category_id') }}</small>
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
                            <input type="file" name="image" accept="image/*" class="custom-file-input {{ ($errors->first('image')) ? 'is-invalid' : '' }}" id="image" value="{{ old('img') }}">
                            <label for="image" class="custom-file-label">Choose File</label>
                        </div>
                    </div>
                    <small class="form-text text-danger">{{ $errors->first('image') }}</small>
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
                        <input type="number" name="price" value="{{old('price')}}" min="0.00" step="0.01" class="form-control {{ ($errors->first('price')) ? 'is-invalid' : '' }}">
                    </div>
                    <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                </div>
                <div class="from-group col-12 col-lg-6">
                    <label>Descuento del producto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            {!! Form::select('is_descount', ['0' => 'No', '1' => 'Si'], 0,  ['class' => 'custom-select']) !!}
                        </div>
                        <input type="number" name="descount" value="{{ old('descount') }}" min="0.00" step="0.01" class="form-control {{ ($errors->first('descount')) ? 'is-invalid' : '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                %
                            </div>
                        </div>
                    </div>
                    @if ($errors->first('descount'))
                        <small class="form-text text-danger">{{ $errors->first('descount') }}</small>
                    @else
                        <span class="text-muted" style="font-size: 12px">El valor debe ser entre 0.00 y 2.00 por defecto el valor es 0</span>
                    @endif
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-12">
                    <label>Descripción:</label>
                    <small class="form-text text-danger">{{ $errors->first('description') }}</small>
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <a href="#" class="btn btn-outline-danger">Eliminar producto</a>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection