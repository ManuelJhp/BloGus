@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Actualizar Role</h3>
            </div>
            <div class="card-body">

                @include('partials.error-messages')

                <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                    {{ method_field('PUT') }}

                    @include('admin.roles.form')

                    <button class="btn btn-primary btn-block">Actualizar role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
