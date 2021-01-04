@extends('templates.dashboard')
@section('title', 'Listado de productos')
@section('js')
    <script>
        function resetLabel(name){ document.getElementById('image-label').innerText = "Imagen no seleccionada" }
        
        document.getElementById('image').addEventListener('change', (e) => {
            let path = e.target.value.split('\\')
            document.getElementById('image-label').innerText = path[path.length-1]
        })
        function preview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-preview')
                        .attr('src', e.target.result);

                    $('#content-image-preview')
                        .attr('href', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
@section('subtitle')
    <p>
        @if ($update) Actualizar producto @else Crear producto @endif
    </p>
    @if($update)
        <div>
            <a href=" {{route('dashboard.products.gallery', $product->id)}} " class="btn btn-outline-primary"><i class="fas fa-images"></i> Galleria</a>
        </div>
    @endif
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('dashboard.products')}}"><i class="fas fa-boxes"></i> Productos</a></li>
    <li class="breadcrumb-item "><a href="#"><i class="fas fa-edit"></i> @if($update) Actualizar @else Crear @endif</a></li>
@endsection
@section('content')
    <div class="inside">
        {!! Form::open(['url' => ($update) ? route('dashboard.products.update', $product->id) : route('dashboard.products.create'), 'enctype' => 'multipart/form-data' ]) !!} 
            @if (Session::has('message'))
                <div class="alert alert-{{ Session::get('type_alert') }}  alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="form-row">
                <div class="form-group col-12 col-lg-4">
                    <label>Nombre del producto: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </span>
                        </div>
                        <input type="text" value="@if ($update) {{$product->name}}  @else {{ old('name') }} @endif" name="name" class="form-control {{ ($errors->first('name')) ? 'is-invalid' : '' }}">
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
                                @if ($update) 
                                    <option value="{{ $category->id }}" @if( $product->category_id == $category->id) selected @endif > {{ $category->name }} </option>
                                @else 
                                    <option value="{{ $category->id }}" @if( old('category_id') == $category->id) selected @endif> {{ $category->name }} </option>
                                @endif
                                
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
                                <a href="@if($update) {{asset($product->image)}} @else # @endif" target="_blanck" data-fancybox="gallery" class="fas fa-camera" id="content-image-preview">
                                    <img src="@if($update) {{asset($product->image)}} @endif" alt="" class="d-none" id="image-preview">
                                </a>
                            </span>
                        </div>
                        <div class="custom-file">   
                            <input type="file" name="img" accept="image/*" class="custom-file-input {{ ($errors->first('img')) ? 'is-invalid' : '' }}" id="image" onchange="preview(this)"  onfocus="resetLabel('@if ($update) {{ $product->image_name }} @endif')">
                            <label for="image" class="custom-file-label" id="image-label"> @if ($update) {{ $product->image_name }}  @else Seleccionar imagen @endif</label>
                        </div>
                    </div>
                    <small class="form-text text-danger">{{ $errors->first('img') }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="from-group col-12 col-lg-4">
                    <label >Precio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        @if ($update)
                            <input type="number" name="price" value="{{$product->price}}" min="0.00" step="0.01" class="form-control {{ ($errors->first('price')) ? 'is-invalid' : '' }}">
                        @else
                            <input type="number" name="price" value="{{ old('price') }}" min="0.00" step="0.01" class="form-control {{ ($errors->first('price')) ? 'is-invalid' : '' }}">
                        @endif
                    </div>  
                    <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                </div>
                <div class="from-group col-12 col-lg-4">
                    <label>Descuento del producto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select name="is_descount" class="custom-select">
                                @if ($update)
                                    <option value="0" @if ($product->is_descount == 0 ) selected @endif>No</option>
                                    <option value="1" @if ($product->is_descount == 1 ) selected @endif>Si</option>
                                @else
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                @endif
                            </select>
                        </div>
                        @if($update)
                            <input type="number" name="descount" value="{{ $product->descount }}" min="0.00" step="0.01" class="form-control {{ ($errors->first('descount')) ? 'is-invalid' : '' }}">
                        @else
                            <input type="number" name="descount" value="{{ old('descount') }}" min="0.00" step="0.01" class="form-control {{ ($errors->first('descount')) ? 'is-invalid' : '' }}">
                        @endif
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
                <div class="form-group col-12 col-lg-4">
                    <label>Estado</label>
                    <select name="status" class="custom-select" >
                        @if($update)
                            <option value="0" @if($product->status == 0) selected @endif >Inactivo</option>
                            <option value="1" @if($product->status == true) selected @endif >Activo</option>
                        @else
                            <option value="0" @if(old('status') == 0) selected @endif >Inactivo</option>
                            <option value="1" @if(old('status') == true) selected @endif >Activo</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-12">
                    <label>Descripción:</label>
                    <small class="form-text text-danger">{{ $errors->first('description') }}</small>
                    {!! Form::textarea('description', ($update) ? $product->description : null, ['class' => 'form-control', 'id' => 'editor']) !!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    @if($update)
                        <a href="{{ route('dashboard.products.delete', $product->id) }}" class="btn btn-outline-danger">Eliminar producto</a>
                    @else
                        <a href="{{ route('dashboard.products') }}" class="btn btn-link">Regresar</a>
                    @endif
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection