@extends('admin::layouts.master')
@section('content')
<section class="tenants">
    <div class="container" id="tenantContainer">
        @include('admin::layouts.partials._success')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="card-title"><br><h4>{{ __('admin::privileges._permission', ['something' => __('shared::actions.add')]) }}</h4><br></div>
                        <hr>
                        <form class="needs-validation" novalidate method="POST" action="{{ route('Admin::permissions.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">{{ __('admin::privileges._the_permission', ['something' => __('admin::privileges.name')]) }}</label>
                                    <input type="text" class="field form-control @error('name') border border-danger @enderror" name="name" autocomplete="off" id="name" value="{{ old('name') }}"
                                           placeholder="{{ __('admin::privileges._the_permission', ['something' => __('admin::privileges.name')]) }}" required>
                                    @error('name')
                                    <div>
                                        <span class="badge badge-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm">{{ __('shared::actions.create') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
