<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="{{ setActiveRoute('dashboard') }} nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ setActiveRoute('dashboard') }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Inicio</p>
            </a>
        </li>

        {{-- Perfil --}}
        <li class="nav-item {{ setActiveRoute(['admin.users.show', 'admin.users.edit']) }}">
            <a href="{{ route('admin.users.show', auth()->user()) }}"
                class="nav-link {{ setActiveRoute(['admin.users.show', 'admin.users.edit']) }}">
                <i class="fas fa-user-alt nav-icon"></i>
                <p>Perfil</p>
            </a>
        </li>

        @can('view', new App\Post)
        {{-- Navegacion para los Posts --}}
        <li class="nav-item has-treeview {{ setActiveRoute('admin.posts.index') }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-blog"></i>
                <p> Blog <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item {{ setActiveRoute('admin.posts.index') }}">
                    <a href="{{ route('admin.posts.index') }}"
                        class="nav-link {{ setActiveRoute('admin.posts.index') }}">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Ver todos los Posts</p>
                    </a>
                </li>
                @can('create', new App\Post)
                <li class="nav-item">
                    @if (request()->is('admin/posts/*'))
                    <a href="{{ route('admin.posts.index', '#create') }}" class="nav-link">
                        <i class="fas fa-calendar-plus nav-icon"></i>
                        <p>Crear un Post</p>
                    </a>
                    @else
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-calendar-plus nav-icon"></i>
                        <p>Crear un Post</p>
                    </a>
                    @endif
                </li>
                @endcan
            </ul>
        </li>
        @endcan

        {{-- Navegacion para los Usuarios --}}
        @can('view', new App\User)
        <li class="nav-item has-treeview {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p> Usuarios <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item {{ setActiveRoute('admin.users.index') }}">
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link {{ setActiveRoute('admin.users.index') }}">
                        <i class="fas fa-list nav-icon"></i>
                        Ver todos los Usuarios
                    </a>
                </li>
                @can('create', new App\User)
                <li class="nav-item {{ setActiveRoute(['admin.users.create']) }}">
                    <a href="{{ route('admin.users.create') }}"
                        class="nav-link {{ setActiveRoute(['admin.users.create']) }}">
                        <i class="fas fa-user-plus nav-icon"></i>
                        Crear un Usuario
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan

        {{-- Navegacion para los Roles --}}
        @can('view', new \Spatie\Permission\Models\Role)
        <li class="nav-item {{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}">
            <a href="{{ route('admin.roles.index') }}"
                class="nav-link {{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}">
                <i class="fas fa-user-tag nav-icon"></i>
                <p>Roles</p>
            </a>
        </li>
        @endcan

        {{-- Navegacion para los Permisos --}}
        @can('view', new \Spatie\Permission\Models\Permission)
        <li class="nav-item {{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit']) }}">
            <a href="{{ route('admin.permissions.index') }}"
                class="nav-link {{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit']) }}">
                <i class="fas fa-user-check nav-icon"></i>
                <p>Permisos</p>
            </a>
        </li>
        @endcan

        {{--  <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Link 1
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Link 2
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li> --}}
    </ul>
</nav>
