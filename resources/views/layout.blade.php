<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="@yield('meta-description', 'Este es el Blog de ' . config('app.name'))">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('meta-title', config('app.name') . " | Blog")</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/framework.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    @stack('styles')
</head>

<body>
    <div id="app">
        <div class="preload"></div>
        <header class="space-inter">
            <div class="container container-flex space-between">
                <figure class="logo">
                    <img src="{{ asset('img/logo.png')}}" alt="">
                </figure>
                @include('partials.nav')
            </div>
        </header>
        {{-- Contenido --}}
        @yield('content')
        <section class="footer">
            <footer>
                <div class="container">
                    <figure class="logo-footer"><img src="{{ asset('img/logo-footer.png')}}" alt=""></figure>
                    <nav>
                        <ul class="container-flex space-center list-unstyled">
                            <li><a href="index.html" class="text-uppercase c-white">home</a></li>
                            <li><a href="about.html" class="text-uppercase c-white">about</a></li>
                            <li><a href="archive.html" class="text-uppercase c-white">archive</a></li>
                            <li><a href="contact.html" class="text-uppercase c-white">contact</a></li>
                        </ul>
                    </nav>
                    <div class="divider-2"></div>
                    <p></p>
                    <div class="divider-2" style="width: 80%;"></div>
                    <p>Copyright &copy; {{ \Carbon\Carbon::today()->toDateString() }} - {{ config('app.name') }}.
                        Todos los derechos reservados. Diseñado y Desarrollado por
                        <span class="c-white">Manuel Hierro</span></p>
                    <ul class="social-media-footer list-unstyled">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="tw"></a></li>
                        <li><a href="#" class="in"></a></li>
                        <li><a href="#" class="pn"></a></li>
                    </ul>
                </div>
            </footer>
        </section>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
