<nav id="js-nav-menu" class="nav-menu hidden lg:hidden">
    <ul class="list-reset my-0">
        <li class="pl-4">
            <a title="Laravel Lessons" href="{{url('laravel.lessons')}}"
                class="nav-menu__item hover:text-blue-500 text-blue">Laravel Lessons</a>
        </li>
        <li class="pl-4">
            <a title="Newsletter" href="{{url('newsletter')}}"
                class="nav-menu__item hover:text-blue-500 text-blue">Newsletter</a>
        </li>
        <li class="pl-4">
            <a title="About {{ $meta['title'] ?? config('services.meta.site_name') }}" href="{{url('about')}}"
                class="nav-menu__item hover:text-blue-500 text-blue">
                About
            </a>
        </li>
    </ul>
</nav>
