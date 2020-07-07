<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="laravel lessons" href="{{url('articles')}}"
        class="ml-6 text-gray-700 hover:text-blue-600">
        Articles
    </a>
    <a title="laravel lessons" href="{{route('laravel.lessons')}}"
        class="ml-6 text-gray-700 hover:text-blue-600 ">
        Laravel Lessons
    </a>
    <a title="newsletter" href="{{url('newsletter')}}"
        class="ml-6 text-gray-700 hover:text-blue-600">
        Newsletter
    </a>
    <a title="About {{ $meta['title'] ?? config('services.meta.site_name') }}" href="{{url('about')}}"
        class="ml-6 text-gray-700 hover:text-blue-600 ">
        About
    </a>
</nav>
