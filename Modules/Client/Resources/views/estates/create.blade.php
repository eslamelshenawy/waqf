
@extends('client::layouts.master')

@section('content')

    @include('client::layouts.partials._breadcrumb_3d')

    <section class="heading">
        <div class="container">
            <div class="heading__body old-requests">
                <h2> تسجيل عقار جديد </h2>
                <span class="line"></span>
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                    القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في
                    الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي
                    توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدا
                </p>
            </div>
        </div>
    </section>


    <section class="register register-tenants new__properety">
        <div class="container">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">إضافة عقار كامل
                        <span class="dots"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false">إضافة شقة سكنية
                        <span class="dots"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact" aria-selected="false">إضافة محل تجاري
                        <span class="dots"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab"
                       aria-controls="contact2" aria-selected="false">إضافة قطعة أرض
                        <span class="dots"></span></a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                @include('client::estates.buildings.create')
                @include('client::estates.apartments.create')
                @include('client::estates.shops.create')
                @include('client::estates.lands.create')
            </div>

        </div>
    </section>
@endsection