@extends('admin::auth.master')
@section('content')
    <div class="auth-layout-wrap" style="background-image: url({{adminUrl()}}/images/photo-wide-4.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{{adminUrl()}}/images/logo.png" alt="">
                            </div>
                            <h1 class="mb-3 text-18">{{ __('client::auth.sign_in') }}</h1>
                            <form method="POST" action="{{route('admin.login')}}">
                                @csrf
                                @if(isset($errors))
                                    @foreach($errors->all() as $error)
                                        <h6 class="alert alert-danger">{{$error}}</h6>
                                    @endforeach
                                @endif
                                @if(session()->has('failed'))
                                    <h6 class="alert alert-danger">{{session()->get('failed')}}</h6>
                                @endif
                                @if(session()->has('logout'))
                                    <h6 class="alert alert-success">{{session()->get('logout')}}</h6>
                                @endif
                                <div class="form-group">
                                    <label for="email">{{ __('shared::commons.email') }}</label>
                                    <input class="form-control form-control-rounded" type="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('shared::commons.password') }}</label>
                                    <input class="form-control form-control-rounded" type="password" name="password">
                                </div>
                                <input type="submit" class="btn btn-rounded btn-primary btn-block mt-2"
                                       value="{{ __('client::auth.login') }}" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection