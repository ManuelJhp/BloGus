@extends('admin.layout')

@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Posts</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Listado de Publicaciones</h3>
    <button class="btn btn-light float-right" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-plus"></i> Crear Publicacion</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="posts-table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Extracto</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->excerpt }}</td>
          <td>
            <a href="../#/blog/{{ $post->url }}" class="btn btn-sm btn-secondary" target="_blank">
              <i class="fas fa-eye nav-icon"></i>
            </a>
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-info">
              <i class="fas fa-pencil-alt nav-icon"></i>
            </a>
            <form method="POST"
            action="{{ route('admin.posts.destroy', $post) }}"
            style="display: inline">
                {{ csrf_field() }} {{ method_field('DELETE') }}
                <button class="btn btn-sm btn-danger"
                onclick="return confirm('¿Estas seguro de querer eliminar esta publicacion?')">
                    <i class="fas fa-times nav-icon"></i>
                </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@stop

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $('#posts-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>

@endpush
