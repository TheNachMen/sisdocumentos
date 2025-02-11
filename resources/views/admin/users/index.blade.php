@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
<h1>Lista de usuarios</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th></th>
                    <td></td>
                    <td></td>

                    <td width="10px"><a href="#"
                            class="btn btn-primary btn-sm mb-2">Editar</a>
                    </td>

                    <td width="10px">
                        <form action="#" method="POST">
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        </form>
                    </td>

                </tr>

            </tbody>
        </table>

        <div class="text-center mt-3">
            
        </div>

    </div>
</div>
@endsection



