<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <div class="click--nav">
                        <ul class="nav-left">
                            <!-- /.icon -->
                            <li>
                                <div id="nav-icon1">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="body-overlay "></div>
                    <div class="nav">
                        <ul class="list-style">
                            <li class="active"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li><a href="{{ route('estate.index') }}">{{ __('shared::estates.real_estates_ads') }}</a></li>
                            <li><a href="{{ route('gallery') }}">{{ __('client::commons.gallery') }}</a></li>
                            <li><a href="{{ route('pages.contact') }}">{{ __('staticpage::pages.contact_us') }}</a></li>
                            <li><a href="{{ route('pages.about') }}">{{ __('staticpage::pages.about_us') }}</a></li>
                            @if(auth()->guard('web')->check())
                            <li><a href="{{ route('maintenance.index') }}">مركز الصيانة</a></li>
                            @endif
                            @if(\Auth::guard()->check())
                                @include('client::layouts.partials._logged_board')
                            @elseif(\Auth::guard('beneficiary')->check())
                                @include('client::layouts.partials._logged_board')
                            @elseif(\Auth::guard('agency')->check())
                                @include('client::layouts.partials._logged_board')
                            @elseif(\Auth::guard('admin')->check())
                                @include('client::layouts.partials._admin_logged_board')
                            @else
                                @include('client::layouts.partials._login_board')
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
