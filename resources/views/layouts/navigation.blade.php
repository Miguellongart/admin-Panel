<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            logo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuarios
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('admin.usersList')}}">Listado Usuarios</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.rolesList')}}">Roles</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.permissionList')}}">Permisos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Configuracion
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('admin.country')}}">Pais</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.province')}}">Provincia</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.country')}}">Pais</a>
                </li>
            </ul>

            <ul class="navbar-nav mb-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('profile.edit')}}"> {{ __('Profile') }}</a></li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"  class="dropdown-item" 
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                >
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
