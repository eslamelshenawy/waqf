@extends('admin::layouts.master')
@md
@section('content')
<section class="tenants">
    <div class="container" id="tenantContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title"><br><h4>{{ __('shared::estates.new_apartment') }}</h4><br></div>
                        <hr>
                    <form class="needs-validation" novalidate method="POST" action="{{ route('Admin::apartments.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div id="buildingsDiv" class="col-md-4 mb-4" style="display: block;">
                                <label for="building">{{ __('shared::estates.select_building') }}</label>
                                @include('admin::lists._buildings')
                                @error('building')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                            <!-- Start Identity Number -->
                            <div class="col-md-3 mb-3">
                                @inject('city', '\App\City')
                                <label for="identity_number">{{ __('shared::commons.city') }}</label>
                                <select class="form-control" name="city">
                                    @foreach($city->all() as $c)
                                        <option value="{{ $c->name_en }}" {{ old('city') == $c->name_en ? 'selected' : '' }}>{{ $c->name_ar }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Identity Number -->


                        </div>

                        <hr>

                        <div class="form-row">

                            <!-- Start Apartment Number -->
                            <div class="col-md-3 mb-4">
                                <label for="number">{{ __('shared::commons.number') }}</label>
                                <input type="text" class="field form-control @error('number') border border-danger @enderror"
                                       name="number" value="{{ old('number') }}" id="number"
                                       placeholder="{{ __('shared::commons.number') }}" maxlength="10">
                                @error('number')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Apartment Number -->

                            <!-- Start Apartment Space -->
                            <div class="col-md-3 mb-4">
                                <label for="space">{{ __('shared::commons.space') }}</label>
                                <input type="text" class="field form-control @error('space') border border-danger @enderror"
                                       name="space" value="{{ old('space') }}" id="name"
                                       placeholder="{{ __('shared::commons.space') }}" maxlength="10">
                                @error('space')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Apartment Number -->


                            <!-- Start Apartment Price -->
                            <div class="col-md-3 mb-4">
                                <label for="floorNumber">{{ __('shared::commons.price') }}</label>
                                <input type="text" class="field form-control @error('price') border border-danger @enderror"
                                       name="price" value="{{ old('price') }}"
                                       id="price" placeholder="{{ __('shared::commons.price') }}" maxlength="9">
                                @error('price')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Apartment Price -->

                            <!-- Start Floor number -->
                            <div class="col-md-2 mb-4">
                                <label for="floorNumber">{{ __('shared::estates.floor_number') }}</label>
                                <input type="text" class="field form-control @error('floor_number') border border-danger @enderror"
                                       name="floor_number" value="{{ old('floor_number') }}"
                                       id="floorNumber" placeholder="{{ __('shared::estates.floor_number') }}" maxlength="10">
                                @error('floor_number')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Floor number -->
                        </div>

                        <hr>

                        <div class="form-row">

                            <div class="col-md-10 mb-2">
                                <table class="table table-borderless text-center">

                                    <tr>
                                        <td colspan="1"><h5>{{ __('shared::commons.number_of') }}</h5></td>
                                        <td style="width: 100px;"><label for="number_of_rooms">{{ __('shared::estates.rooms') }}</label></td>
                                        <td style="width: 100px;"><label for="number_of_toilets">{{ __('shared::estates.toilets') }}</label></td>
                                        <td style="width: 100px;"><label for="number_of_kitchens">{{ __('shared::estates.kitchens') }}</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"></td>
                                        <td><input type="number" maxlength="10" class="field form-control @error('number_of_rooms') border border-danger @enderror" name="number_of_rooms"
                                                   id="numberOfRoom" value="{{ old('number_of_rooms') }}" placeholder="0" required></td>

                                        <td><input type="number" maxlength="10" class="field form-control @error('number_of_toilets') border border-danger @enderror" name="number_of_toilets"
                                                   id="numberOfToilets" value="{{ old('number_of_toilets') }}" placeholder="0" required></td>

                                        <td><input type="number" maxlength="10" class="field form-control @error('number_of_kitchens') border border-danger @enderror" name="number_of_kitchens"
                                                   id="numberOfKitchens" value="{{ old('number_of_kitchens') }}" placeholder="0" required></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">

                            <div class="col-md-12">
                                <label for="isHasAirConditioner">{{ __('shared::estates.is_has_air_conditioner') }}</label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="1" class="form-check-inline"
                                       id="isHasAirConditionerYes"
                                       name="is_has_air_conditioner"
                                       onchange="isHasAirConditioner(this.value)" {{ old('is_has_air_conditioner') == '1' ? 'checked' : '' }} />
                                <label for="isHasAirConditionerYes">&nbsp;&nbsp;{{ __('shared::commons.yes') }}</label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="0" class="form-check-inline"
                                       id="isHasAirConditionerNo" name="is_has_air_conditioner"
                                       onchange="isHasAirConditioner(this.value)" {{ old('is_has_air_conditioner') == '0' ? 'checked' : '' }}>
                                <label for="isHasAirConditionerNo">&nbsp;&nbsp;{{ __('shared::commons.no') }}</label>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-2 mb-3 mt-3" id="numberOfAirConditionerDiv" style="display: {{ old('is_has_air_conditioner') == '1' ? 'block' : 'none' }};">
                                <label for="numberOfAirConditioner">&nbsp;&nbsp;{{ __('shared::estates.number_of_conditioners') }}</label>
                                <input type="number" name="number_of_air_conditioner" value="{{ old('number_of_air_conditioner') }}"
                                       class="form-check-inline form-control" maxlength="5" id="numberOfAirConditioner" />
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="col-md-12 mb-3 mt-4">
                                <label for="isKitchenReady">&nbsp;&nbsp;{{ __('shared::estates.is_kitchen_ready') }}</label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="1" {{ old('is_kitchen_ready') == '1' ? 'checked' : '' }}
                                       class="form-check-inline" id="isKitchenReadyYes" name="is_kitchen_ready" onchange="isKitchenReady(this.value)">
                                <label for="isKitchenReadyYes">&nbsp;&nbsp;{{ __('shared::commons.yes') }}</label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="0" {{ old('is_kitchen_ready') == '0' ? 'checked' : '' }}
                                       class="form-check-inline" id="isKitchenReadyNo" name="is_kitchen_ready" onchange="isKitchenReady(this.value)">
                                <label for="isKitchenReadyNo">&nbsp;&nbsp;{{ __('shared::commons.no') }}</label>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3 mt-3" id="kitchenDetailsDiv" style="display: {{ old('is_kitchen_ready') == '1' ? 'block' : 'none' }};">
                                <label for="kitchenDetails">{{ __('shared::estates.kitchen_details') }}</label>
                                <textarea name="kitchen_details" class="form-check-inline form-control mt-2" id="kitchenDetails" rows="4">{{ old('kitchen_details') }}</textarea>
                            </div>

                            @error('is_kitchen_ready')
                            <div>
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror

                            @error('kitchen_details')
                            <div>
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror

                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="col-md-12 mb-3 mt-4">
                                <label for="isHasParking">&nbsp;&nbsp;{{ __('shared::estates.is_has_parking') }}</label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="1" {{ old('is_has_parking') == '1' ? 'checked' : '' }}
                                       class="form-check-inline" id="isHasParkingYes" name="is_has_parking" onchange="isHasParking(this.value)">
                                <label for="isHasParkingYes">&nbsp;&nbsp;{{ __('shared::commons.yes') }}</label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="0" {{ old('is_has_parking') == '0' ? 'checked' : '' }}
                                       class="form-check-inline" id="isHasParkingNo" name="is_has_parking" onchange="isHasParking(this.value)">
                                <label for="isHasParkingNo">&nbsp;&nbsp;{{ __('shared::commons.no') }}</label>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="col-md-3 mb-3 mt-3" id="parkingNumberDiv" style="display: {{ old('is_has_parking') == '0' ? 'block' : 'none' }};">
                                <label for="parkingNumber">&nbsp;&nbsp;{{ __('shared::estates.parking_number') }}</label>
                                <input type="text" name="parking_number" class="form-check-inline form-control" id="parkingNumber" value="{{ old('parking_number') }}">
                            </div>

                            @error('is_has_parking')
                            <div>
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror

                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label class="form-check-label">{{ __('shared::estates.rent_type') }}</label>
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-check form-check-inline col-md-2 mt-4">
                                <input class="form-check-input" type="radio"
                                       name="rent_type" {{ old('rent_type') == 'monthly' ? 'checked' : '' }}
                                       id="rentTypeMonthly" value="monthly">
                                <label class="form-check-label" for="rentTypeMonthly">{{ __('shared::estates.monthly') }}</label>
                            </div>

                            <div class="form-check form-check-inline col-md-2 mt-4">
                                <input class="form-check-input" type="radio"
                                       name="rent_type" {{ old('rent_type') == 'quarterly' ? 'checked' : '' }}
                                       id="rentTypeQuarterly" value="quarterly">
                                <label class="form-check-label" for="rentTypeQuarterly">{{ __('shared::estates.quarterly') }}</label>
                            </div>

                            <div class="form-check form-check-inline col-md-2 mt-4">
                                <input class="form-check-input" type="radio"
                                       name="rent_type" {{ old('rent_type') == 'midterm' ? 'checked' : '' }}
                                       id="rendTypeMidterm" value="midterm">
                                <label class="form-check-label" for="rendTypeMidterm">{{ __('shared::estates.midterm') }}</label>
                            </div>

                            <div class="form-check form-check-inline col-md-2 mt-4">
                                <input class="form-check-input" type="radio"
                                       name="rent_type" {{ old('rent_type') == 'yearly' ? 'checked' : '' }}
                                       id="rentTypeYearly" value="yearly">
                                <label class="form-check-label" for="rentTypeYearly">{{ __('shared::estates.yearly') }}</label>
                            </div>

                            @error('rent_type')
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
                                <textarea class="form-control" name="extra_details" id="extraDetails" rows="8">{{ old('extra_details') }}</textarea>
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
                                <h5 class="card-title">{{ __('shared::estates.apartment_images') }}</h5>

                                @uploader(['field' => 'images[]', 'multi' => true,
                                'title' => __('shared::commons.select_images')])
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
{{--                        <div class="col-lg-8">--}}
{{--                            <label for="searchMapInput" class="col-sm-2 col-form-label"> Address</label>--}}
{{--                            <input type="text" id="searchMapInput" name="searchmab" value="" class="form-control map-input">--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <div id="map_edit" style="height: 500px;z-index:20"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-8">--}}
{{--                            <label for="lat" class="col-sm-2 col-form-label"> lat</label>--}}
{{--                            <div class="col-sm-10">--}}

{{--                                <input type="text" id="lat" name="lat" value="" class="form-control map-input">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-8">--}}
{{--                            <label for="lng" class="col-sm-2 col-form-label"> lng</label>--}}
{{--                            <div class="col-sm-10">--}}

{{--                                <input type="text" id="lng" name="lng" value="" class="form-control map-input">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-raised btn-raised-primary btn-rounded m-1 mt-3">{{ __('shared::actions.create') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</section>
@endsection


@push('scripts...')
<script>
    let isHasAirConditioner = function(val){
        if(val === '1'){
            document.getElementById('numberOfAirConditionerDiv').style.display = 'block';
        }else if(val === '0'){
            document.getElementById('numberOfAirConditionerDiv').style.display = 'none';
        }
    };

    let isKitchenReady = function(val){
        if(val === '1'){
            document.getElementById('kitchenDetailsDiv').style.display = 'block';
        }else if(val === '0'){
            document.getElementById('kitchenDetailsDiv').style.display = 'none';
        }
    };

    let isHasParking = function(val){
        if(val === '1'){
            document.getElementById('parkingNumberDiv').style.display = 'block';
        }else if(val === '0'){
            document.getElementById('parkingNumberDiv').style.display = 'none';
        }
    }
</script>
@endpush


