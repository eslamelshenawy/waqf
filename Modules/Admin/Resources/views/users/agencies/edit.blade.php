@extends('admin::layouts.master')

@section('content')
    <section class="tenants">
        <div class="container" id="tenantContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4>{{ __('shared::commons.new_agency') }}</h4><br></div>
                            <hr>
                            <form class="needs-validation" novalidate method="POST" action="{{ route("Admin::agencies.update", $agency->id) }}" autocomplete="off"enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>{{ __('shared::commons.type') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="type" value="person" {{ old('type', $agency->type) === 'person' ? 'checked' : '' }}
                                        class="form-check-inline float-left mr-2 mt-1 agency-type" id="person" />
                                        <label class="badge badge-outline-primary p-2">{{ __('shared::users.person') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="type" value="agency" {{ old('type', $agency->type) === 'agency' ? 'checked' : '' }}
                                        class="form-check-inline float-left mr-2 mt-1 agency-type" id="agency" />
                                        <label class="badge badge-outline-primary p-2">{{ __('shared::users.agency') }}</label>
                                    </div>
                                    @error('type')
                                    <div>
                                        <span class="badge badge-danger">{{ $errors->first('type') }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-row">
                                    <!-- Start Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="nameField"> {{ __('shared::users.agency') }} | {{ __('shared::users.person') }}</label>
                                        <input type="text" class="field form-control @error('name') border border-danger @enderror"
                                               name="name" value="{{ old('name', $agency->name) }}" id="name" placeholder="{{ __('shared::commons.name') }}">
                                        @error('name')
                                        <div>
                                            <span class="badge badge-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="identityNumber">{{ __('shared::commons.identity_number') }}</label>
                                        <input type="text"  maxlength="10"
                                               class="field form-control @error('identity_number') border border-danger @enderror"
                                               name="identity_number"
                                               value="{{ old('identity_number', $agency->identity_number) }}" id="identityNumber"
                                               placeholder="{{ __('shared::commons.identity_number') }}">
                                        @error('identity_number')
                                        <div>
                                            <span class="badge badge-danger">{{ $errors->first('identity_number') }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-row">

                                    <!-- End Name -->


                                    <!-- Start Email -->
                                    <div class="col-md-6 mb-3">
                                        <label for="email">{{ __('shared::commons.email') }}</label>
                                        <input type="email" class="field form-control @error('email') border border-danger @enderror"
                                               name="email" id="email" value="{{ old('email', $agency->email) }}"
                                               placeholder="{{ __('shared::commons.email') }}" required>
                                        @error('email')
                                        <div>
                                            <span class="badge badge-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                        @enderror

                                        <div id="invalidEmailMsg" style="display: none;">
                                            <span class="badge badge-danger">
                                                {{ __('shared::validations.email.unique') }}
                                            </span>
                                        </div>
                                    </div>
                                    <!-- End Email -->

                                    <!-- Start Email -->
                                    <div class="col-md-3 mb-2">
                                        <label for="mobile">{{ __('shared::commons.mobile_number') }}</label>
                                        <input type="text" maxlength="10" class="field form-control @error('mobile') border border-danger @enderror"
                                               name="mobile" id="mobile" value="{{ old('mobile', $agency->mobile) }}"
                                               placeholder="{{ __('shared::commons.mobile_number') }}" required>
                                        @error('mobile')
                                        <div>
                                            <span class="badge badge-danger">{{ $errors->first('mobile') }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Email -->

                                    <!-- Start City Number -->
                                    <div class="col-md-3 mb-3">
                                        @inject('city', '\App\City')
                                        <label for="identity_number">{{ __('shared::commons.city') }}</label>
                                        <select class="form-control" name="city">
                                            @foreach($city->all() as $c)
                                                <option value="{{ $c->name_en }}" {{ old('city') == $c->name_en || $agency->city_id == $c->id ? 'selected' : '' }}>{{ $c->name_ar }}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End City Number -->

                                </div>

                                <hr>


                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label for="password">{{ __('shared::commons.password') }}</label>
                                        <input type="password" name="password"
                                               class="field form-control @error('password') border border-danger @enderror" id="password"
                                               placeholder="{{ __('shared::commons.password') }}" autocomplete="off" required>
                                        @error('password')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password_confirmation">{{ __('shared::commons.password_confirmation') }}</label>
                                        <input type="password" name="password_confirmation"
                                               class="field form-control @error('password') border border-danger @enderror"
                                               id="passwordConfirmation" placeholder="{{ __('shared::commons.password_confirmation') }}"
                                               autocomplete="off" required>
                                        @error('password_confirmation')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                </div>

                                <hr>


                                <!-- Bank account number -->

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="bank">{{ __('shared::commons.address') }}</label>
                                        <textarea id="bank"
                                                  class="form-control badge-outline-dark @error('address') border border-danger @enderror"
                                                  id="address" name="address" rows="4">{{ old('address', $agency->address) }}</textarea>
                                        @error('address')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                </div>

                                <hr>
                                @if($agency->type != "agency" )
                                @include('admin::users.agencies.partials._edit_services_radios', ['agency' => $agency])
                                @else
                                @include('admin::users.agencies.partials._edit_services_checks', ['agency' => $agency])
                             @endif
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="isActive" name="is_active"
                                                   value="{{ old('is_active') == 1 ? 1 : 0 }}" {{$agency->is_active == true ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="isActive">
                                                {{ __('shared::commons.active') }}
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-raised btn-raised-primary btn-sm btn-rounded m-1 mt-3">
                                    {{ __('shared::actions.update') }}
                                </button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styling...')
    <style>
        .form-label{
            font-size: 14px;
            font-weight: bold;
        }
    </style>
@endsection
