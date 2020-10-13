<!DOCTYPE html>
<html lang="en" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link id="gull-theme" rel="stylesheet" href="{{adminUrl()}}/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="{{adminUrl()}}/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{adminUrl()}}/styles/vendor/pickadate/classic.css">
    <link rel="stylesheet" href="{{adminUrl()}}/styles/vendor/pickadate/classic.date.css">

    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/all.min.css" />
    @stack('styles...')
    @yield('styling...')

</head>

<body class="text-left">

<div id="mainWindow" style="z-index: 99999999999999999999; position: sticky">

</div>

<div class="main-content-wrap sidenav-open d-flex flex-column" id="spinner" style="display: none">
    <div class="card-body">
        <center>
            <div class="loader-bubble loader-bubble-primary m-5" style="font-size: 10px;"></div>
        </center>
    </div>
</div>

<div class="app-admin-wrap layout-sidebar-large clearfix">
    <div class="main-header">
        <div class="logo">
            <img src="{{adminUrl()}}/images/logo.png" alt="">
        </div>

        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div style="margin: auto"></div>

        <div class="header-part-right">
            <!-- Full screen toggle -->
            <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>

        @include('admin::layouts.partials._notifications')

        <!-- User avatar dropdown -->
            <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="{{adminUrl()}}/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i> {{auth()->user()->email}}
                        </div>
                        <a class="dropdown-item">{{ __('admin::dashboard.account_settings') }}</a>
                        <form method="POST" action="{{ Route('logout') }}" id="adminLogoutForm">
                            @csrf
                            <a href="#" class="dropdown-item"
                               onclick="document.getElementById('adminLogoutForm').submit()">Sign out</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="side-content-wrap">
        <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">

            <ul class="navigation-left">
                <li class="nav-item active" data-item="">
                    <a class="nav-item-hold" href="{{route('Admin::root')}}">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text">{{ __('admin::dashboard.it') }}</span>
                    </a>
                    <div class="triangle"></div>
                </li>


                @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read administrators'))
                    <li class="nav-item" data-item="privileges">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-King-2"></i>
                            <span class="nav-text">{{ __('admin::dashboard.administrators.it') }} <br>
                            {{ __('admin::dashboard.and') }}
                                {{ __('admin::dashboard.privileges.it') }}</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                @endif

                @if(auth()->user()->hasrole('super-admin') || auth()->user()->can('read users'))
                    <li class="nav-item" data-item="users">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Lock-User"></i>
                            <span class="nav-text">{{ __('admin::dashboard.users') }}</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                @endif

                @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read estates'))
                    <li class="nav-item" data-item="estates">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Lock-User"></i>
                            <span class="nav-text">{{ __('admin::dashboard.real_estates') }}</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                @endif

                @if(auth()->user()->hasanyrole(['super-admin', 'accountant']))
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{ url('/accounting') }}">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="nav-text">{{ __('admin::dashboard.accounting') }}</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                @endif

                @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read settings'))
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{ route('Admin::settings') }}">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="nav-text">{{ __('admin::dashboard.settings.it') }}</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                @endif

            </ul>


        </div>

        <!-- SUB - Start users and privilages -->

        <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
            <!-- Column 1 -->
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read administrators'))
                <ul class="childNav" data-parent="privileges">
                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read administrators'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::administrators.index') }}" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name">{{ __('admin::dashboard.administrators.it') }}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read permissions'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::permissions.index') }}">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name">{{ __('admin::dashboard.permissions.it') }}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read roles'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::roles.index') }}">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name">{{ __('admin::dashboard.roles.it') }}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            @endif
        <!---->
            <!-- Column 2 -->
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read users'))
                <ul class="childNav" data-parent="users">
                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read subscribers'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::subscribers.index') }}" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name">{{ __('admin::dashboard.subscribers.it') }}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read tenants'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::tenants.index') }}" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name">{{ __('admin::dashboard.tenants') }}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read beneficiaries'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::beneficiaries.index') }}">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name">{{ __('admin::dashboard.beneficiaries') }}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read agencies'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::agencies.index') }}">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name">{{ __('admin::dashboard.agencies') }}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            @endif
        <!---->
            <!-- Column 2 -->
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read estates'))
                <ul class="childNav" data-parent="estates">
                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read buildings'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::buildings.index') }}" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name">{{ __('admin::dashboard.buildings') }}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read apartments'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::apartments.index') }}" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name">{{ __('admin::dashboard.apartments') }}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read shops'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::shops.index') }}" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name">{{ __('admin::dashboard.shops') }}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read lands'))
                        <li class="nav-item">
                            <a href="{{ route('Admin::lands.index') }}">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name">{{ __('admin::dashboard.lands') }}</span>
                            </a>
                        </li>
                    @endif
                </ul>
        @endif
        <!---->
        </div>
        <!-- SUB - End users and privilages -->

        <div class="sidebar-overlay"></div>
    </div>

    <div class="main-content-wrap sidenav-open d-flex flex-column">

    @include('admin::layouts.partials._breadcrumb')
    <!--=============== Left side End ================-->
<div id="app" style="min-height: 800px;">
    @yield('content')
</div>
        @include('admin::layouts.partials._copyright')
    </div>
</div>
<script src="{{adminUrl()}}/js/vendor/jquery-3.3.1.min.js"></script>

<script src="{{adminUrl()}}/js/vendor/bootstrap.bundle.min.js"></script>


<script src="{{adminUrl()}}/js/vendor/perfect-scrollbar.min.js"></script>
<script src="{{adminUrl()}}/js/vendor/datatables.min.js"></script>
<script src="{{adminUrl()}}/js/vendor/pickadate/picker.js"></script>
<script src="{{adminUrl()}}/js/vendor/pickadate/picker.date.js"></script>
<script src="{{adminUrl()}}/js/vendor/pickadate/picker.time.js"></script>

<script src="{{adminUrl()}}/js/vendor/echarts.min.js"></script>

<script src="{{adminUrl()}}/js/es5/echart.options.min.js"></script>
<script src="{{adminUrl()}}/js/es5/dashboard.v1.script.min.js"></script>

<script src="{{adminUrl()}}/js/tagging.min.js"></script>
<script src="{{adminUrl()}}/js/vendor/tagging.script.js"></script>

<script src="{{adminUrl()}}/js/es5/script.min.js"></script>
<script src="{{adminUrl()}}/js/es5/sidebar.large.script.min.js"></script>


{{--<script src="{{adminUrl()}}/js/dropzone.script.js" defer></script>--}}

{{--<script src="{{adminUrl()}}/js/invoice.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/ladda.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/modal.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/nuslider.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/quill.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/sidebar.compact.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/sidebar.large.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/sidebar.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/toastr.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/smart.wizard.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/echart.options.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/cropper.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/calendar.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/customizer.script.js"></script>--}}

<script src="/vendor/bootstrapv4/js/bootstrap.bundle.js"></script>
<script src="/vendor/bootstrapv4/js/bootstrap.js"></script>
<script src="/js/all.min.js"></script>
<script src="/js/axios.min.js"></script>
@stack('scripts...')
<script src="/js/utils.js"></script>
@yield('scripting...')
<script>
    window.onload = async function () {
        let loading = setTimeout(function (e) {
            document.getElementById('app').style.display = 'none';
            document.getElementById('spinner').style.display = 'block';
            // document.getElementById('spinner').style.height = '400px';
            document.getElementById('spinner').style.marginBottom = '100';
        });

        await setTimeout(function (e) {
            clearTimeout(loading);
            document.getElementById('app').style.display = 'block';
            document.getElementById('spinner').remove();
        }, 999);
    };

    let syncing = function(){
        axios.post('{{ route("Admin::syncing") }}')
            .then((response) => {
                location.reload();
            })
    }

</script>



</body>
</html>


