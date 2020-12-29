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
                <a href="#" class="sidebar-menu__link {{ !Route::currentRouteNamed('dashboard') ? : 'active' }}"><i class="fas fa-home sidebar-menu__icon"></i> Home </a>
            </li>
        </ul>
    </div>
</div>
