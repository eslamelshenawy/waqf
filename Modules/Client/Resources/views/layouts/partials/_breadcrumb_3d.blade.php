<section class="breadcrumbs">
    <div class="container">
        <ul class="breadcrumbs_ulists">
            <li class="breadcrumbs_list">
                <a href="{{ url('/') }}">الرئيسية</a>
            </li>

            @if(session()->has('previous'))
            <li class="breadcrumbs_list">
                <a href="{{ @session()->has('previous') ? @session()->get('previous')['url'] : '#' }}">{{ @session()->has('previous') ? @session()->get('previous')['name'] : '' }}</a>
            </li>
            @endif

{{--            @if(session()->has('current'))--}}
{{--            <li class="breadcrumbs_list">--}}
{{--                {{ session()->has('current') ? session()->get('current')['name'] : '' }}--}}
{{--            </li>--}}
{{--            @endif--}}
        </ul>
    </div>
</section>
