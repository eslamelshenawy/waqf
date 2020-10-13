@extends('client::layouts.master')

@section('content')
    @include('client::layouts.partials._breadcrumb_3d')
    @inject("image", "\App\Image")
    @inject("page","\App\Page")

    <section class="blog-heading about__-__us">
        <div class="container">
            <div class="blog-heading__body ">
                <h1> مكتبة الصور</h1>
                <span class="line"></span>
                <p>
                    {!! $page->where('slug', 'الصور')->first()->content !!}
                    
                    ا</p>
            </div>
        </div>
    </section>

    <section class="about__-__us__galary-taps">
        <div class="container">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">كل الصور</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">مبانى</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">شقق</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false">محلات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false">أراضى</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><div class="row">
                        @foreach($image->whereIn('imageable_type',['App\Building','App\Apartment','App\Shop','App\Land'])->get()  as $imag)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        {{--                                    <img src="img/civil-man.png" alt="">--}}
                                        <img src="{{url('/images')}}/{{$imag->name}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div></div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> <div class="row">
                        @foreach( $image->where('imageable_type','App\Building')->get() as $apart)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        <img src="{{url('/images')}}/{{$apart->name}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div></div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><div class="row">
                        @foreach( $image->where('imageable_type','App\Apartment')->get() as $apart)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        <img src="{{url('/images')}}/{{$apart->name}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div></div>
                <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab"><div class="row">
                        @foreach( $image->where('imageable_type','App\Shop')->get() as $apa)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        <img src="{{url('/images')}}/{{$apa->name}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div></div>
                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab"><div class="row">
                        @foreach( $image->where('imageable_type','App\Land')->get() as $land)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        <img src="{{url('/images')}}/{{$land->name}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div></div>
            </div>
<!--            <ul class="nav nav-tabs" id="myTab" role="tablist">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"-->
<!--                       aria-controls="home" aria-selected="true">كل الصور</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#bilding" role="tab"-->
<!--                       aria-controls="profile" aria-selected="false">مبانى</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"-->
<!--                       aria-controls="profile" aria-selected="false">شقق</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"-->
<!--                       aria-controls="contact" aria-selected="false">محلات</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab"-->
<!--                       aria-controls="contact2" aria-selected="false">أراضى</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <div class="tab-content" id="myTabContent">-->
<!--                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">-->
<!--                    <div class="row">-->
<!--                        @foreach($image->get()  as $imag)-->
<!--                        <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                            <div class="about__-__us__galary-item">-->
<!--                                <div class="about__-__us__galary-item-photo">-->
<!--{{--                                    <img src="img/civil-man.png" alt="">--}}-->
<!--                                    <img src="{{url('/images')}}/{{$imag->name}}" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-pane fade" id="bilding" role="tabpanel" aria-labelledby="profile-tab">-->
<!--                    <div class="row">-->
<!--                        @foreach( $image->where('imageable_type','App\Building')->get() as $apart)-->
<!--                            <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                                <div class="about__-__us__galary-item">-->
<!--                                    <div class="about__-__us__galary-item-photo">-->
<!--                                        <img src="{{url('/images')}}/{{$apart->name}}" alt="">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">-->
<!--                    <div class="row">-->
<!--                        @foreach( $image->where('imageable_type','App\Apartment')->get() as $apart)-->
<!--                        <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                            <div class="about__-__us__galary-item">-->
<!--                                <div class="about__-__us__galary-item-photo">-->
<!--                                    <img src="{{url('/images')}}/{{$apart->name}}" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">-->
<!--                    <div class="row">-->
<!--                        @foreach( $image->where('imageable_type','App\Shop')->get() as $apa)-->
<!--                        <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                            <div class="about__-__us__galary-item">-->
<!--                                <div class="about__-__us__galary-item-photo">-->
<!--                                    <img src="{{url('/images')}}/{{$apa->name}}" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">-->
<!--                    <div class="row">-->
<!--                        @foreach( $image->where('imageable_type','App\Land')->get() as $land)-->
<!--                        <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                            <div class="about__-__us__galary-item">-->
<!--                                <div class="about__-__us__galary-item-photo">-->
<!--                                    <img src="{{url('/images')}}/{{$land->name}}" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </section>


@endsection
