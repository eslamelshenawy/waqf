@extends('admin::layouts.master')
@section('content')
<section class="users">
    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="offset-3 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title"><br><h4>Settings</h4><br></div>
                        <hr>
                        <form  method="POST" action="{{ route('Admin::setting.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_title">{{ __('admin::dashboard.settings_site_title') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_title" name="data[site_title_ar]" @if(isset($setting['site_title_ar'])) value="{{ $setting['site_title_ar'] }}" @endif placeholder="{{ __('admin::dashboard.settings_site_title') }}" required="true"->
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_email">{{ __('admin::dashboard.settings_site_email') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_email" name="data[site_email]" @if(isset($setting['email']))  value="{{ $setting['email'] }}" @endif  placeholder="{{ __('admin::dashboard.settings_site_email') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_mobile">{{ __('admin::dashboard.settings_site_mobile') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_mobile" name="data[site_mobile]" @if(isset($setting['site_mobile']))  value="{{ $setting['site_mobile'] }}" @endif  placeholder="{{ __('admin::dashboard.settings_site_mobile') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_phone">{{ __('admin::dashboard.settings_site_phone') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_phone" name="data[site_phone]" @if(isset($setting['site_phone']))  value="{{ $setting['site_phone'] }}" @endif  placeholder="{{ __('admin::dashboard.settings_site_phone') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="facebook_url">{{ __('admin::dashboard.settings_facebook_url') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="facebook_url" name="data[facebook_url]" @if(isset($setting['facebook_url']))  value="{{ $setting['facebook_url'] }}" @endif  placeholder="{{ __('admin::dashboard.settings_facebook_url') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="twitter_url">{{ __('admin::dashboard.settings_twitter_url') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="twitter_url" name="data[twitter_url]" @if(isset($setting['twitter_url']))  value="{{ $setting['twitter_url'] }}" @endif  placeholder="{{ __('admin::dashboard.settings_twitter_url') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="instagram">{{ __('admin::dashboard.settings_instgram_url') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="instagram" name="data[instagram]" @if(isset($setting['instagram']))  value="{{ $setting['instagram'] }}" @endif  placeholder="{{ __('admin::dashboard.settings_instgram_url') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <!---------------whats up-------------->
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_whatup">{{ __('admin::dashboard.settings_site_whatup') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_whatup" name="data[site_whatup]" @if(isset($setting['site_whatup']))  value="{{ $setting['site_whatup'] }}" @endif  placeholder="{{ __('admin::dashboard.settings_site_whatup') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <!------------about us------------->
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_aboutus">{{ __('admin::dashboard.settings_site_aboutus_ar') }}</label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control" id="site_aboutus" name="data[site_aboutus_ar]"   placeholder="{{ __('admin::dashboard.settings_site_aboutus_ar') }}" required="true">@if(isset($setting['site_aboutus_ar']))  {{ $setting['site_aboutus_ar'] }} @endif</textarea>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <!-----site_addresse------------>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_addresse_ar">{{ __('admin::dashboard.settings_site_addresse') }}</label>
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" id="site_addresse_ar" name="data[site_addresse_ar]" @if(isset($setting['site_addresse_ar']))  value="{{ $setting['site_addresse_ar'] }}" @endif  placeholder="{{ __('admin::dashboard.settings_site_addresse') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <!-----Mobile App Link------------>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="playStoreLink">{{ __('admin::dashboard.playStoreLink') }}</label>
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" id="playStoreLink" name="data[playStoreLink]" @if(isset($setting['playStoreLink']))  value="{{ $setting['playStoreLink'] }}" @endif  placeholder="{{ __('admin::dashboard.playStoreLink') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="aplleStoreLink">{{ __('admin::dashboard.aplleStoreLink') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="aplleStoreLink" name="data[aplleStoreLink]" @if(isset($setting['aplleStoreLink']))  value="{{ $setting['aplleStoreLink'] }}" @endif  placeholder="{{ __('admin::dashboard.aplleStoreLink') }}">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label class="col-md-2 control-label"> {{ __('admin::dashboard.logoImage')  }}    :</label>--}}
{{--                                    <div class="col-md-10">--}}
{{--                                        @if(isset($setting['logoImage']))--}}
{{--                                            <img src="{{url('images')}}/{{ $setting['logoImage'] }}" width="200" height="200">--}}
{{--                                            <input type="hidden" class="form-control" name="data[logoImage]" >--}}
{{--                                        @endif--}}
{{--                                        <input type="file" class="form-control" name="images" >--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripting...')

@endsection
