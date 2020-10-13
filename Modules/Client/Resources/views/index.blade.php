@extends('client::layouts.master')
@inject("estate", "\App\Estate")
@inject("image", "\App\Image")
@inject("page", "\App\Page")
@inject("str", "\Illuminate\Support\Str")
@section('content')
    <main>
        @include('client::partials._slider')
        @include('client::layouts.partials._search_box')
        @include('client::partials._bio')
        @include('client::partials._services')
        @if($estate->count())
        @include('client::partials._real_estate_last_6_ads')
        @endif
        @include('client::partials._video')
        @include('client::partials._space')
{{--        @include('client::partials._blog_last_3_posts')--}}
    </main>
@endsection
