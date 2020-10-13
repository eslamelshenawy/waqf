@extends('client::layouts.master')


@section('content')
    <section class="heading">
        <div class="container">
            <div class="heading__body old-requests">
                <h1>الطلبات السابقة</h1>
                <span class="line"></span>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم
                    لأنها
                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدا</p>
            </div>
        </div>
    </section>

    <section class="about__-__us__galary-taps">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">طلبات الايجار/البسابقة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false">طلبات الصيانة السابقة</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active myTabContent__-__new" id="home" role="tabpanel"
                     aria-labelledby="home-tab">
                    
                        
                    
                    @if($ordersTentans->count())
                        @foreach($ordersTentans as $index => $order)
                            @inject("Estate","\App\Building")
                            @inject("image", "\App\Image")
                            @php
                                $Estate=$Estate->where('id',$order->estate_id)->first();
                                 $image=   $image->where(['imageable_id' => $Estate->id, 'more' => null])->pluck('name')->random();
                            @endphp
                            <input type="hidden" order_num="{{$order->order_number}}">

                            <div class="search-results_details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_pic">
                                    <img src="{{url('/images')}}/{{$image}}" alt="">

                                    {{--                                    <img src="{{ asset('img') }}/Saratogafarms.png" alt="">--}}
                                </div>
                            </div>
                            <div class="col-md-9">

                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-1">
                                        <h2>اسم العقار <span> {{@$Estate->name}}</span></h2>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-1">
                                        @if(auth()->guard('web')->check() || auth()->guard('beneficiary')->check())
                                            @if(@$order->is_accepted == '1')
                                                <div class="search-results__action"  >
                                                    <p class="btn agree">
                                                        تم الموافقه
                                                    </p>
                                                </div>
                                            @elseif($order->is_accepted == '2')
                                                <div class="search-results__action" >
                                                    <p class="btn delete">
                                                        تم الرفض
                                                    </p>
                                                </div>
                                            @else
                                                <div class="search-results__action" >
                                                    <p class="btn btn-warning">
                                                        حالة الطلب معلقه
                                                    </p>
                                                </div>

                                            @endif
                                        @else

                                        @if(@$order->is_accepted == '1')
                                            @if(@$order->ended_at != null)
                                                <div class="search-results__action"  >
                                                    <p class="btn agree">
                                                        تم الموافقه
                                                    </p>
                                                </div>
                                                @else
                                                <div class="search-results__action enter_date{{@$order->order_number}}" >
                                                    <div class="alert alert-warning">
                                                        <strong>Warning!</strong> ادخل تاريخ القدوم ليتم ابلاغ صاحب الطلب.
                                                    </div>
                                                    <input type="date" name="Date_end" class="end" dat_num="{{@$order->order_number}}" id="Date_end" style="background-color: #ffc107;" >
                                                </div>
                                            @endif
                                            @elseif($order->is_accepted == '2')
                                            <div class="search-results__action" >
                                            <p class="btn delete">
                                                تم الرفض
                                            </p>
                                            </div>
                                        @else
                                            <div class="search-results__action check_status{{@$order->order_number}}" style="display:none;">
                                                <div class="alert alert-warning">
                                                    <strong>Warning!</strong> ادخل تاريخ القدوم ليتم ابلاغ صاحب الطلب.
                                                </div>
                                                <input type="date" name="Date_end"  class="end"  id="Date_end" dat_num="{{@$order->order_number}}"  class="form-control"   style="background-color: #ffc107;" >
                                            </div>


                                            <div class="search-results__action" id="status{{@$order->order_number}}">
                                                <button class="btn agree" value="1" order_number="{{@$order->order_number}}" >{{ __('shared::actions.accept') }}</button>
                                                <button class="btn delete" value="2" order_number="{{@$order->order_number}}">{{ __('shared::actions.reject') }}</button>
                                            </div>

                                            <div class="search-results__action" id="refused_order{{@$order->order_number}}" style="display:none;" >
                                                <p class="btn delete">
                                                    تم الرفض
                                                </p>
                                            </div>

                                            <div class="search-results__action" id="agree_order{{@$order->order_number}}"  style="display:none;" >
                                                <p class="btn agree">
                                                    تم الموافقه
                                                </p>
                                            </div>
                                        @endif
                                            @endif
                                    </div>
                                    @inject('city', '\App\City')
                                @php
                                    $city_name= $city->where('id',$order->city_id)->first();
                                    $user_name= $order->with('tenanter')->first();
                                        $theDate    = new \DateTime($order->created_at);
                                        $ended_at    = new \DateTime($order->ended_at);
                                         $stringDate = $theDate->format('Y/m/d h:i A');
                                         $endedDate = $ended_at->format('Y/m/d h:i A');
                                @endphp
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">
                                                <ul>
                                                    <li>المدينة: {{@$city_name->name_ar}} - السعودية</li>
                                                    <li>
اسم المستأجر : {{@$order->tenanter->name}}
                                                    </li>
                                            <li>السعر: {{@$order->amount}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">
                                                <ul>
                                        <li>رقم التليفون : {{@$order->tenanter->mobile}}</li>
                                        <li>البريد: {{@$order->tenanter->email}}</li>
{{--                                                    @switch($estate->estate_type)--}}
{{--                                                        @case('building')--}}

{{--                                                        @break--}}
{{--                                                        @case('apartment')--}}
{{--                                                        <li>الدور: الثالث</li>--}}
{{--                                                        <li>الشقة: 8</li>--}}
{{--                                                        @break--}}
{{--                                                        @case('shop')--}}
{{--                                                        <li>الدور: الثالث</li>--}}
{{--                                                        @break--}}
{{--                                                        @case('land')--}}
{{--                                                        <li>الدور: الثالث</li>--}}
{{--                                                        @break--}}
{{--                                                    @endswitch--}}
                                                    @if(@$Estate->street != null)
                                                    <li>الشارع: {{@$order->madeBy->street}}</li>
                                                    @else
                                                     <li>الشارع: {{@$order->madeBy->district}}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">

                                                <ul>

                                                    <li>تاريخ الحجز:  <span>{{@$stringDate}}</span></li>
                                                    <!--@if(@$order->is_accepted == '1' && $order->ended_at != null )-->
                                                    <!--<li>تاريخ القدوم:  <span>{{@$endedDate}}</span></li>-->
                                                    <!--@endif-->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{ __('لا توجد حجوزات') }}
                                </div>
                            </div>
                        </div>
                    @endif

                
                    
                    
                    
                    <!--<div class="search-results_details">-->
                    <!--    <div class="row">-->
                    <!--        <div class="col-md-3">-->
                    <!--            <div class="profile_pic">-->
                    <!--                <img src="img/Saratogafarms.png" alt="">-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="col-md-9">-->

                    <!--            <div class="row">-->
                    <!--                <div class="col-md-6 col-sm-6 col-xs-1">-->
                    <!--                    <h2>اسم العقار <span> تمليك</span></h2>-->
                    <!--                </div>-->
                    <!--                <div class="col-md-6 col-sm-6 col-xs-1">-->
                    <!--                    <div class="search-results__action">-->
                    <!--                        <button class="btn onhold">طلبك قيد الانتظار</button>-->
                                            <!-- <button class="btn agree">تمت الموافقة</button> -->
                                            <!-- <button class="btn delete">تم الرفض</button> -->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-md-4 col-sm-4 col-xs-12">-->
                    <!--                    <div class="search_info">-->
                    <!--                        <div class="search_info__details">-->
                    <!--                            <ul>-->
                    <!--                                <li>المدينة: الرياض - السعودية</li>-->
                    <!--                                <li>السعر: 2000 ريال/شهريا</li>-->
                    <!--                                <li>اسم المستأجر: محمد على</li>-->
                    <!--                            </ul>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-md-4 col-sm-4 col-xs-12">-->
                    <!--                    <div class="search_info">-->
                    <!--                        <div class="search_info__details">-->
                    <!--                            <ul>-->
                    <!--                                <li>المبنى: الحرية</li>-->
                    <!--                                <li>الدور: الثالث</li>-->
                    <!--                                <li>الشقة: 8</li>-->
                    <!--                            </ul>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-md-4 col-sm-4 col-xs-12">-->
                    <!--                    <div class="search_info">-->
                    <!--                        <div class="search_info__details">-->

                    <!--                            <ul>-->
                    <!--                                <li>الجوال: 0000000000</li>-->
                    <!--                                <li>التاريخ: <span>12:00 PM</span> <span>28/02/2019</span></li>-->
                    <!--                                <li>البريد: iddma@gmail.com</li>-->
                    <!--                            </ul>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="search_info">-->
                    <!--                <div class="search_info__details">-->
                    <!--                    <ul>-->
                    <!--                        <li>المدينة: <P>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء-->
                    <!--                                لصفحة-->
                    <!--                                ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص</P>-->
                    <!--                        </li>-->
                    <!--                    </ul>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                </div>
                <div class="tab-pane fade myTabContent__-__new" id="profile" role="tabpanel"
                     aria-labelledby="profile-tab">
                    
                    @if($orders->count())
                        @foreach($orders as $index => $order)
                            @inject("Estate","\App\Building")
                            @inject("image", "\App\Image")
                            @php
                                $Estate=$Estate->where('id',$order->estate_id)->first();
                                 $image=   $image->where(['imageable_id' => $Estate->id, 'more' => null])->pluck('name')->random();
                            @endphp
                            <input type="hidden" order_num="{{$order->order_number}}">

                            <div class="search-results_details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_pic">
                                    <img src="{{url('/images')}}/{{$image}}" alt="">

                                    {{--                                    <img src="{{ asset('img') }}/Saratogafarms.png" alt="">--}}
                                </div>
                            </div>
                            <div class="col-md-9">

                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-1">
                                        <h2>اسم العقار <span> {{@$Estate->name}}</span></h2>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-1">
                                        @if(auth()->guard('web')->check() || auth()->guard('beneficiary')->check())
                                            @if(@$order->is_accepted == '1')
                                                <div class="search-results__action"  >
                                                    <p class="btn agree">
                                                        تم الموافقه
                                                    </p>
                                                </div>
                                            @elseif($order->is_accepted == '2')
                                                <div class="search-results__action" >
                                                    <p class="btn delete">
                                                        تم الرفض
                                                    </p>
                                                </div>
                                            @else
                                                <div class="search-results__action" >
                                                    <p class="btn btn-warning">
                                                        حالة الطلب معلقه
                                                    </p>
                                                </div>

                                            @endif
                                        @else

                                        @if(@$order->is_accepted == '1')
                                            @if(@$order->ended_at != null)
                                                <div class="search-results__action"  >
                                                    <p class="btn agree">
                                                        تم الموافقه
                                                    </p>
                                                </div>
                                                @else
                                                <div class="search-results__action enter_date{{@$order->order_number}}" >
                                                    <div class="alert alert-warning">
                                                        <strong>Warning!</strong> ادخل تاريخ القدوم ليتم ابلاغ صاحب الطلب.
                                                    </div>
                                                    <input type="date" name="Date_end" class="end" dat_num="{{@$order->order_number}}" id="Date_end" style="background-color: #ffc107;" >
                                                </div>
                                            @endif
                                            @elseif($order->is_accepted == '2')
                                            <div class="search-results__action" >
                                            <p class="btn delete">
                                                تم الرفض
                                            </p>
                                            </div>
                                        @else
                                            <div class="search-results__action check_status{{@$order->order_number}}" style="display:none;">
                                                <div class="alert alert-warning">
                                                    <strong>Warning!</strong> ادخل تاريخ القدوم ليتم ابلاغ صاحب الطلب.
                                                </div>
                                                <input type="date" name="Date_end"  class="end"  id="Date_end" dat_num="{{@$order->order_number}}"  class="form-control"   style="background-color: #ffc107;" >
                                            </div>


                                            <div class="search-results__action" id="status{{@$order->order_number}}">
                                                <button class="btn agree" value="1" order_number="{{@$order->order_number}}" >{{ __('shared::actions.accept') }}</button>
                                                <button class="btn delete" value="2" order_number="{{@$order->order_number}}">{{ __('shared::actions.reject') }}</button>
                                            </div>

                                            <div class="search-results__action" id="refused_order{{@$order->order_number}}" style="display:none;" >
                                                <p class="btn delete">
                                                    تم الرفض
                                                </p>
                                            </div>

                                            <div class="search-results__action" id="agree_order{{@$order->order_number}}"  style="display:none;" >
                                                <p class="btn agree">
                                                    تم الموافقه
                                                </p>
                                            </div>
                                        @endif
                                            @endif
                                    </div>
                                    @inject('city', '\App\City')
                                    @inject('Tenant', '\App\Tenant')
                                @php
                                    $city_name= $city->where('id',$order->city_id)->first();
                                    $user_name= $Tenant->where('id',$order->tenant_id)->first();
                                    
                                        $theDate    = new \DateTime($order->available_at);
                                        $ended_at    = new \DateTime($order->ended_at);
                                         $stringDate = $theDate->format('Y/m/d h:i A');
                                         $endedDate = $ended_at->format('Y/m/d h:i A');
                                @endphp
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">
                                                <ul>
                                                    <li>المدينة: {{@$city_name->name_ar}} - السعودية</li>
                                                    <li>
                                                       اسم صاحب العقار : {{@$user_name->name}}
                                                    </li>
{{--                                                    <li>السعر: 2000 ريال/شهريا</li>--}}

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">
                                                <ul>
                                                    <li>رقم التليفون : {{@$user_name->mobile}}</li>

{{--                                                    @switch($estate->estate_type)--}}
{{--                                                        @case('building')--}}

{{--                                                        @break--}}
{{--                                                        @case('apartment')--}}
{{--                                                        <li>الدور: الثالث</li>--}}
{{--                                                        <li>الشقة: 8</li>--}}
{{--                                                        @break--}}
{{--                                                        @case('shop')--}}
{{--                                                        <li>الدور: الثالث</li>--}}
{{--                                                        @break--}}
{{--                                                        @case('land')--}}
{{--                                                        <li>الدور: الثالث</li>--}}
{{--                                                        @break--}}
{{--                                                    @endswitch--}}
                                                    @if(@$Estate->street != null)
                                                    <li>الشارع: {{@$Estate->street}}</li>
                                                    @else
                                                    <li>الشارع: {{@$Estate->district}}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">

                                                <ul>

                                                    <li>تاريخ الطلب:  <span>{{@$stringDate}}</span></li>
                                                    @if(@$order->is_accepted == '1' && $order->ended_at != null )
                                                    <li>تاريخ القدوم:  <span>{{@$endedDate}}</span></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{ __('shared::messages.info.no_maintenance_orders') }}
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection