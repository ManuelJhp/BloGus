@extends('admin.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Roles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Listado de Roles</h3>
        @can('create', $roles->first())
        <a href="{{ route('admin.roles.create') }}" class="btn btn-light float-right text-dark">
            <i class="fa fa-plus"></i> Crear Role
        </a>
        @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="roles-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-eye nav-icon"></i>
                        </a> --}}
                        @can('update', $role)
                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-pencil-alt nav-icon"></i>
                        </a>
                        @endcan
                        @can('delete', $role)
                            @if ($role->id !== 1)
                            <form method="POST" action="{{ route('admin.roles.destroy', $role) }}" style="display: inline">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estas seguro de querer eliminar este role?')">
                                    <i class="fas fa-times nav-icon"></i>
                                </button>
                            </form>
                            @endif
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
    $('#roles-table').DataTable({
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
