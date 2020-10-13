@extends('client::layouts.master')
@inject("page","\App\Page")
@section('content')
    @include('client::layouts.partials._breadcrumb_3d')
    <section class="blog-heading">
        <div class="container">
            <div class="blog-heading__body">
                <h1>{{ $page->where('slug', 'about')->first()->title }}</h1>
                <span class="line"></span>
                <p>
                    
                     {!! $page->where('slug', 'about')->first()->content !!}
                    
                    
                </p>
            </div>
        </div>
    </section>

    <section class="main-about-us">
        <div class="container">
            {!! $page->where('slug', 'about')->first()->content !!}
        </div>
    </section>
@endsection
