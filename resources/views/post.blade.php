@extends('layouts.master')


@php
$post = $data['post'];
@endphp

@push('meta')
<meta name="keywords" content="{{ $post['tags'] ??  implode(',', $post['tags']) }}">
<meta name="description" content="{{ $data['meta']['meta_description'] }}">
<meta property="og:type" content="article">
<meta name="og:title" content="{{ $data['meta']['opengraph_title'] }}">
<meta name="og:description" content="{{ $data['meta']['meta_description'] }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $post->title }}">
<meta name="twitter:description" content="{{ $data['meta']['meta_description'] }}">

@isset($data['post']->featured_image)
<meta name="og:image" content="{{ url($data['post']->featured_image) }}">
<meta name="twitter:image" content="{{ url($data['post']->featured_image) }}">
@endisset
@endpush


@section('body')

@include('components.ads')

<h1 class="leading-none mb-2">{{ $post->title }}</h1>

<p class="text-gray-700 text-xm md:mt-0">
    Published {{ format_date($post->publish_date) }} •
    <a class="uppercase text-gray-700 text-base md:mt-0">
        {{ read_time($data['post']->body) }}
    </a>
</p>

<div class="border-b border-blue-200 mb-10 pb-4" v-pre>
    {!! $post->body !!}
</div>

<section role="main" class="flex-auto w-full container max-w-4xl mx-auto px-6">
    @include('components.newsletter-signup')
</section>

<nav class="flex justify-between text-sm md:text-base">

    <div>
        @if ($previous = $data['prev'])
        <a href="{{ post_url($previous->slug) }}" title="Newer Post: {{ $previous->title }}">
        &LeftArrow; {{ $previous->title }}
        </a>
        @endif
    </div>

    <div>
        @if ($next = $data['next'])
        <a href="{{post_url($next->slug) }}" title="Older Post: {{ $next->title }}">
           {{ $next->title }} &RightArrow;
        </a>
        @endif
    </div>
</nav>

<div class="mt-5" id="disqus_thread"></div>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function() {
        this.page.url = `{{post_url($post->slug)}}`; // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = `{{$post->slug}}`; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = 'https://stephenjude-tech.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection
