@extends('layouts.master')

@section('body')

@include('components.ads')

<h1 class="leading-none mb-2">{{ $post->title  }} - Draft</h1>

<div class="border-b border-blue-200 mb-10 pb-4" v-pre>
    {!! $post->body !!}
</div>

@endsection
