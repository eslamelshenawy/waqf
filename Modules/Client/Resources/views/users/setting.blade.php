@extends('client::layouts.master')

@section('content')
    <section class="roles-and-permissions">
        <div class="container">
            @include('admin::layouts.partials._success')
            <section class="heading">
                <div class="container">
                    <div class="heading__body old-requests">
                        <h1>   {{ __('shared::actions.setting') }}</h1>
                        <span class="line"></span>
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            {{ __('shared::actions.setting') }}

                                <form novalidate method="POST" action="{{ route('Client::setting.store') }}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            الاسم
{{--                                            <span class="lable__start">*</span>--}}
                                        </label>

                                        @if(auth()->guard('web')->check())
                                            <input type="text" class="form-control @error('name') border border-danger  @enderror" name="name" id="name" value="{{Auth::guard('web')->user()->name}}"/>
                                        @elseif(auth()->guard('beneficiary')->check())
                                            <input type="text" class="form-control @error('name') border border-danger  @enderror" name="name" id="name" value="{{Auth::guard('beneficiary')->user()->name}}"/>
                                        @elseif(auth()->guard('agency')->check())
                                            <input type="text" class="form-control @error('name') border border-danger  @enderror" name="name" id="name" value="{{Auth::guard('agency')->user()->name}}"/>
                                        @endif


                                        @error('name')
                                        <span class="badge badge-danger">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            البريد الالكتروني
{{--                                            <span class="text-title" style="font-size: 13px;">({{ __('shared::commons.optional') }})</span>--}}
                                        </label>
                                        @if(auth()->guard('web')->check())
                                            <input type="email" class="form-control @error('email') border border-danger  @enderror" name="email" id="email" value="{{Auth::guard('web')->user()->email}}"/>
                                        @elseif(auth()->guard('beneficiary')->check())
                                            <input type="email" class="form-control @error('email') border border-danger  @enderror" name="email" id="email" value="{{Auth::guard('beneficiary')->user()->email}}"/>
                                        @elseif(auth()->guard('agency')->check())
                                            <input type="email" class="form-control @error('email') border border-danger  @enderror" name="email" id="email" value="{{Auth::guard('agency')->user()->email}}"/>
                                        @endif
                                        @error('email')
                                        <span class="badge badge-danger">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            رقم الجوال
{{--                                            <span class="lable__start">*</span>--}}
                                        </label>
                                        @if(auth()->guard('web')->check())
                                            <input type="tel" placeholder="رقم الجوال" class="form-control @error('mobile') border border-danger  @enderror" name="mobile" id="mobile" value="{{Auth::guard('web')->user()->mobile}}"/>
                                        @elseif(auth()->guard('beneficiary')->check())
                                            <input type="tel" placeholder="رقم الجوال" class="form-control @error('mobile') border border-danger  @enderror" name="mobile" id="mobile" value="{{Auth::guard('beneficiary')->user()->mobile}}"/>
                                        @elseif(auth()->guard('agency')->check())
                                            <input type="tel" placeholder="رقم الجوال" class="form-control @error('mobile') border border-danger  @enderror" name="mobile" id="mobile" value="{{Auth::guard('agency')->user()->mobile}}"/>
                                        @endif

                                        @error('mobile')
                                        <span class="badge badge-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                        <div class="form-group col-md-6">
                                    <button type="submit"  class="form-control btn btn-info"
                                            style="width: 50%; margin-top: 36px;">
                                        حفظ
                                    </button>
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripting...')
    <script>


    </script>
@endsection




{{-- <div class="loader-bubble loader-bubble-primary m-5"></div> --}}


