@inject("Notifications", "\App\Notification")
@php
    $count = $Notifications->whereIn('type', ['App\Notifications\TenantNotification','App\Notifications\AdminNotification','App\Notifications\BeneficiariesNotification','App\Notifications\BeneficiariesNotification'])->where('read_at',null)->get()->count();
@endphp

<!-- Notificaiton -->
<div class="dropdown">
    <div class="badge-top-container" id="dropdownNotification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="badge badge-primary">{{$count}}</span>
        <i class="i-Bell text-muted header-icon"></i>
    </div>
    <!-- Notification dropdown -->
    <div class="dropdown-menu rtl-ps-none dropdown-menu-right notification-dropdown" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">

        @foreach($Notifications->orderBy('id', 'asc')->get() as $notification)
        <div class="dropdown-item d-flex">
            <div class="notification-icon">
                <i class="i-Data-Power text-success mr-1"></i>
            </div>
            <div class="notification-details flex-grow-1">
                <a class="m-0 d-flex align-items-center readNoti"  dataId="{{$notification->id}}">

{{--                    <span>Server Up!</span>--}}
                    @if($notification->read_at == null)
                    <span class="badge badge-pill badge-success ml-1 mr-1 " >new</span>
                    @endif
{{--                    <span class="flex-grow-1"></span>--}}
{{--                    <span class="text-small text-muted ml-auto">14 hours ago</span>--}}
                </a>
                <a class="readNoti" dataId="{{$notification->id}}"> <p class="text-small text-muted m-0">{{json_decode($notification->data)->message}}</p></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Notificaiton End -->
