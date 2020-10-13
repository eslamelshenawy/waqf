<div class="log__-__in">
    <li class="userlog log__in">
        <a href="#">
            <img src="{{ asset('img/about1.png') }}" alt="user pic">
            <i class="fas fa-caret-down"></i> @if(Auth::guard('agency')->check()){{ __('client::commons.maintenance_center')  }}@endif
        </a>
        <div class="user_dropdown">
            <ul>
                <li>
                    @if(auth()->guard('web')->check())
                        <a href="{{ route('tenant.orders.old') }}">
                            <i class="fas fa-history"></i>
                            الطلبات السابقة
                        </a>
                    @elseif(auth()->guard('beneficiary')->check())
                        <a href="{{ url('advance') }}">
                            <i class="fas fa-history"></i>
                            السلف
                        </a>
                    @elseif(auth()->guard('agency')->check())
                        <a href="{{ route('agency.orders') }}">
                            <i class="fas fa-history"></i>
                            الطلبات السابقة
                        </a>
                    @endif

                </li>
                @if(auth()->guard('beneficiary')->check())
                    <li>
                        <a href="{{ url('statement_account') }}">
                            <i class="fas fa-money-bill"></i>
                            كشف الحساب
                        </a>
                    </li>
                @endif
                @if(auth()->guard('beneficiary')->check())
                    <li>
                        <a href="{{ url('balance') }}">
                            <i class="fas fa-money-bill"></i>
                            الميزانيه
                        </a>
                    </li>
                @endif
                @if(auth()->guard('beneficiary')->check())
                    <li>
                        <a href="{{ url('information') }}">
                            <i class="fas fa-money-bill"></i>
                            معلومات المبانى والايجارات
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{route('Client::setting')}}">
                        <i class="fas fa-cog"></i>
                        الاعدادات
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                        @csrf
                        <a onclick="logout()" href="#">
                            <i class="fas fa-sign-in-alt"></i>
                            الخروج
                        </a>
                    </form>

                </li>
            </ul>
        </div>
    </li>
    @php
        if(Auth::guard('web')->check())
       {
           $count = Auth::guard('web')->user()->unreadNotifications->where('type', 'App\Notifications\TenantNotification')->count();
          $notifications = Auth::guard('web')->user()->Notifications->where('type', 'App\Notifications\TenantNotification');
       }
       if(Auth::guard('admin')->check())
       {
          $count = Auth::guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\AdminNotification')->count();
          $notifications = Auth::guard('admin')->user()->Notifications;
       }
       if(Auth::guard('beneficiary')->check())
       {
          $count = Auth::guard('beneficiary')->user()->unreadNotifications->where('type', 'App\Notifications\BeneficiariesNotification')->count();
          $notifications = Auth::guard('beneficiary')->user()->Notifications->where('type', 'App\Notifications\BeneficiariesNotification');
       }
       if(Auth::guard('agency')->check())
       {
           $count = Auth::guard('agency')->user()->unreadNotifications->where('type', 'App\Notifications\AgencyNotification')->count();
          $notifications = Auth::guard('agency')->user()->Notifications->where('type', 'App\Notifications\AgencyNotification');
       }
    @endphp
    <li class="notification__log log__in">
        <a href="#">
            <img src="{{ asset('img/bell.png') }}" alt="notifications">
            <span class="new_notifications">
  <span>{{$count}}</span>
</span>
        </a>
        <div class="notifications_dropdown">
            @if(!$notifications->isEmpty())

            <ul>

                @foreach($notifications as $notification)
                    <li style=" {{$notification->read_at == null ? 'width: -webkit-fill-available;' : ""  }}">
                        <a href="#" class="readNoti" dataId="{{$notification->id}}" style="{{ $notification->read_at == null ? 'background: #741b40;color: #fff;' : '' }} ">
                            <i class="far fa-check-circle"></i>
                            <span>
                               {{$notification->data['message']}}
                        </span>
                        </a>
                    </li>
                @endforeach


            </ul>
            <div class="see-more">
                <a href="{{url('allNotification')}}">مشاهدة الكل</a>
            </div>
            @else
                <ul>

                        <li>
                            <a href="#">
                                <i class="far fa-check-circle"></i>

                                <span>
                               لا توجد اشعارات
                        </span>
                            </a>
                        </li>


                </ul>
            @endif
        </div>
    </li>
</div>


@section('scripting...')
    <script>


    </script>
@endsection
