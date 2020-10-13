@extends('client::layouts.master')

@section('content')
    @include('client::layouts.partials._breadcrumb_3d')

    <section class="register register-tenants">
        <div class="container">
            <div class="heading">
                <h2>تسجيل حساب جديد</h2>
                <span class="line"></span>
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                    سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات
                    في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                </p>
            </div>
            <!-- register form -->
            <div>
                <h2>
                    مستأجرين
                    <span class="line-start"></span>
                </h2>

                <form name="store_tenant_form" method="POST" action="{{ route('tenants.registering') }}">
                    @csrf
                    <h5>المعلومات الشخصية</h5>
                    <div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">
                                    الاسم
                                    <span class="lable__start">*</span>
                                </label>
                                <input type="text" class="form-control @error('name') border border-danger  @enderror" name="name" id="name" value="{{ old('name') }}"/>
                                @error('name')
                                    <span class="badge badge-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">
                                    البريد الالكتروني
                                    <span class="text-title" style="font-size: 13px;">({{ __('shared::commons.optional') }})</span>
                                </label>
                                <input type="email" placeholder="{{ __('shared::commons.optional') }}" value="{{ old('email') }}" class="form-control @error('email') border border-danger  @enderror" name="email" id="email"/>
                                @error('email')
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
                                <input type="tel"  maxlength="10" value="{{ old('mobile') }}" placeholder="رقم الجوال" class="form-control @error('mobile') border border-danger  @enderror" name="mobile" id="mobile"/>
                                @error('mobile')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">
                                    المدينة
                                    <span class="lable__start">*</span>
                                </label>
                                @include('shared::lists._cities')
                                @error('city')
                                <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">
                                    تاريخ الميلاد
                                    <span class="lable__start">*</span>
                                </label>
                                <input type="date" value="{{ old('birth_of_date_at') }}" class="form-control birth-of-date-at @error('birth_of_date_at') border border-danger @enderror" name="birth_of_date_at" id="birthOfDateAt" />
                                @error('birth_of_date_at')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            
                            <div class="form-group col-md-6">
                                <label for="name">
                                    رقم الهوية
                                    <span class="lable__start">*</span>
                                </label>
                                <input type="tel" maxlength="10" value="{{ old('identity_number') }}"
                                       class="form-control identity-number @error('identity_number') border border-danger @enderror" name="identity_number" id="identityNumber" />
                                @error('identity_number')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="releaseAt">
                                    تاريخ الاصدار
                                    <span class="lable__start">*</span>
                                </label>
                                <input type="date" class="form-control release-at" value="{{ old('release_at') }}" name="release_at" id="releaseAt" />
                                @error('release_at')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="endAt">
                                    تاريخ الانتهاء
                                    <span class="lable__start">*</span>
                                </label>
                                <input type="date" class="form-control end-at" name="end_at" value="{{ old('end_at') }}" id="endAt" />
                                @error('end_at')
                                    <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">
                                    كلمة المرور
                                    <span class="lable__start">*</span>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">
                                    تأكيد كلمة المرور
                                    <span class="lable__start">*</span>
                                </label>
                                <input type="password" class="form-control password-confirmation" name="password_confirmation"value="{{ old('password_confirmation') }}" id="passwordConfirmation" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">
                                المهنة
                                <span class="lable__start">*</span>
                            </label>
                            @include('shared::lists._jobs')
                            @error('job')
                                <span class="badge badge-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <h5>الحالة الاجتماعية</h5>
                    <div class="form-row">
                        @include('shared::lists._martial_status')
                        @error('martial_status')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <hr>
                    <div class="form-row">
                        <div class="form-check">
                            <input  class="form-check-input @error('check_agree') border border-danger @enderror check_agree" type="radio"  name="check_agree" value="1">

                            <label class="form-check-label" for="check_agree">
                                <a href="#">
                                    {{   __('shared::commons.check_agree') }}
                                </a>
                            </label>
                        </div>
                        @error('check_agree')
                        <span class="badge badge-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <input value="0" name="is_has_kids" type="hidden" />

                    <button type="submit" class="btn btn-lg btn-block">
                        تسجيل
                    </button>
                </form>
            </div>
        </div>
    </section>


@endsection

@section('styling...')
<style>

</style>
@endsection