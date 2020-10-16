@component('mail::message')
# Tus datos de acceso a {{ config('app.name') }}

Utiliza estos datos para acceder al sistema

@component('mail::table')
    | Usuario | contraseña |
    |:---------|:------------|
    | {{ $user->email }} | {{ $password }}
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
