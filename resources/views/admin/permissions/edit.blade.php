@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Actualizar Permiso</h3>
            </div>
            <div class="card-body">

                @include('partials.error-messages')

                <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                    {{ method_field('PUT') }} {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Identificador:</label>
                        <input value="{{ $permission->name }}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="display_name">Nombre:</label>
                        <input name="display_name" value="{{ old('display_name', $permission->display_name) }}"
                            class="form-control">
                    </div>

                    <button class="btn btn-primary btn-block">Actualizar permiso</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
