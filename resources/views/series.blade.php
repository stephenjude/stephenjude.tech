@extends('layouts.master')

@push('meta')
<meta property="og:title" content="{{ $data['series_title'] }}" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:description" content="{{ $data['series_description'] }}" />

<meta name="description" content="{{ $data['series_description'] }}">
<meta property="og:type" content="article">
<meta name="og:title" content="{{$data['series_title'] }}">
<meta name="og:description" content="{{ $data['series_description'] }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$data['series_title'] }}">
<meta name="twitter:description" content="{{ $data['series_description'] }}">
<meta name="og:image" content="{{ $data['series_banner'] }}">
<meta name="twitter:image" content="{{ $data['series_banner'] }}">
@endpush

@section('body')

    <h1>Series: {{$data['series_title']}}</h1>

    <hr class="border-b my-6">

    @foreach ($data['posts'] as $post)
        @include('components.post-preview-inline')

        @if ($post != $data['posts']->last())
        <hr class="border-b my-3">
        @endif
    @endforeach
@stop
