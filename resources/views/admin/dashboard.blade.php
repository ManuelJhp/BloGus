@extends('admin.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Inicio</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li> --}}
                {{-- <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li> --}}
            </ol>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Vista Previa del Blog</h3>
    </div>
    <div class="card-body">
        <table id="users-table" class="table table-bordered table-striped">
            <thead>
               {{--  <p class="bg-dark">Usuario autentificado: {{ ucfirst(auth()->user()->name) }}</p>
                <p class="bg-dark">Usuario autentificado: {{ ucfirst(auth()->user()->email) }}</p> --}}
            </thead>
            <tbody>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://manuelhierro.com/blogus/public/#/" allowfullscreen></iframe>
                  </div>
            </tbody>
        </table>
    </div>
</div>
@stop
