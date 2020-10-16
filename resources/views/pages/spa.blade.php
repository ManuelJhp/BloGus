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
                <nav-bar></nav-bar>
            </div>
        </header>
        <div class="page-wrapper">
            <transition name="slide-fade" mode="out-in">
                <router-view :key="$route.fullPath"></router-view>
            </transition>
        </div>
        <section class="footer">
            <footer>
                <div class="container">
                    <figure class="logo-footer"><img src="{{ asset('img/logo-footer.png')}}" alt=""></figure>
                    <nav-bar-footer></nav-bar-footer>
                    <div class="divider-2"></div>
                    <p>Copyright &copy; {{ \Carbon\Carbon::today()->toDateString() }} - {{ config('app.name') }}.
                        Todos los derechos reservados. Diseñado y Desarrollado por
                        <span class="c-white">Manuel Hierro</span></p>
                    <div class="divider-2" style="width: 80%;"></div>
                </div>
            </footer>
        </section>
    </div>

    <script>
        (function (window, document) {
        var menu = document.getElementById('menu'),
            WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

        function toggleHorizontal() {
            [].forEach.call(
                document.getElementById('menu').querySelectorAll('.custom-can-transform'),
                function(el){
                    el.classList.toggle('pure-menu-horizontal');
                }
            );
        };

        function toggleMenu() {
            if (menu.classList.contains('open')) {
                setTimeout(toggleHorizontal, 500);
            }
            else {
                toggleHorizontal();
            }
            menu.classList.toggle('open');
            document.getElementById('toggle').classList.toggle('x');
        };

        function closeMenu() {
            if (menu.classList.contains('open')) {
                toggleMenu();
            }
        }

        document.getElementById('toggle').addEventListener('click', function (e) {
            toggleMenu();
            e.preventDefault();
        });

        window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
    })(this, this.document);
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
