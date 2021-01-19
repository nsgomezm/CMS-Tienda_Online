<nav class="">
    <div class="navbar navbar-expand-lg navbar-dark shadow">
        <div class="navbar-brand ml-2" >
            <i class="fas fa-bars mr-2"  id="btn-sidebar"></i>
            {{ env("app_name") }}
        </div>
        
        <div class="navbar-brand ml-auto navbar-menu">
            <i class="far fa-user-circle navbar-menu__user" id="btn-nav" style="font-size: 1.2em"></i>
            <ul class="navbar-menu__content mr-md-3" id="nav" >
                <li class="navbar-menu__item">
                    <a href="#" class="navbar-menu__link p-2"><i class="fas fa-user-edit mr-2"></i>Editar infromación</a>
                </li>
                <li class="navbar-menu__item">
                    <a href="#" class="navbar-menu__link p-2"><i class="fas fa-at mr-2"></i>Cambiar correo</a>
                </li>
                <li class="navbar-menu__item">
                    <a href="#" class="navbar-menu__link p-2"><i class="fas fa-lock mr-2"></i>Cambiar contraseña</a>
                </li>
                <hr>
                <li class="navbar-menu__item ">
                    <a href="{{ route('logout') }}" class="navbar-menu__link p-2 pb-2 "><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
    <ol class="breadcrumb my-4 mx-3 bg-white shadow">
        <li class="breadcrumb-item disabled"><a href="{{ Route::currentRouteNamed('dashboard') ? '#' : route('dashboard') }}" ><i class="fas fa-home"></i> Dashboard</a></li>
        @yield('breadcrumb')
    </ol>
</nav>
