@extends('layouts.master')

@push('meta')
<meta property="og:title" content="{{ $meta['title'] ?? config('services.meta.site_name') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:description" content="{{ $meta['description'] ?? config('services.meta.mantra') }}" />
@endpush

@section('newsletter')
<section role="main" class="flex-auto w-full container max-w-4xl mx-auto px-6">
    @include('components.newsletter-signup')
    <h5 class="text-center" >
        <a href="https://us20.campaign-archive.com/home/?u=4e4ddd30dfc7de0c8a4bf6592&id=d3fe3975e4">
            Here is an archive of what I have sent out so far :)
        </a>
    </h5>
</section>

@endsection
