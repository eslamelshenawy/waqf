@extends('client::layouts.master')
@inject("image", "\App\Image")
@inject("EstateOrder","\App\EstateOrder")
@php
    $EstateOrd=$EstateOrder->where('estate_id',$estate->id)->first();
@endphp
@section('content')
    @include('client::layouts.partials._breadcrumb_3d')
    @if(session()->has('success'))

        <div class="container">
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        </div>
    @endif
    @auth
        <div id="estateOrder">
            <div class="reserve_request text-center modal fade" id="reserve_request">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="reserve_request__header">

                            @switch($estate->estate_type)
                                @case('building')
                                <h4 class="modal-title">طلب حجز مبنى</h4>
                                @break
                                @case('apartment')
                                <h4 class="modal-title">طلب حجز شقة</h4>
                                @break
                                @case('shop')
                                <h4 class="modal-title">طلب حجز محل</h4>
                                @break
                                @case('land')
                                <h4 class="modal-title">طلب حجز ارض</h4>
                                @break
                            @endswitch
                            {{--                    <h4 class="modal-title">طلب حجز شقة</h4>--}}
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate method="POST" action="{{ route('Client::estate.store.order') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="estate_type" id="estate_type" value="{{$estate->estate_type}}">
                                <input type="hidden" name="tenant_id" id="tenant_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="estateable_id" id="estateable_id" value="{{$estate->id}}">
                                <input type="hidden" name="price" id="price" value="{{$estate->price}}">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            الاسم
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                               readonly/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            رقم الجوال
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->mobile }}"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            البريد الالكترونى
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}"
                                               readonly/>
                                    </div>
                                    <!--<div class="form-group col-md-6">-->
                                    <!--    <label for="name">-->
                                    <!--        تاريخ الحجز-->
                                    <!--        <span class="lable__start">*</span>-->
                                    <!--    </label>-->
                                    <!--    <input type="date" class="form-control" name="booking_at"/>-->
                                    <!--</div>-->
                                     <div class="form-group col-md-6">
                                        <label for="fix">
                                            الوصف
                                            <span class="lable__start">*</span>
                                        </label>
                                        <textarea class="form-control" id="fix" name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!--<div class="form-group col-md-6">-->
                                    <!--    <label for="name">-->
                                    <!--        تاريخ الانتهاء للحجز-->
                                    <!--        <span class="lable__end">*</span>-->
                                    <!--    </label>-->
                                    <!--    <input type="date" class="form-control" name="ended_at"/>-->
                                    <!--</div>-->
                                   
                                </div>

{{--                                <div class="checkbox_group">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input custom_checkbox" type="radio"--}}
{{--                                               name="subscription_type" id="monthly"--}}
{{--                                               value="month"/>--}}
{{--                                        <label class="form-check-label" for="monthly">--}}
{{--                                            شهرى--}}
{{--                                            <br/>--}}
{{--                                            100 ريال سعودى--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input custom_checkbox" type="radio"--}}
{{--                                               name="subscription_type" id="quarter"--}}
{{--                                               value="quarter"/>--}}
{{--                                        <label class="form-check-label" for="quarter">--}}
{{--                                            ربع سنوى--}}
{{--                                            <br/>--}}
{{--                                            100 ريال سعودى--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input custom_checkbox" type="radio"--}}
{{--                                               name="subscription_type" id="semi-annual"--}}
{{--                                               value="semi-annual"/>--}}
{{--                                        <label class="form-check-label" for="semi-annual">--}}
{{--                                            نصف سنوى--}}
{{--                                            <br/>--}}
{{--                                            100 ريال سعودى--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input custom_checkbox" type="radio"--}}
{{--                                               name="subscription_type" id="yearly"--}}
{{--                                               value="yearly"/>--}}
{{--                                        <label class="form-check-label" for="yearly">--}}
{{--                                            سنوى--}}
{{--                                            <br/>--}}
{{--                                            100 ريال سعودى--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <button type="submit"  class="btn btn-lg"
                                        style="width: 50%;">
                                    حجز العقار
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @inject('city', '\App\City')
    @php
        $city=$city->find($estate->city_id)
    @endphp
    <section class="addetails">
        <div class="container">
            <div class="row">
                <!-- <div class="ads-header"> -->
                <div class="col-sm-6">
                    <p class="addetails-title">
                        @switch($estate->estate_type)
                            @case('building')
                            مبنى
                            @break
                            @case('apartment')
                            شقة
                            @break
                            @case('shop')
                            محل
                            @break
                            @case('land')
                            ارض
                            @break
                        @endswitch
                        ب{{$city->name_ar}}
                    </p>
                </div>
                <div class="col-sm-6">
                    <div class="addetails-social">
                        <a href="#" class="addetails-social-btn" target="_blank" rel="noopener noreferrer">
                            اعجاب
                        </a>
                        <a href="#" class="addetails-social-item">
                            <img class="addetails-social-img" src="{{ asset('img') }}/facebook.png" alt=""/>
                        </a>
                        <a href="#" class="addetails-social-item">
                            <img class="addetails-social-img" src="{{ asset('img') }}/twitter.png" alt=""/>
                        </a>
                        <a href="#" class="addetails-social-item">
                            <img class="addetails-social-img" src="{{ asset('img') }}/soc.png" alt=""/>
                        </a>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="addetails-carousel">
                <div class="owl-carousel owl-carousel-addetails owl-theme">
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="{{url('/images')}}/{{ $image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random() }}"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="{{url('/images')}}/{{ $image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random() }}"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="{{url('/images')}}/{{ $image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random() }}"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="{{url('/images')}}/{{ $image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random() }}"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="{{url('/images')}}/{{ $image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random() }}"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ad_info">
        <div class="container">
            <div class="row">
                <!-- //////////// -->
                <div class="col-md-8">
                    <div class="ad_info__location">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                        <span>{{ $estate->address }}</span>
                        <span>{{$estate->price}}</span>
                        <span>ريال سعودى/شهريا</span>
                    </div>
                    <div class="ad_info__desc">
                        <h4>وصف الاعلان</h4>
                        <p>
                            {{ $estate->extra_details }}
                        </p>
                    </div>
                    <div class="ad_info__basic-info">
                        <h4>المعلومات الاساسية</h4>
                        <div class="row">
                            <div class="col-md-12">
                                @switch($estate->estate_type)
                                    @case('building')
                                    <dl >
                                        <dt class="col-sm-4">المساحه</dt>
                                        <dd class="col-sm-4"> {{ ($estate->space) }}<sup>2</sup></dd>
                                        <dt class="col-sm-4">شقه</dt>
                                        <dd class="col-sm-4"> {{ ($estate->number_of_apartments) }}</dd>
                                        <dt class="col-sm-4">طابق</dt>
                                        <dd class="col-sm-4"> {{ ($estate->number_of_floors) }}</dd>
                                        <dt class="col-sm-4">محل</dt>
                                        <dd class="col-sm-4"> {{ ($estate->number_of_shops) }}</dd>
                                        <dt class="col-sm-4">نوع الايجار</dt>
                                        <dd class="col-sm-4"> {{ ($estate->rent_type) == "monthly" ? "شهرى" : ""}}{{ ($estate->rent_type) == "quarterly" ? "ربع سنوى" : ""}}{{ ($estate->rent_type) == "midterm" ? "نصف سنوى" : ""}}{{ ($estate->rent_type) == "yearly" ? "سنوى" : ""}}</dd>

                                    </dl>
{{--                                        <ul>--}}

{{--                                            <span class="data-item-icon"--}}
{{--                                                  style="background: #6e1d3f;width: 30px;display: inline-block;text-align: center;margin: 0px 3px;height: 30px;line-height: 28px;border-radius: 9px;">--}}
{{--                                                            <img src="{{ asset('img') }}/plans.png" alt="">--}}
{{--                                                        </span>--}}

{{--                                    </ul>--}}

                                    @break
                                    @case('apartment')
                                    <dl >
                                        <dt class="col-sm-4">حجره</dt>
                                        <dd class="col-sm-4"> {{ ($estate->number_of_rooms) }}</dd>
                                        <dt class="col-sm-4">حمام</dt>
                                        <dd class="col-sm-4"> {{ ($estate->number_of_kitchens) }}</dd>
                                        <dt class="col-sm-4">مطبخ</dt>
                                        <dd class="col-sm-4"> {{ ($estate->number_of_floors) }}</dd>
                                        <dt class="col-sm-4">تكيف</dt>
                                        <dd class="col-sm-4"> {{ ($estate->number_of_air_conditioner) }}</dd>
                                        <dt class="col-sm-4">نوع الايجار</dt>
                                        <dd class="col-sm-4"> {{ ($estate->rent_type) == "monthly" ? "شهرى" : ""}}{{ ($estate->rent_type) == "quarterly" ? "ربع سنوى" : ""}}{{ ($estate->rent_type) == "midterm" ? "نصف سنوى" : ""}}{{ ($estate->rent_type) == "yearly" ? "سنوى" : ""}}</dd>
                                    </dl>



                                    @break
                                    @case('shop')
                                    <dt class="col-sm-4">المساحه</dt>
                                    <dd class="col-sm-4"> {{ ($estate->space) }}<sup>2</sup></dd>
                                    <dt class="col-sm-4">نوع الايجار</dt>
                                    <dd class="col-sm-4"> {{ ($estate->rent_type) == "monthly" ? "شهرى" : ""}}{{ ($estate->rent_type) == "quarterly" ? "ربع سنوى" : ""}}{{ ($estate->rent_type) == "midterm" ? "نصف سنوى" : ""}}{{ ($estate->rent_type) == "yearly" ? "سنوى" : ""}}</dd>
{{--                                    <dt class="col-sm-4">محل</dt>--}}
{{--                                    <dd class="col-sm-4"> {{ ($estate->number_of_shops) }}</dd>--}}

                                    @break
                                    @case('land')
                                    <ul>
                                        <li>                                    <dt class="col-sm-4">المساحه</dt>
                                            <dd class="col-sm-4"> {{ ($estate->space) }}<sup>2</sup></dd>
{{--                                            <span>العمود 2</span>--}}
                                        </li>
                                    </ul>

                                    @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="ad_info__accessories">--}}
                    {{--                        <h4>الكماليات المتاحة</h4>--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-md-6">--}}
                    {{--                                <ul>--}}
                    {{--                                    <li><span>العمود 1</span><span>العمود 2</span></li>--}}
                    {{--                                    <li><span>العمود 1</span><span>العمود 2</span></li>--}}
                    {{--                                    <li><span>العمود 1</span><span>العمود 2</span></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-md-6">--}}
                    {{--                                <ul>--}}
                    {{--                                    <li><span>العمود 1</span><span>العمود 2</span></li>--}}
                    {{--                                    <li><span>العمود 1</span><span>العمود 2</span></li>--}}
                    {{--                                    <li><span>العمود 1</span><span>العمود 2</span></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <!--<div class="ad_info__basic-accessories">-->
                    <!--    <h4>الموقع على الخريطة</h4>-->
                    <!--    <div class="map">-->
                    <!--        <img src="{{ asset('img') }}/map.png" alt="map"/>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>

                <!-- ///////////// -->
                <div class="col-md-4">
                    <div class="ad_info__reserve">
{{--                        @if($EstateOrd == null)--}}
{{--                            <button class="btn btn-lg btn-block "  data-toggle="modal" data-target="#reserve_request">--}}
{{--                                حجز العقار--}}
{{--                            </button>--}}
{{--                        @else--}}
                            @if(\Auth::check())
                            @if($EstateOrd == null)
                                <button class="btn btn-lg btn-block "  data-toggle="modal" data-target="#reserve_request"> حجز العقار</button>
                            @else
                                <button class="btn btn-lg btn-block "  id="checkstatus">
                                    حجز العقار
                                </button>
                            @endif
                                @else
                                <button class="btn btn-lg btn-block "  id="checkAuth">
                                    حجز العقار
                                </button>
                                @endif

{{--                        @endif--}}
                    </div>
                    @guest()
                        <div class="ad_info__inquiry" style="padding: 20px;">
                            <h3>طلب استفسار</h3>
{{--                            <form class="needs-validation" novalidate>--}}
                                <div class="form-group">
                                    <label for="name">
                                        الاسم
                                        <span class="lable__start">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="phone">
                                        رقم الجوال
                                        <span class="lable__start">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="phone" maxlength="10" required/>
                                </div>
                                <div class="form-group">
                                    <label for="inquiry">
                                        استفسارك
                                        <span class="lable__start">*</span>
                                    </label>
                                    <textarea class="form-control" id="inquiry" required>
                                </textarea>
                                </div>
                                <!-- modal trigger -->
                                <button type="submit" class="btn btn-block btn-lg ad_info__inquiry inquiry_add">
                                    ارسل
                                </button>
{{--                            </form>--}}
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripting...')

@endsection
