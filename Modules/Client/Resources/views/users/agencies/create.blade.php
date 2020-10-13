@extends('client::layouts.master')


@section('content')
    @include('client::layouts.partials._breadcrumb_3d')

    <section class="register register-maintaince">
        <div class="container">
            <div class="heading">
                <h2>تسجيل حساب جديد</h2>
                <span class="line"></span>
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                    سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات
                    في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدا
                </p>
            </div>
            <!-- register form -->
            <div>
                <h2>
                    جهات الصيانة
                    <span class="line"></span>
                </h2>

                <h4>المعلومات الشخصية</h4>
                
                <form method="POST" action="{{ route('agencies.registering') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">
                                اسم المستخدم
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" class="form-control @error('name') @enderror" name="name" value="{{ old('name') }}" />
                            @error('name')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="identityNumber">
                                رقم الهوية
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" maxlength="10" class="form-control @error('identity_number') @enderror" name="identity_number" value="{{ old('identity_number') }}" />
                            @error('identity_number')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="companyName">
                                اسم الشركة
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" name="company_name"
                            class="form-control company-name @error('company_name') border border-danger @enderror" id="companyName" value="{{ old('company_name') }}" />
                            @error('company_name')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">
                                البريد الالكتروني
                                <span class="">({{ __('shared::commons.optional') }})</span>
                            </label>
                            <input type="text" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') border border-danger @enderror" id="email" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">
                                المدينة
                                <span class="lable__start">*</span>
                            </label>
                            @include('shared::lists._cities')
                            @error('city')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">
                                العنوان
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" class="form-control @error('address') border border-danger @enderror" name="address" value="{{ old('address') }}" />

                            @error('address')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">
                                النوع
                                <span class="lable__start">*</span>
                            </label>
                            <select name="type" class="form-control" onchange="showService(this.value)">
                                <option selected disabled>اختار نوع الجهة</option>
                                <option value="person" {{ old('type') == 'person' ? 'selected' : '' }}>فرد</option>
                                <option value="agency" {{ old('type') == 'agency' ? 'selected' : '' }}>شركة</option>
                            </select>
                            @error('type')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">
                                رقم الجوال
                                <span class="lable__start">*</span>
                            </label>
                            <input type="tel" name="mobile" maxlength="10" value="{{ old('mobile') }}"
                            class="form-control @error('mobile') border border-danger @enderror" />
                            @error('mobile')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">
                                كلمة المرور
                                <span class="lable__start">*</span>
                            </label>
                            <input type="password" name="password" value="{{ old('password') }}"
                             class="form-control @error('password') border border-danger @enderror" />
                            @error('password')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">
                                تأكيد كلمة المرور
                                <span class="lable__start">*</span>
                            </label>
                            <input type="password" class="form-control @error('password_confirmation') border border-danger @enderror" value="{{ old('password_confirmation') }}" name="password_confirmation" />
                        </div>
                    </div>

                    <div class="form-row">
                        @include('client::users.agencies.partials._service')
                        @include('client::users.agencies.partials._services')
                    </div>

                    <button type="submit" class="btn btn-lg btn-block">
                        تسجيل
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection


@section('scripting...')
<script>
    function showService(val){
        switch(val){
            case 'person':
                document.getElementById('serviceDiv').style.display = 'block';
                document.getElementById('otherServiceDiv').style.display = 'none';
                document.getElementById('servicesDiv').style.display = 'none';
                break;
            case 'agency':
                document.getElementById('servicesDiv').style.display = 'block';
                document.getElementById('otherServicesDiv').style.display = 'block';
                document.getElementById('serviceDiv').style.display = 'none';
                break;
        }
    }

    function chooseService(currentElement){
        if(currentElement.value === 'other'){
            document.getElementById('otherServiceDiv').style.display = 'block';
            document.getElementById('otherServicesDiv').style.display = 'none';
            // document.getElementById('otherServiceInput').setAttribute('name', 'service_other');
        }else{
            document.getElementById('otherServicesDiv').style.display = 'block';
            document.getElementById('otherServiceDiv').style.display = 'none';
        }

        // if(currentElement.checked === true){
        //     document.getElementById('otherServiceDiv').style.display = 'block';
        // }else{
        //     document.getElementById('otherServiceDiv').style.display = 'none';
        // }
    }
</script>
@endsection