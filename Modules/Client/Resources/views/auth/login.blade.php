@extends('client::layouts.master')


@section('content')

        @include('client::layouts.partials._breadcrumb_3d')
    @inject("page","\App\Page")

        <section class="singinform">

            <div class="container">
                @if(isset($errors))
                    @foreach($errors->all() as $error)
                        <h6 class="alert alert-danger">{{$error}}</h6>
                    @endforeach
                @endif

                @if(session()->has('failed'))
                    <h6 class="alert alert-danger">{{session()->get('failed')}}</h6>
                @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>

            <div class="container">
                <h3 class="singinform_title">تسجيل الدخول</h3>
                <p class="singinform_parg">
                     {!! $page->where('slug', 'login')->first()->content !!}
                </p>
                <form method="POST" action="{{ route('login') }}" class="singinform-form">
                    @csrf

                    <div class="input-container">
                        <!-- <i class="fa fa-envelope icon"></i> -->
                        <span class="input-icon">
                            <img class="input-icon-img" src="{{ asset('img/email.png') }}" alt="">
                        </span>
                        <input class="input-field"
                        type="text" placeholder="{{ __('client::users.identity_number') }}" name="username">

                        @error('username')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-container">
                        <!-- <i class="fa fa-key icon"></i> -->
                        <span class="input-icon">
                        <img class="input-icon-img" src="{{ asset('img/email.png') }}" alt="">
                    </span>
                        <input class="input-field" type="password" placeholder="الرقم السري" name="password">
                        <span class="input-icon">
                        <a href="#" id="show-pass">
                            <img class="input-icon-img" src="{{ asset('img/eye.png') }}" alt="">
                        </a>
                    </span>
                        @error('password')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn">تسجيل الدخول</button>
                </form>
            </div>
        </section>

@endsection
