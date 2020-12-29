<div class="sidebar shadow-lg" id="sidebar">
    <div class="sidebar__content_img">
        <div class="sidebar__content_img--img">
            <img src="{{ asset('img/logos/logo.png') }}" alt="">
        </div>
        <p class="sidebar__content_img--title">{{ Auth::user()->short_full_name }}</p>
    </div>

    <div class="sidebar_content ">
        <ul class="sidebar-menu">
            <li class="sidebar-menu__item">
                <a href="{{ Route::currentRouteNamed('dashboard') ? '#' : route('dashboard') }}" class="sidebar-menu__link {{ !Route::currentRouteNamed('dashboard') ? : 'active' }}"><i class="fas fa-home sidebar-menu__icon"></i> Home </a>
            </li>
            <li class="sidebar-menu__item">
                <a href="{{ Route::currentRouteNamed('dashboard.products') ? '#' : route('dashboard.products') }}" class="sidebar-menu__link {{ !Route::currentRouteNamed('dashboard.products') ?  : 'active' }}"><i class="fas fa-boxes sidebar-menu__icon"></i> Productos</a>
            </li>
            <li class="sidebar-menu__item">
                <a href="{{ Route::currentRouteNamed('dashboard.users') ? '#' : route('dashboard.users') }}" class="sidebar-menu__link  {{ !Route::currentRouteNamed('dashboard.users') ? : 'active' }}"><i class="fas fa-users sidebar-menu__icon"></i> Usuarios</a>
            </li>
            <li class="sidebar-menu__item"  >
                <a href="#" class="sidebar-menu__link subitem" ><i class="fas fa-home sidebar-menu__icon"></i> Item <i class="fas fa-angle-down sidebar-menu__icon--rigth text-center"></i></a>
                <ul class="sidebar-menu__subitem" >
                    <li class="sidebar-menu__item">
                        <a href="#" class="sidebar-menu__link"><i class="fas fa-home sidebar-menu__icon"></i> sub item</a>
                    </li>
                    <li class="sidebar-menu__item">
                        <a href="#" class="sidebar-menu__link"><i class="fas fa-home sidebar-menu__icon"></i> sub item </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu__item"  >
                <a href="#" class="sidebar-menu__link subitem" id="" ><i class="fas fa-home sidebar-menu__icon"></i> Item <i class="fas fa-angle-down sidebar-menu__icon--rigth text-center"></i></a>
                <ul class="sidebar-menu__subitem" >
                    <li class="sidebar-menu__item">
                        <a href="#" class="sidebar-menu__link"><i class="fas fa-home sidebar-menu__icon"></i> sub item</a>
                    </li>
                    <li class="sidebar-menu__item">
                        <a href="#" class="sidebar-menu__link"><i class="fas fa-home sidebar-menu__icon"></i> sub item </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu__item">
                <a href="#" class="sidebar-menu__link"><i class="fas fa-home sidebar-menu__icon"></i> Usuarios</a>
            </li>
        </ul>
    </div>
</div>
