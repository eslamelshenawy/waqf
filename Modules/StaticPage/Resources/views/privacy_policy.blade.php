@extends('client::layouts.master')
@inject("page","\App\Page")
@section('content')
    @include('client::layouts.partials._breadcrumb_3d')
    <section class="blog-heading">
        <div class="container">
            <div class="blog-heading__body">
                <h1>{{ $page->where('slug', 'privacy')->first()->title }}</h1>
                <span class="line"></span>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم
                    لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدا</p>
            </div>
        </div>
    </section>

    <section class="main-about-us">
        <div class="container">
            {!! $page->where('slug', 'privacy')->first()->content !!}
        </div>
    </section>
@endsection
