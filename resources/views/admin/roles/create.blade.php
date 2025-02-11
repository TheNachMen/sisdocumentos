@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
<h1>Crear Nuevo Rol</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="#">
            @csrf 
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="name" name='name' placeholder="Nombre del rol"
                    value="{{ old('name') }}">

                @error('name')
                <span class="alert-red">
                    <span>*{{ $message }}</span>
                </span>
                @enderror

            </div>
            <h3>Lista de permisos</h3>

            <div>
                <label>
                    <input type="checkbox" name="permissions[]" id="" value="" class="mr-1">
                    
                </label>
            </div>

            <input type="submit" value="Crear rol" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
