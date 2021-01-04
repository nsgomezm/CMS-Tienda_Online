@extends('templates.dashboard')
@section('title', 'Listado de productos')
@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('dashboard.products') }}"><i class="fas fa-boxes"></i> Productos</a></li>
    <li class="breadcrumb-item "><a href="{{ route('dashboard.products.form', $product->id) }}"><i class="fas fa-edit"></i> Actualizar</a></li>
    <li class="breadcrumb-item "><a href="#"><i class="fas fa-images"></i> Galleria</a></li>
@endsection
@section('subtitle')
    <p>Galeria personalizada</p>
    {!! Form::open(['url' => route('dashboard.products.gallery.store', $product->id), 'enctype' => 'multipart/form-data']) !!}
        <input type="file" name="img" accept="image/*" id="img" class="d-none">
        <input type="submit"  id="submit" class="d-none">
        <div class="btn-group" role="group">
            <label for="img" class="btn btn-outline-info"><i class="fas fa-plus"></i></label>
            <label for="submit" class="btn btn-outline-primary">Guardar</label>
        </div>
    {!! Form::close() !!}
@endsection
@section('css')
        <style>
        .gallery{
            display: grid;
            grid-gap: 5px;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-template-rows: repeat(auto-fill, minmax(200px, 1fr));
        }
        li{
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            
        }
        .content-image{
            position: relative;
        }
        img{
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        .cta-delete{
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
        }
    </style>
@endsection
@section('js')
    <script>
        document.getElementById('img').addEventListener('change', () => document.getElementById('submit').click() )
    </script>
@endsection
@section('content')
    <div class="inside">
        @if ($errors->first('img'))
            <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                <span>{{ $errors->first('img') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-{{ Session::get('type_alert') }}  alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="gallery">
            @foreach ($product->photos as $photo)
                <div class="content-image">
                    <a href="{{asset($photo->image)}}" target="_blanck" data-fancybox="gallery" >
                        <img src="{{ asset($photo->image) }}" alt="" loading="lazy" >
                    </a>
                    <a href=" {{ route('dashboard.products.gallery.delete', [$product->id, $photo->id]) }} " class="cta-delete btn btn-outline-danger"><i class="fas fa-trash-alt mr-3"></i>Eliminar</a>
                </div>
            @endforeach
            <li class="border border-darken-1">
                <label for="img" class="btn btn-outline-info"><i class="fas fa-plus"></i></label>
            </li>
        </div>
    </div>

@endsection