@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
<h1>Administra los roles</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="#">Crear rol</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
  
                <tr>
                    <td></td>
                    <td></td>

                    <td width="10px"><a href="#" class="btn btn-primary btn-sm mb-2">Editar</a></td>

                    <td width="10px">
                        <form action="#" method="POST">
                          
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
          
            </tbody>
        </table>
    </div>
</div>
@endsection
