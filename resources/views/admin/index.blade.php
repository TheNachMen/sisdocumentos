@extends('adminlte::page')

@section('title', 'Panel de administracion')

@section('content_header')
    <h1>Bienvenido al panel de administracion</h1>
@stop

@section('content')
    <p> Hola {{Auth::user()->name}} desde aqui podras otorgar permisos a usuarios</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop