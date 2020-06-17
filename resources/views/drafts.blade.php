@extends('layouts.master')

@section('body')

@include('components.ads')

<h1>Draft Articles</h1>

<hr class="border-b my-6">

@foreach ($data['posts'] as $post)
@include('components.draft-preview-inline')

@if ($post != $data['posts']->last())
<hr class="border-b my-6">
@endif
@endforeach

@stop
