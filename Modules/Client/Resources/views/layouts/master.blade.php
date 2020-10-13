@include('client::layouts.header')
@section('top-navbar')
@include('client::layouts.partials._navbar')
@show
<div id="app">
    <main>
        @yield('content')
    </main>
</div>
@include('client::layouts.footer')
