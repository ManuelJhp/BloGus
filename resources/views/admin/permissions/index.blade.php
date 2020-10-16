@extends('admin.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Permisos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permisos</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Listado de Permisos</h3>
        {{-- <a href="{{ route('admin.permissions.create') }}" class="btn btn-light float-right text-dark">
        <i class="fa fa-plus"></i> Crear Permiso
        </a> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="permissions-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->display_name }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.permissions.show', $permission) }}" class="btn btn-sm
                        btn-secondary">
                        <i class="fas fa-eye nav-icon"></i>
                        </a> --}}
                        @can('update', $permission)
                        <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-pencil-alt nav-icon"></i>
                        </a>
                        @endcan
                        {{-- No permitiremos que se eliminen permisos --}}

                        {{--  @if ($permission->id !== 1)
                        <form method="POST" action="{{ route('admin.permissions.destroy', $permission) }}"
                        style="display: inline">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('¿Estas seguro de querer eliminar este permiso?')">
                            <i class="fas fa-times nav-icon"></i>
                        </button>
                        </form>
                        @endif --}}
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
    $('#permissions-table').DataTable({
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
