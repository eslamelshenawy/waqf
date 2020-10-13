@extends('admin::layouts.master')
@section('content')
@md
<section class="tenants">
    <div class="container" id="tenantContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="{{ route('Admin::buildings.index') }}" class="float-right">&times;</a>
                        <div class="clearfix"></div>
                        <div class="card-title"><br><h4>{{ __('shared::estates.building', ['something' => __('shared::actions.new')]) }}</h4><br></div>
                        <hr>
                    <form class="needs-validation" novalidate method="POST"
                          action="{{ route('Admin::buildings.store') }}"
                          autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <!-- Start District -->
                            <div class="col-md-6 mb-2">
                                <label for="name">{{ __('shared::commons.name') }}</label>
                                <input type="text" class="field form-control @error('name') border border-danger @enderror" name="name"
                                       id="name" value="{{ old('name') }}"
                                       placeholder="{{ __('shared::commons.name') }}" required>
                                @error('name')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <!-- End Name -->
                        <div class="form-row">
                            <!-- Start City Number -->
                            <div class="col-md-3 mb-3">
                                @inject('city', '\App\City')
                                <label for="identity_number">{{ __('shared::commons.city') }}</label>
                                <select class="form-control" name="city">
                                    <option selected disabled>{{ __('shared::actions.select') }}</option>
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
                            <!-- End City Number -->
                            <!-- Start District -->
                            <div class="col-md-5 mb-2">
                                <label for="district">{{ __('shared::estates.district') }}</label>
                                <input type="text" class="field form-control @error('district') border border-danger @enderror"
                                       name="district"
                                       id="district" value="{{ old('district') }}" placeholder="{{ __('shared::estates.district') }}" required>
                                @error('district')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End District -->
                            <!-- Start District -->
                            <div class="col-md-5 mb-2">
                                <label for="street">{{ __('shared::estates.street') }}</label>
                                <input type="text" class="field form-control @error('street') border border-danger @enderror" name="street"
                                       id="street" value="{{ old('street') }}" placeholder="{{ __('shared::estates.street') }}" required>
                                @error('street')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End District -->
                        </div>
                        <hr>
                        <div class="form-row">
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-2">
                                <label for="number">{{ __('shared::commons.number') }}</label>
                                <input type="text" class="field form-control @error('number') border border-danger @enderror"
                                       name="number"
                                       id="number" value="{{ old('number') }}" placeholder="{{ __('shared::commons.number') }}" required>
                                @error('number')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-2">
                                <label for="space">{{ __('shared::commons.space') }}</label>
                                <input type="text" class="field form-control @error('space') border border-danger @enderror" name="space"
                                       id="space" value="{{ old('space') }}"
                                       placeholder="{{ __('shared::commons.space') }}" required>
                                @error('space')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-2">
                                <label for="price">{{ __('shared::commons.price') }}</label>
                                <input type="text" class="field form-control @error('price') border border-danger @enderror" name="price"
                                       id="price" value="{{ old('price') }}" placeholder="{{ __('shared::commons.price') }}" required>
                                @error('price')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Building Number -->
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-10 mb-2">
                                <table class="table table-borderless text-center">
                                    <tr>
                                        <td colspan="1"><h5>{{ __('shared::commons.number_of') }}</h5></td>
                                        <td style="width: 100px;"><label for="number_of_apartments">{{ __('shared::estates.apartments') }}</label></td>
                                        <td style="width: 100px;"><label for="number_of_floors">{{ __('shared::estates.floors') }}</label></td>
                                        <td style="width: 100px;"><label for="number_of_apartments">{{ __('shared::estates.shops') }}</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"></td>
                                        <td><input type="number" maxlength="10" class="field form-control @error('number_of_apartments') border border-danger @enderror" name="number_of_apartments"
                                                   id="numberOfApartments" value="{{ old('number_of_apartments') }}" placeholder="0" required></td>
                                        <td><input type="number" maxlength="10" class="field form-control @error('number_of_floors') border border-danger @enderror" name="number_of_floors"
                                                   id="numberOfFloors" value="{{ old('number_of_floors') }}" placeholder="0" required></td>
                                        <td><input type="number" maxlength="10" class="field form-control @error('number_of_shops') border border-danger @enderror" name="number_of_shops" id="numberOfShops" value="{{ old('number_of_shops') }}" placeholder="0" required></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                       <hr>
                        <div class="form-row">
                            <!-- Start Building Number -->
                            <div class="col-md-4 mb-1">
                                <label for="instrumentNumber">{{ __('shared::estates.instrument_number') }}</label>
                                <input type="text"
                                       class="form-control"
                                       name="instrument_number"
                                       id="instrumentNumber" value="{{ old('instrument_number') }}"
                                       placeholder="{{ __('shared::estates.instrument_number') }}" required>
                                @error('instrument_number')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-1">
                                <label for="instrumentDataAt">{{ __('shared::estates.instrument_date') }}</label>
                                <input type="date" maxlength="10" class="field form-control @error('instrument_date_at') border border-danger @enderror" name="instrument_date_at"
                                       id="instrumentDataAt" value="{{ old('instrument_date_at') }}" required>
                                @error('instrument_date_at')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-4 mb-1">
                                <label for="court">{{ __('shared::estates.court') }}</label>
                                <input type="text" class="field form-control @error('court') border border-danger @enderror" name="court"
                                       id="courtName" value="{{ old('court') }}" placeholder="{{ __('shared::estates.court') }}" required>
                                @error('court')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Building Number -->
                        </div>
                        <hr>
                        <div class="form-row">
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-1">
                                <label for="constructionLicenseNumber">{{ __('shared::estates.construction_license_number') }}</label>
                                <input type="text" class="field form-control @error('construction_license_number') border border-danger @enderror"
                                       name="construction_license_number"
                                       id="constructionLicenseNumber" value="{{ old('construction_license_number') }}"
                                       placeholder="{{ __('shared::estates.construction_license_number') }}" required>
                                @error('construction_license_number')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-1">
                                <label for="constructionLicenseDateAt">{{ __('shared::estates.construction_license_date') }}</label>

                                <input type="date" class="field form-control @error('construction_license_date_at') border border-danger @enderror"
                                       name="construction_license_date_at"
                                       id="constructionLicenseDateAt" value="{{ old('construction_license_date_at') }}"
                                       placeholder="{{ __('shared::estates.construction_license_date') }}" required>
                                @error('construction_license_date_at')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Building Number -->
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label class="form-check-label">{{ __('shared::estates.estate_type') }}</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="buildingTypeResidential"
                                           name="usage_type[]" value="residential" {{ old('usage_type.0') == 'residential' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="buildingTypeResidential">{{ __('shared::estates.residential') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="buildingTypeCommerical"
                                           name="usage_type[]" value="commercial" {{ old('usage_type.1') == 'commercial' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="buildingTypeCommercial">{{ __('shared::estates.commercial') }}</label>
                                </div>
                            </div>

                            @error('usage_type')
                            <div>
                                <span class="badge badge-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <hr>
                        <label>{{ __('shared::estates.instrument_image') }}</label>
                        @uploader(['field' => 'instrument_image', 'title' => __('shared::estates.instrument_image')])
                        @error('instrument_image')
                        <div>
                            <span class="badge badge-danger">{{ $message }}</span>
                        </div>
                        @enderror
                        <hr>
                        <label>{{ __('shared::estates.building_license_image') }}</label>
                        @uploader(['field' => 'building_license_image', 'title' => __('shared::estates.license_image') ])
                        @error('building_license_image')
                        <div>
                            <span class="badge badge-danger">{{ $message }}</span>
                        </div>
                        @enderror
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="extraDetails">{{ __('shared::commons.extra_details') }}</label>
                                <textarea name="extra_details"
                                          class="form-control @error('extra_details') border border-danger @enderror"
                                          rows="8"
                                          id="extraDetails">{{ old('extra_details') }}</textarea>
                                @error('extra_details')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Bank account number -->
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 mb-4 mt-2">
                                <label class="form-check-label">{{ __('shared::commons.rent_type') }}</label>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="rent_type" id="rentTypeMonthly"
                                           value="monthly" @if(old('rent_type') == 'monthly') checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">{{ __('shared::commons.monthly') }}</label>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rent_type"
                                           id="rentTypeQuarterly"
                                           value="quarterly" @if(old('rent_type') == 'quarterly') checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">{{ __('shared::commons.quarterly') }}</label>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="rent_type"
                                           id="rendTypeMidterm" value="midterm" @if(old('rent_type') == 'midterm') checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">{{ __('shared::commons.midterm') }}</label>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="rent_type"
                                           id="rentTypeYearly" value="yearly" @if(old('rent_type') == 'yearly') checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">{{ __('shared::commons.yearly') }}</label>
                                </div>
                            </div>
                            @error('rent_type')
                            <div>
                                <span class="badge badge-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <!-- end of col -->
                            <div class="col-md-6 mb-4">
                                <h5 class="card-title">{{ __('shared::estates.building_images') }}</h5>
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
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1">
                                    <label class="custom-control-label" for="isActive">{{ __('shared::commons.active') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <label for="searchMapInput" class="col-sm-2 col-form-label"> Address</label>
                            <input type="text" id="searchMapInput" name="searchmab" value="" class="form-control map-input">
                            <div class="col-sm-10">
                                <div id="map_edit" style="height: 500px;z-index:20"></div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <label for="lat" class="col-sm-2 col-form-label"> lat</label>
                            <div class="col-sm-10">

                                <input type="text" id="lat" name="lat" value="" class="form-control map-input">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <label for="lng" class="col-sm-2 col-form-label"> lng</label>
                            <div class="col-sm-10">

                                <input type="text" id="lng" name="lng" value="" class="form-control map-input">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-raised btn-raised-primary btn-rounded btn-sm m-1 mt-3">
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
@section('scripting...')
<script>
    let email = document.getElementById('email');
    email.addEventListener('keyup', function(){
        axios.post('/api/email-checker', {
            email: document.getElementById('email').value
        })
        .then((response) => {
            if(response.data === true){
                document.getElementById('email').classList.add("border", "border-danger");
                document.getElementById('invalidEmailMsg').style.display = 'block';
            }

        })
    });
    let counter = 0;
    let deleteKid = function(nodeNo){
        document.getElementById('removeBtn-' + nodeNo).addEventListener('click', function(e){
            let kidNode = document.getElementById('kid-' + nodeNo);
            kidNode.remove();
            counter -= 1;
        });
    };
    let handleKids = function(val){
        if(val === '1'){
            document.getElementById('kids').style.display = 'block';
            document.getElementById('addKid').style.display = 'block';
        }
        if(val === '0'){
            document.getElementById('kids').style.display = 'none';
            document.getElementById('addKid').style.display = 'none';
        }
    };
    document.getElementById('name').focus();
    document.getElementById('email').value = '';
    let martialStatusElement = document.getElementById('maritalStatus');
    let haveKidsElement = document.getElementById('haveKids');
    let isHasKids = false;
    let maritalStatus = 'single';
    martialStatusElement.addEventListener('change', function(){
        maritalStatus = martialStatusElement.value;

        if(maritalStatus === 'single'){
            haveKidsElement.style.display = 'none';
        }
        else if(maritalStatus === 'married'){
            haveKidsElement.style.display = 'block';

        }else if(maritalStatus === 'widower'){
            haveKidsElement.style.display = 'block';
        }else if(maritalStatus === 'divorcee'){
            haveKidsElement.style.display = 'block';
        }
    });
    document.getElementById('addKid').addEventListener('click', function(e){
        counter += 1;
        let kidsDiv = document.getElementById('kids');
        let mainDiv = document.createElement('div');
        mainDiv.setAttribute('id', 'kid-' + counter);
        let kidId = document.createElement('input');
        kidId.setAttribute('type', 'hidden');
        kidId.setAttribute('name', 'kid_id[]');
        kidId.value = counter;
        mainDiv.appendChild(kidId);
        let topColumn = document.createElement('div');
        topColumn.setAttribute('class', 'form-row');
        let topColumnCell = document.createElement('div');
        topColumnCell.setAttribute('class', 'col-md-12 mb-3');
        topColumn.appendChild(topColumnCell);
        mainDiv.appendChild(topColumn);
        let btnRemove = document.createElement('button');
        btnRemove.setAttribute('type', 'button');
        btnRemove.setAttribute('class', 'btn btn-danger btn-raised-primary btn-lg btn-rounded m-1 mt-3 float-right');
        btnRemove.setAttribute('id', 'removeBtn-' + counter);
        btnRemove.setAttribute('onclick', 'deleteKid('+ counter +')');
        btnRemove.innerHTML = '&times;';
        topColumnCell.appendChild(btnRemove);
        let firstColumn = document.createElement('div');
        firstColumn.setAttribute('class', 'form-row');
        let firstColumnFirstInput = document.createElement('div');
        firstColumnFirstInput.setAttribute('class', 'col-md-6 mb-3');
        let firstColumnSecondInput = document.createElement('div');
        firstColumnSecondInput.setAttribute('class', 'col-md-6 mb-3');
        let secondColumn = document.createElement('div');
        secondColumn.setAttribute('class', 'form-row');
        let secondColumnFirstInput = document.createElement('div');
        secondColumnFirstInput.setAttribute('class', 'col-md-6 mb-3');
        let secondColumnSecondInput = document.createElement('div');
        secondColumnSecondInput.setAttribute('class', 'col-md-6 mb-3');
        let nameLabel = document.createElement('label');
        nameLabel.innerHTML = 'Name';
        let identityLabel = document.createElement('label');
        identityLabel.innerHTML = 'Identity Number';
        let genderLabel = document.createElement('label');
        genderLabel.innerHTML = 'Gender';
        let genderSelect = document.createElement('select');
        genderSelect.setAttribute('name', 'kid_gender[]');
        genderSelect.setAttribute('class', 'form-control');
        let maleOption = document.createElement('option');
        let femaleOption = document.createElement('option');
        maleOption.setAttribute('value', 'male');
        maleOption.innerHTML = 'Male';
        femaleOption.setAttribute('value', 'female');
        femaleOption.innerHTML = 'Female';
        genderSelect.appendChild(maleOption);
        genderSelect.appendChild(femaleOption);
        let birthOfDateLabel = document.createElement('label');
        birthOfDateLabel.innerHTML = 'Birth of Date';
        let birthOfDateInput = document.createElement('input');
        birthOfDateInput.setAttribute('type', 'date');
        birthOfDateInput.setAttribute('class', 'form-control');
        birthOfDateInput.setAttribute('name', 'kid_birth_of_date_at[]');
        secondColumnFirstInput.appendChild(genderLabel);
        secondColumnFirstInput.appendChild(genderSelect);
        secondColumnSecondInput.appendChild(birthOfDateLabel);
        secondColumnSecondInput.appendChild(birthOfDateInput);
        let nameInput = document.createElement('input');
        nameInput.setAttribute('type', 'text');
        nameInput.setAttribute('class', 'form-control');
        nameInput.setAttribute('name', 'kid_name[]');
        nameInput.placeholder = 'Name';
        let identityInput = document.createElement('input');
        identityInput.setAttribute('type', 'text');
        identityInput.setAttribute('class', 'form-control');
        identityInput.setAttribute('name', 'kid_identity_number[]');
        identityInput.placeholder = 'Identity Number';
        let line = document.createElement('hr');
        // col-md-12 mb-3 //
        firstColumnFirstInput.appendChild(nameLabel);
        firstColumnFirstInput.appendChild(nameInput);
        firstColumnSecondInput.appendChild(identityLabel);
        firstColumnSecondInput.appendChild(identityInput);
        firstColumn.appendChild(firstColumnFirstInput);
        firstColumn.appendChild(firstColumnSecondInput);
        secondColumn.appendChild(secondColumnFirstInput);
        secondColumn.appendChild(secondColumnSecondInput);
        mainDiv.appendChild(firstColumn);
        mainDiv.appendChild(secondColumn);
        mainDiv.appendChild(line);
        kidsDiv.appendChild(mainDiv);
    });
</script>
@endsection
