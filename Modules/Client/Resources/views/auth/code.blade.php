@extends('client::layouts.master')


@section('content')
    @include('client::layouts.partials._breadcrumb_3d')

    <section class="singinform">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="container">
            <h3 class="singinform_title">رمز تأكيد الدخول</h3>
            <p class="singinform_parg">
                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في
                الصفحة التي يقرأها. ولذلك
            </p>
            <form method="POST" action="{{ route('checkCode') }}" class="singinform-form w-50 m-auto">
                @csrf

                @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <div class="clearfix"></div>

                <div class="input-container">
                    <!-- <i class="fa fa-envelope icon"></i> -->
                    <span class="input-icon">
                            <img class="input-icon-img" src="img/email.png" alt="" />
                        </span>
                    <input class="input-field" type="text" maxlength="4" placeholder="اكتب الكود هنا" name="code" />
                </div>

                <button type="submit" class="btn">تأكيد</button>
            </form>
        </div>
    </section>


@endsection
