
        <!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="utf-8">
{{--        <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{adminUrl()}}/styles/vendor/pickadate/classic.css">
        <link rel="stylesheet" href="{{adminUrl()}}/styles/vendor/pickadate/classic.date.css">

        <link rel="stylesheet" href="{{ asset('vendor/bootstrapv4/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/rating.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

        <link rel="stylesheet" href="{{ mix('css/client.css') }}">

        <style>
            li.notification__log.log__in .new_notifications {
                display: flex;
                width: 17px;
                height: 17px;
                background: #dfa72b;
                border-radius: 50%;
                position: absolute;
                top: 40%;
                right: 15%;
            }

            .new_notifications span {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
            }

        </style>
        @yield('styling...')

    </head>
    <body>
