@extends('client::layouts.master')
@inject("setting","\App\GenerallSetting")
@php
        $settings=$setting->find(1);
@endphp
@section('content')
    @include('client::layouts.partials._breadcrumb_3d')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <section class="heading">
        <div class="container">
            <div class="heading__body old-requests">
                <h1>تواصل معنا</h1>
                <span class="line"></span>
            </div>
        </div>
    </section>

    <section class="about-us_main">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="about-us_form">
                        <h3>تواصل معنا</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="title_contact" placeholder="الاسم" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email_contact" placeholder="البريد الالكترونى" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message_contact" placeholder="الرسالة" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-lg" id="send_message">ارسال</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="about-us_phone">
                        <h3>رقم الجوال</h3>
                        <ul>
                            <li> +966
                                {{@$settings->site_mobile}}</li>
                            <li>+966
                                {{@$settings->site_phone}}</li>
                        </ul>
                    </div>
                    <div class="about-us_email">
                        <p>{{@$settings->email}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="about-us_address">
                        <h3>العنوان</h3>
                        <p>{{@$settings->site_addresse_ar}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us_map">
        <div>
            <img class="map" src="./img/map.png" alt="">
        </div>
    </section>
@endsection
@push('scripts...')
    <script>

    </script>
@endpush
