@extends('admin.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Listado de Usuarios</h3>
        @can('create', $users->first())
        <a href="{{ route('admin.users.create') }}" class="btn btn-light float-right text-dark">
            <i class="fa fa-plus"></i> Crear Usuario
        </a>
        @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="users-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                    <td>
                        @can('view', $user)
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye nav-icon"></i>
                        </a>
                        @endcan
                        @can('update', $user)
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-pencil-alt nav-icon"></i>
                        </a>
                        @endcan
                        @can('delete', $user)
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display: inline">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Estas seguro de querer eliminar esta Usuario?')">
                                <i class="fas fa-times nav-icon"></i>
                            </button>
                        </form>
                        @endcan
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
    $('#users-table').DataTable({
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
