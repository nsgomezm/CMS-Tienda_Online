@extends('templates.dashboard')
@section('title', 'Listado de usuarios')
@section('subtitle', 'Usuarios')
@section('breadcrumb')
    <li class="breadcrumb-item "><a href="#"><i class="fas fa-users"></i> Usuarios</a></li>
@endsection
@section('content')
    <div class="inside">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead> 
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="#" class="btn btn-outline-info fas fa-edit tolltip" title="Editar registro"></a>
                                <a href="#" class="btn btn-outline-danger fas fa-trash-alt" title="Eliminar registro"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
