@extends('client::layouts.master')


@section('content')
    @include('client::layouts.partials._breadcrumb')

    <section class="singinform">
        <div class="container">
            <h3 class="singinform_title">رمز تأكيد الدخول</h3>
            <p class="singinform_parg">
                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في
                الصفحة التي يقرأها. ولذلك
            </p>
            <form action="#" class="singinform-form w-50 m-auto">
                <div class="input-container">
                    <!-- <i class="fa fa-envelope icon"></i> -->
                    <span class="input-icon">
                            <img class="input-icon-img" src="img/email.png" alt="" />
                        </span>
                    <input class="input-field" type="text" placeholder="اكتب الكود هنا" name="email" />
                </div>

                <button type="submit" class="btn">تأكيد</button>
            </form>
        </div>
    </section>


@endsection