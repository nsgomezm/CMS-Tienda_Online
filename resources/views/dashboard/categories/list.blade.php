@extends('templates.dashboard')
@section('title', 'Listado de categorias')
@section('css')
    <style>
        .content-dinamic span{
            font-size: 30px;
        }
        .content-dinamic div{
            width: 80px;
        }
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item "><a href="#"><i class="fas fa-users"></i> Categorias</a></li>
@endsection
@section('subtitle')
    <p>Categorias</p>
    <div>
        {!! Form::open(['url' => route('dashboard.categories'), 'method' => 'get']) !!}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        Módulo
                    </div>
                </div>
                <select class="custom-select" name="filter" value="{{ $filter }}">
                    <option value="all">Todos</option>
                    @foreach (getModules() as $key => $module )
                        <option value="{{$key}}" {{ ($filter == $key) ? 'selected' : '' }}>{{$module}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    {!! Form::submit('Filtrar', ['class' => 'btn btn-info']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('content')
    <div class="inside">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Nueva categoria</h5>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        {!! Form::open(['url' => route('dashboard.categories.create')]) !!}
                            {!! Form::text('id', null, ['class' => 'd-none', 'id' => 'id']) !!}
                        
                            <div class="form-group">
                                <label>Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-keyboard"></i>
                                        </span>
                                    </div>
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Módulo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-keyboard"></i>
                                        </span>
                                    </div>
                                    <select name="module" value="null" id="module" class="custom-select">
                                        <option value="null">Seleccionar</option>
                                        @foreach (getModules() as $key => $module )
                                            <option value="{{$key}}" >{{$module}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ícono</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select name="type_icon" value="null" id="type_icon" class="custom-select">
                                            <option value="null">Seleccionar</option>
                                            @foreach (getTypeIcons() as $key => $type_icon )
                                                <option value="{{$key}}" >{{$type_icon}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {!! Form::text('icon', null, ['class'  => 'form-control', 'id' => 'icon']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="reset"   id="cta-reset" class="d-none">
                                {!! Form::submit('Guardar', ['class' => 'd-none', 'id' => 'cta-submit']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="card-footer text-muted">
                        <label for="cta-reset" class="btn btn-outline-danger" id="cta-cancel">Cancelar</label>
                        <label for="cta-submit" class="btn btn-success" id="cta-store">Guardar</label>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8 mt-5 mt-lg-0">
                <div class="inside">
                    @if (Session::has('delete'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('delete') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (count($categories) <= 0)
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Importante!!</h4>
                            <p>No hay registros que mostrar</p>
                            <hr>
                            @if ($filter != 'all')
                                <p class="mb-0">No se encuentran categorias asociadas al modulo <b>{{ $filter }}</b></p>
                            @endif
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th >Icono</th>
                                    <th class="w-50">Nombre</th>
                                    <th class="w-30">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr id="{{$category->id}}">
                                        <td class="d-none">
                                            {{ $category->id }}
                                        </td>
                                        
                                        <td class="d-none">
                                            {{ $category->module }}
                                        </td>
                                        <td class="content-dinamic text-center">
                                            @if ($category->type_icon != 'http')
                                                <span >{!! htmlspecialchars_decode($category->full_icon) !!}</span>
                                            @else
                                                <div class="mx-auto">
                                                    {!! htmlspecialchars_decode($category->full_image_category) !!}
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="#" class="btn btn-outline-info cta-action fas fa-edit tolltip" title="Editar registro" data-data="{{$category}}" data-type="edit"></a>
                                            <a href="{{ route('dashboard.categories.delete')}}/{{$category->id}}" class="btn btn-outline-danger  fas fa-trash-alt"  title="Eliminar registro" ></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            document.getElementById('cta-cancel').addEventListener('click', (e) =>{document.getElementById('cta-store').innerHTML = 'Guardar'})
            
            getEvent(document.getElementsByClassName('cta-action'))
        })


        
        // functiones
        function getEvent(edit){
            for(key in edit){
                let item = edit[key]
                if(typeof(item) == 'object'){
                    item.addEventListener('click', function(e){
                        let data = getMatrizData(e.target.dataset.data)
                        if(e.target.dataset.type == 'edit'){
                            document.getElementById('cta-store').innerHTML = 'Actualizar'
                            resetForm( data  )
                        }
                    })
                }
            }
        }
        
        function getMatrizData(data){
            let array = []
            data.replace(/['"}{]+/g, '').split(',').forEach(item => {
                item = item.split(':')
                array[item[0]] = item[1]
            })
            return  array
        }

        function resetForm(data){
            for(key in data){
                try{
                    document.getElementById(key).value = data[key] 
                } catch(err){
                    
                }
            }
        }
    </script>
@endsection
