@extends('admin::layouts.master')

@section('content')

    <section class="tenants">
        <div class="container" id="tenantContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4>{{ __('shared::estates.lands.new') }}</h4><br></div>
                            <hr>

                            <form class="needs-validation" novalidate method="POST" action="{{ route('Admin::lands.store') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="form-row">
{{--                                    <!-- Start Beneficiaries -->--}}
{{--                                    <div class="col-md-3 mb-4">--}}
{{--                                        <!-- Start Users -->--}}
{{--                                        <label for="userId">Beneficiaries</label>--}}
{{--                                        @include('admin::lists._beneficiaries')--}}
{{--                                        @error('user')--}}
{{--                                        <div>--}}
{{--                                            <span class="badge badge-danger">{{ $message }}</span>--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                    <!-- End Beneficiaries -->--}}


                                    <!-- Start Buildings List for each beneficiary -->
                                    <div id="citiesDiv" class="col-md-3 mb-4">
                                        <label for="cities">City</label>
                                        @include('shared::lists._cities')
                                        @error('city')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Buildings List for each beneficiary -->

                                    <!-- Start Buildings List for each beneficiary -->
                                    <div id="districtDiv" class="col-md-3 mb-4">
                                        <label for="district">{{ __('shared::estates.district') }}</label>
                                        <input type="text" class="field form-control @error('district') border border-danger @enderror"
                                               name="district" value="{{ old('district') }}" id="district"
                                               placeholder="{{ __('shared::estates.district') }}">
                                        @error('district')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Buildings List for each beneficiary -->

                                    <!-- Start Buildings List for each beneficiary -->
                                    <div id="streetDiv" class="col-md-3 mb-4">
                                        <label for="street">{{ __('shared::estates.street') }}</label>
                                        <input type="text" class="field form-control @error('street') border border-danger @enderror"
                                               name="street" value="{{ old('street') }}" id="street"
                                               placeholder="{{ __('shared::estates.street') }}">
                                        @error('street')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Buildings List for each beneficiary -->

                                </div>

                                <div class="form-row">

                                    <!-- Start Apartment Number -->
                                    <div class="col-md-3 mb-4">
                                        <label for="number">{{ __('shared::estates.lands.fields.number') }}</label>
                                        <input type="text" class="field form-control @error('number') border border-danger @enderror"
                                               name="number" value="{{ old('number') }}" id="number"
                                               placeholder="{{ __('shared::estates.lands.fields.number') }}" maxlength="10">
                                        @error('number')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Apartment Number -->

                                    <!-- Start Apartment Space -->
                                    <div class="col-md-3 mb-4">
                                        <label for="space">{{ __('shared::estates.lands.fields.space') }}</label>
                                        <input type="text" class="field form-control @error('space') border border-danger @enderror"
                                               name="space" value="{{ old('space') }}" id="space"
                                               placeholder="{{ __('shared::estates.lands.fields.space') }}" maxlength="9">
                                        @error('space')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Apartment Number -->


                                    <!-- Start Apartment Price -->
                                    <div class="col-md-3 mb-4">
                                        <label for="landPrice">{{ __('shared::estates.lands.fields.price') }}</label>
                                        <input type="text" class="field form-control @error('price') border border-danger @enderror"
                                               name="price" value="{{ old('price') }}"
                                               id="landPrice" placeholder="{{ __('shared::estates.lands.fields.price') }}" maxlength="9">
                                        @error('price')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Apartment Price -->
                                </div>


                                <div class="form-row">
                                    <!-- Start Floor number -->
                                    <div class="col-md-7 mb-4">
                                        <label for="location">{{ __('shared::estates.lands.fields.location') }}</label>
                                        <input type="text" class="field form-control @error('location') border border-danger @enderror"
                                               name="location" value="{{ old('location') }}"
                                               id="location" placeholder="{{ __('shared::estates.lands.fields.location') }}">
                                        @error('location')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Floor number -->
                                </div>

                                <hr>

                                <div class="form-row">
                                    <!-- Start Email -->
                                    <div class="col-md-4 mb-3">
                                        <label for="instrumentNumber">{{ __('shared::estates.instruments.number') }}</label>
                                        <input type="text" class="field form-control @error('instrument_number') border border-danger @enderror"
                                               name="instrument_number" value="{{ old('instrument_number') }}"
                                               id="instrumentNumber"
                                               placeholder="{{ __('shared::estates.instruments.number') }}" maxlength="10">
                                        @error('instrument_number')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="instrumentDate">{{ __('shared::estates.instruments.date_at') }}</label>
                                        <input type="date" class="field form-control @error('instrument_date_at') border border-danger @enderror"
                                               name="instrument_date_at" value="{{ old('instrument_date_at') }}"
                                               id="instrumentDateAt"
                                               placeholder="{{ __('shared::estates.instruments.date_at') }}">
                                        @error('instrument_date_at')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="court">{{ __('shared::estates.courts.name') }}</label>
                                        <input type="text" class="field form-control @error('court') border border-danger @enderror"
                                               name="court" value="{{ old('court') }}"
                                               id="court" placeholder="{{ __('shared::estates.courts.name') }}">
                                        @error('court')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                </div>

                                <hr>

                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label class="form-check-label">{{ __('shared::estates.lands.fields.type') }}</label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="checkbox" name="land_type[]" id="landTypeResidential" value="residential">
                                        <label class="form-check-label" for="landTypeResidential">{{ __('shared::estates.residential') }}</label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="checkbox" name="land_type[]" id="landTypeCommercial" value="commercial">
                                        <label class="form-check-label" for="landTypeCommercial">{{ __('shared::estates.commercial') }}</label>
                                    </div>

                                    @error('land_type')
                                    <div>
                                        <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    </div>
                                    @enderror

                                </div>


                                <hr>


                                <div class="form-row">
                                    <!-- Start Email -->
                                    <div class="col-md-12 mb-3">
                                        <label for="extraDetails">{{ __('shared::estates.extra_details') }}</label>
                                        <textarea class="form-control" name="extra_details" id="extraDetails" rows="8"></textarea>
                                        @error('extra_details')
                                        <div>
                                            <span class="badge badge-danger"></span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Email -->
                                </div>

                                <hr>

                                <div class="form-row">
                                    <!-- end of col -->
                                    <div class="col-md-6 mb-4">
                                        <h5 class="card-title">{{ __('shared::estates.lands.images') }}</h5>
                                       @uploader(['field' => 'images[]',
                                        'title' => __('shared::commons.select_images'), 'multi' => true])

                                        @error('images')
                                        <div>
                                            <span class="badge badge-danger">
                                                {{ $message }}
                                            </span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- end of col -->


                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1">
                                            <label class="custom-control-label" for="isActive">{{ __('shared::commons.active') }}</label>
                                        </div>

                                    </div>
                                </div>
{{--                                <div class="col-lg-8">--}}
{{--                                    <label for="searchMapInput" class="col-sm-2 col-form-label"> Address</label>--}}
{{--                                    <input type="text" id="searchMapInput" name="searchmab" value="" class="form-control map-input">--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        <div id="map_edit" style="height: 500px;z-index:20"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-8">--}}
{{--                                    <label for="lat" class="col-sm-2 col-form-label"> lat</label>--}}
{{--                                    <div class="col-sm-10">--}}

{{--                                        <input type="text" id="lat" name="lat" value="" class="form-control map-input">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-8">--}}
{{--                                    <label for="lng" class="col-sm-2 col-form-label"> lng</label>--}}
{{--                                    <div class="col-sm-10">--}}

{{--                                        <input type="text" id="lng" name="lng" value="" class="form-control map-input">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <button type="submit" class="btn btn-raised btn-raised-primary btn-rounded m-1 mt-3">{{ __('shared::actions.create') }}</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection


@section('scripting...')
    <script>

    </script>
@endsection
