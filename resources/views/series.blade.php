@extends('layouts.master')

@push('meta')
<meta property="og:title" content="{{ $meta['title'] ?? config('services.meta.site_name') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:description" content="{{ $meta['description'] ?? config('services.meta.mantra') }}" />
@endpush

@section('body')

    @include('components.ads')

    <h1>Series: {{$data['series']}}</h1>

    <hr class="border-b my-6">

    @foreach ($data['posts'] as $post)
        @include('components.post-preview-inline')

        @if ($post != $data['posts']->last())
        <hr class="border-b my-3">
        @endif
    @endforeach
@stop