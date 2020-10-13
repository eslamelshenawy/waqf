@extends('admin::layouts.master')
@md
@section('content')
    <section class="tenants">
        <div class="container" id="tenantContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4>{{ __('shared::estates.edit_shop') }}</h4><br></div>
                            <hr>
                            <form class="needs-validation" novalidate method="POST" action="{{ route("Admin::shops.update", $shop->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div id="buildingsDiv" class="col-md-4 mb-4">
                                        <label for="building">{{ __('shared::estates.the_building') }}</label>
                                        @include('admin::lists._buildings', ['selected_id' => $shop->parent_id])
                                        @error('building')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Buildings List for each beneficiary -->
                                    <!-- Start City Number -->
                                    <div class="col-md-4 mb-4">
                                        @inject('city', '\App\City')
                                        <label for="city">{{ __('shared::commons.city') }}</label>
                                        <select class="form-control" name="city" id="city">
                                            <option selected disabled>{{ __('shared::actions.select') }}</option>
                                            @foreach($city->all() as $c)
                                                <option value="{{ $c->name_en }}" {{ old('city') == $c->name_en || $shop->city_id == $c->id ? 'selected' : '' }}>{{ $c->name_ar }}</option>
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
                                <div class="form-row">
                                    <!-- Start Shop Number -->
                                    <div class="col-md-3 mb-4">
                                        <label for="number">{{ __('shared::commons.number') }}</label>
                                        <input type="text" class="field form-control @error('number') border border-danger @enderror"
                                               name="number" value="{{ old('number', $shop->number) }}" id="number"
                                               placeholder="{{ __('shared::commons.number') }}" maxlength="10">
                                        @error('number')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Shop Number -->
                                    <!-- Start Shop Space -->
                                    <div class="col-md-3 mb-4">
                                        <label for="space">{{ __('shared::commons.space') }}</label>
                                        <input type="text" class="field form-control @error('space') border border-danger @enderror"
                                               name="space" value="{{ old('space', $shop->space) }}" id="space"
                                               placeholder="{{ __('shared::commons.space') }}" maxlength="10">
                                        @error('space')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Shop Number -->
                                    <!-- Start Shop Price -->
                                    <div class="col-md-3 mb-4">
                                        <label for="price">{{ __('shared::commons.price') }}</label>
                                        <input type="text" class="field form-control @error('price') border border-danger @enderror"
                                               name="price" value="{{ old('price', $shop->price) }}"
                                               id="shopPrice" placeholder="{{ __('shared::commons.price') }}"maxlength="9">
                                        @error('price')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Shop Price -->
                                </div>
                                <hr>
                               
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="isOnStreetFront">{{ __('shared::estates.is_on_street_front') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" {{  $shop->is_on_street_front == '1' ? 'checked' : '' }} class="form-check-inline" id="isOnStreetFrontYes" name="is_on_street_front">
                                        <label for="isOnStreetFrontYes">&nbsp;&nbsp;{{ __('shared::commons.yes') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="0" {{  $shop->is_on_street_front == '0' ? 'checked' : '' }} class="form-check-inline" id="isOnStreetFrontNo" name="is_on_street_front">
                                        <label for="isOnStreetFrontNo">&nbsp;&nbsp;{{ __('shared::commons.no') }}</label>
                                    </div>
                                    @error('is_on_street_front')
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
                                        <label for="isHasAirConditioner">{{ __('shared::estates.is_has_air_conditioner') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" {{  $shop->is_has_air_conditioner == '1' ? 'checked' : '' }}
                                               class="form-check-inline" id="isHasAirConditionerYes" name="is_has_air_conditioner" onchange="isHasAirConditioner(this.value)">
                                        <label for="isHasAirConditionerYes">&nbsp;&nbsp;{{ __('shared::commons.yes') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio"
                                               value="0" {{  $shop->is_has_air_conditioner == '0' ? 'checked' : '' }}
                                               class="form-check-inline" id="isHasAirConditionerNo" name="is_has_air_conditioner" onchange="isHasAirConditioner(this.value)">
                                        <label for="isHasAirConditionerNo">&nbsp;&nbsp;{{ __('shared::commons.no') }}</label>
                                    </div>
                                    @error('is_has_air_conditioner')
                                    <div>
                                        <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3" id="numberOfAirConditionerDiv"
                                         style="display: {{ $shop->is_has_air_conditioner == '1' ? 'block' : 'none' }};">
                                        <label for="numberOfAirConditioner">{{ __('shared::estates.number_of_conditioners') }}</label>
                                        <input type="number" name="number_of_air_conditioner" value="{{ $shop->number_of_air_conditioner }}" maxlength="2" class="form-check-inline form-control" id="numberOfAirConditioner">
                                    </div>
                                </div>
                                <div class="form-row" id="airConditionerBrandMainDiv">
                                    <div class="col-md-3 mb-3 air-conditioner-brand-div" id="airConditionerBrandDiv" style="display: {{  $shop->is_has_air_conditioner == '1' ? 'block' : 'none' }};">
                                        <label for="airConditionerBrand">{{ __('shared::estates.air_conditioner_brand') }}</label>
                                        <input type="text" name="air_conditioner_brand" class="form-check-inline form-control" value="{{$shop->is_has_air_conditioner }}" id="airConditionerBrand">
                                    </div>
                                </div>
                                <hr>
                                
                                <div class="form-row">
                                    <div class="col-md-12 mb-3 mt-4">
                                        <label for="isHasDecoration">{{ __('shared::estates.is_has_decoration') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" {{  $shop->is_has_decoration == '1' ? 'checked' : '' }} class="form-check-inline" id="isHasDecorationYes" name="is_has_decoration" onchange="isHasDecoration(this.value)">
                                        <label for="isHasDecorationYes">&nbsp;&nbsp;{{ __('shared::commons.yes') }}</label>
                                    </div>

                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="0" {{ $shop->is_has_decoration == '0' ? 'checked' : '' }}
                                               class="form-check-inline" id="isHasDecorationNo" name="is_has_decoration" onchange="isHasDecoration(this.value)">
                                        <label for="isHasDecorationNo">&nbsp;&nbsp;{{ __('shared::commons.no') }}</label>
                                    </div>
                                    @error('is_has_decoration')
                                    <div>
                                        <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3" id="decorationDetailsDiv" style="display: none;">
                                        <label for="decorationDetails">{{ __('shared::estates.decoration_details') }}</label>
                                        <textarea name="decoration_details"
                                                  class="form-check-inline form-control"
                                                  id="decorationDetails"
                                                  rows="4">{{  $shop->decoration_details }}</textarea>
                                    </div>
                                    @error('decoration_details')
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
                                        <label for="isHasParking">{{ __('shared::estates.is_has_parking') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" {{  $shop->is_has_warehouse == '1' ? 'checked' : '' }}
                                               class="form-check-inline"
                                               id="isHasWarehouseYes"
                                               name="is_has_warehouse"
                                               onchange="isHasWarehouse(this.value)">
                                        <label for="isHasWarehouseYes">&nbsp;&nbsp;{{ __('shared::commons.yes') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="0" class="form-check-inline" {{  $shop->is_has_warehouse == '0' ? 'checked' : '' }} id="isHasWarehouseNo" name="is_has_warehouse" onchange="isHasWarehouse(this.value)">
                                        <label for="isHasWarehouseNo">&nbsp;&nbsp;{{ __('shared::commons.no') }}</label>
                                    </div>
                                    @error('is_has_warehouse')
                                    <div>
                                        <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3" id="warehouseSpaceDiv" style="display: none;">
                                        <label for="warehouseSpace">{{ __('shared::commons.space') }}</label>
                                        <input type="text" name="warehouse_space" value="{{  $shop->warehouse_space }}"
                                               class="form-check-inline form-control @error('warehouse_space') border border-danger @enderror" id="warehouseSpace">
                                    </div>
                                    @error('warehouse_space')
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
                                        <label for="isHasParking">{{ __('shared::estates.is_has_license') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" {{  $shop->is_has_license == '1' ? 'checked' : '' }} class="form-check-inline" id="isHasLicenseYes" name="is_has_license" onchange="isHasLicense(this.value)">
                                        <label for="isHasLicenseYes">&nbsp;&nbsp;{{ __('shared::commons.yes') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="0" {{  $shop->is_has_license == '0' ? 'checked' : '' }}
                                               class="form-check-inline" id="isHasLicenseNo" name="is_has_license" onchange="isHasLicense(this.value)">
                                        <label for="isHasLicenseNo">&nbsp;&nbsp;{{ __('shared::commons.no') }}</label>
                                    </div>
                                    @error('is_has_license')
                                    <div>
                                        <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3" id="licenseNotesDiv" style="display: none;">
                                        <label for="licenseNotes">{{ __('shared::estates.license_notes') }}</label>
                                        <textarea name="license_notes" class="form-check-inline form-control" id="licenseNotes" rows="8">{{$shop->license_notes}}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3 mt-3">
                                        <label class="form-check-label">{{ __('shared::estates.rent_type') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeMonthly" value="monthly" {{  $shop->rent_type == 'monthly' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="rentTypeMonthly">{{ __('shared::estates.monthly') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeQuarterly" value="quarterly" {{  $shop->rent_type == 'quarterly' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="rentTypeQuarterly">{{ __('shared::estates.quarterly') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rendTypeMidterm" value="midterm" {{  $shop->rent_type == 'midterm' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="rendTypeMidterm">{{ __('shared::estates.midterm') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeYearly" value="yearly" {{  $shop->rent_type == 'yearly' ? 'checked' : '' }} />
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
                                    <div class="col-md-8 mb-3">
                                        <label for="commercialActivities">{{ __('shared::estates.commercial_activities') }}</label>
                                        <input type="text" name="commercial_activities" value="{{  $shop->getCommercialActivities() }}"
                                               class="form-control @error('commercial_activities') border border-danger @enderror" id="commercialActivities" />
                                    </div>
                                    @error('commercial_activities')
                                    <div>
                                        <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10 mb-3">
                                        <span><code>{{ __('shared::commons.using') }} <strong>", "</strong> {{ __('shared::commons.between_words') }} <quote><strong>{{ __('shared::commons.example') }}</strong> {{ __('shared::commons.electric_tools') }}, {{ __('shared::commons.foodstuffs') }}, {{ __('shared::commons.restaurants') }}, {{ __('shared::commons.etc') }}, ...</quote></code></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <!-- Start Email -->
                                    <div class="col-md-12 mb-3">
                                        <label for="extraDetails">{{ __('shared::estates.extra_details') }}</label>
                                        <textarea class="form-control @error('extra_details') border border-danger @enderror" name="extra_details" id="extraDetails" rows="8">{{ old('extra_details', $shop->extra_details) }}</textarea>
                                        @error('extra_details')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Email -->
                                </div>
                                <hr>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>{{ __('shared::estates.current_shop_images') }}</label>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        @foreach($shop->images as $image)
                                            <a href="{{url('/images')}}/{{ $image->name }}"><img src="{{url('/images')}}/{{ $image->name }}" alt="Apartment Image" class="img-thumbnail" width="100" height="100" /></a>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>

                                <div class="form-row">
                                    <div class="col-md-6 mb-4">
                                        <h5 class="card-title">{{ __('shared::estates.images') }}</h5>
                                        @uploader(['field' => 'images[]', 'title' => __('shared::commons.select_images'), 'multi' => true])
                                        @error('images')
                                        <div>
                                            <span class="badge badge-danger">
                                                {{ $message }}
                                            </span>
                                        </div>
                                        @enderror
                                        @if(session()->has('images_not_found'))
                                            <div>
                                            <span class="badge badge-danger">
                                                {{ __('shared::validations.images.required') }}
                                            </span>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- end of col -->
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1" {{ old('is_active', $shop->is_active) == '1' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="isActive">
                                                {{ __('shared::commons.active') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-raised-primary btn-rounded m-1 mt-3">
                                    {{ __('shared::actions.create') }}
                                </button>
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
       

        window.onload = function(){
            alert('Thanks');
        };
        let isHasAirConditioner = function(val){
            if(val === '1'){
                document.getElementById('numberOfAirConditionerDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('numberOfAirConditionerDiv').style.display = 'none';
                document.getElementById('airConditionerBrandDiv').style.display = 'none';
            }
        };
        function exec(){
            document.getElementById('numberOfAirConditioner').addEventListener('blur', function(){
                let currentValue = parseInt(this.value);
                let airConditionerBrandDiv = document.getElementById('airConditionerBrandDiv');
                if(isNaN(currentValue)){
                    airConditionerBrandDiv.style.display = 'none';
                }
                let currentBrandNodes = document.querySelectorAll('.air-conditioner-brand-div');
                if(currentValue >= 1){
                    airConditionerBrandDiv.style.display = 'block';
                    if(currentBrandNodes.length > 1){
                        let x, L = currentBrandNodes.length - 1;
                        for(x = L; x >= 1; x--){
                            currentBrandNodes[x].parentNode.removeChild(currentBrandNodes[x]);
                        }
                    }
                    for(let i=1; i<currentValue; i++){
                        let newNode = airConditionerBrandDiv.cloneNode(true);
                        document.getElementById('airConditionerBrandMainDiv').appendChild(newNode);
                    }
                }
                if(currentValue === 0){
                    document.getElementById('airConditionerBrandDiv').style.display = 'none';
                }
            });
        }
        exec();
        let isHasParking = function(val){
            if(val === '1'){
                document.getElementById('parkingNumberDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('parkingNumberDiv').style.display = 'none';
            }
        };
        let isHasDecoration = function(val){
            if(val === '1'){
                document.getElementById('decorationDetailsDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('decorationDetailsDiv').style.display = 'none';
            }
        };
        let isHasWarehouse = function(val){
            if(val === '1'){
                document.getElementById('warehouseSpaceDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('warehouseSpaceDiv').style.display = 'none';
            }
        };
        let isHasLicense = function(val){
            if(val === '1'){
                document.getElementById('licenseNotesDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('licenseNotesDiv').style.display = 'none';
            }
        };
        
         $(document).ready(function () {
            
            if ($('#isHasDecorationYes').is(':checked')) {
                document.getElementById('decorationDetailsDiv').style.display = 'block';
            } 
            
            if ($('#isHasLicenseYes').is(':checked')) {
                document.getElementById('licenseNotesDiv').style.display = 'block';
            }  
            
            if ($('#isHasWarehouseYes').is(':checked')) {
                document.getElementById('warehouseSpaceDiv').style.display = 'block';
            }
            
             if ($('#isHasDecorationNo').is(':checked')) {
                document.getElementById('decorationDetailsDiv').style.display = 'none';
            }
            
            
            if ($('#isHasLicenseNo').is(':checked')) {
                document.getElementById('licenseNotesDiv').style.display = 'none';
            }
            
            
              if ($('#isHasWarehouseNo').is(':checked')) {
                document.getElementById('warehouseSpaceDiv').style.display = 'none';
            }
            
    

        })
    </script>
@endpush
@section('styling...')
    <style>
        code {
            color: #639
        }
    </style>
@endsection
