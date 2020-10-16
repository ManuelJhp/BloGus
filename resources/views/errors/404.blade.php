@extends('layout')

@section('content')
<section class="pages container">
    <div class="page page-about text-center">
        <h1 class="text-capitalize">Página no encontrada</h1>
        <p>Regresar a <a href="{{ route('pages.home') }}">Inicio</a></p>
        <img width="50%" src="{{ asset('img/404.jpg') }}">
    </div>
</section>
@endsection
