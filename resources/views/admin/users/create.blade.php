@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Datos personales</h3>
            </div>
            <div class="card-body">

                @include('partials.error-messages')

                <form method="POST" action="{{ route('admin.users.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email') }}" class="form-control">
                    </div>

                    {{--  <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        <span class="help-block badge bg-warning">Dejar en blanco si no quieres cambiar la
                            contraseña</span>

                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Repetir contraseña:</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Repite la contraseña">
                    </div> --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Roles</label>
                            @include('admin.roles.checkboxes')
                        </div>
                        <div class="form-group col-md-6">
                            <label>Permisos</label>
                            @include('admin.permissions.checkboxes', ['model' => $user])
                        </div>
                    </div>
                    <span class="help-block">La contraseña sera generada y enviada al correo</span>
                    <button class="btn btn-primary btn-block">Crear usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
