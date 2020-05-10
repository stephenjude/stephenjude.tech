@extends('layouts.master')

@push('meta')
<meta property="og:title" content="{{ $meta['title'] ?? config('services.meta.site_name') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:description" content="{{ $meta['description'] ?? config('services.meta.mantra') }}" />
@endpush

@section('newsletter')
<section role="main" class="flex-auto w-full container max-w-4xl mx-auto px-1">
    @include('components.newsletter-signup')
</section>

@endsection
