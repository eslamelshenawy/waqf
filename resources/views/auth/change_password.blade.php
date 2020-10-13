@extends('client::layouts.master')

@section('content')
    @include('client::layouts.partials._breadcrumb')

    <section class="singinform">
        <div class="container">
            <h3 class="singinform_title">تسجيل الدخول</h3>
            <p class="singinform_parg">
                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك
            </p>
            <form action="#" class="singinform-form">
                <div class="input-container">
                    <!-- <i class="fa fa-envelope icon"></i> -->
                    <span class="input-icon">
                            <img class="input-icon-img" src="{{ asset('img/email.png') }}" alt="">
                        </span>
                    <input class="input-field" type="text" placeholder="البريد الالكترونى" name="email">
                </div>

                <button type="submit" class="btn">ارسل الكود</button>
            </form>
        </div>
    </section>

@endsection