@extends('client::layouts.master')
@section('content')
    @include('client::layouts.partials._breadcrumb_3d')
    <section class="latest__estate__ads">
        <div class="tit">
            <h2>جميع الإشعارات</h2>
        </div>
        @php
            if(Auth::guard('web')->check())
           {
               $count = Auth::guard('web')->user()->unreadNotifications->where('type', 'App\Notifications\TenantNotification')->count();
              $notifications = Auth::guard('web')->user()->unreadNotifications;
           }
           elseif(Auth::guard('admin')->check())
           {
              $count = Auth::guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\BeneficiariesNotification')->count();
              $notifications = Auth::guard('admin')->user()->unreadNotifications;
           }
           elseif(Auth::guard('beneficiary')->check())
           {
              $count = Auth::guard('beneficiary')->user()->unreadNotifications->where('type', 'App\Notifications\BeneficiariesNotification')->count();
              $notifications = Auth::guard('beneficiary')->user()->unreadNotifications;
           }
           elseif(Auth::guard('agency')->check())
           {
               $count = Auth::guard('agency')->user()->unreadNotifications->where('type', 'App\Notifications\BeneficiariesNotification')->count();
              $notifications = Auth::guard('agency')->user()->unreadNotifications;
           }
        @endphp
        <div class="container">
            <div class="row">
                <ul>
                    @if(!$notifications->isEmpty())

                    @foreach($notifications as $notification)
                        <li>
                            <a href="#">
                                <i class="far fa-check-circle"></i>

                                <span>
                               {{$notification->data['message']}}
                        </span>
                            </a>
                        </li>
                    @endforeach
                    @else
                        لا توجد اشعارات
                    @endif

                </ul>
            </div>

        </div>
    </section>


@endsection
