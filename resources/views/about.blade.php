@extends('layouts.master')

@push('meta')
<meta property="og:title" content="About {{ $meta['title'] ?? config('services.meta.site_name') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->full() }}" />>
@endpush

@section('body')

<h1>About Me</h1>

<img src="{{ asset('/img/stephenjude.jpg')}}" alt="About image" class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">
<p class="mb-6">Hello, I am Stephen Jude</p>

<p class="mb-6">
    I am a software developer working primary on PHP and Laravel applications.

    I am driven by learning and I’ve grown to embrace the challenges that development can bring.
</p>

<p class="mb-6">I am a firm believer that people with passion can change the world for better (Jude 1:22 kjv) </p>

<p>If you are looking for a web developer for contract,
    <a href="mailto:hello@stephenjude.me"> feel free to reach out</a>.</p>

<p class="mb-6">
    I am also available for speaking or consulting.
</p>

@endsection
