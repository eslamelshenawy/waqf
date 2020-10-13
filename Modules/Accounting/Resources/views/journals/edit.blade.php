@extends('admin::layouts.master')

@section('content')

    <section class="tenants">
        <div class="container" id="tenantContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4>Create new building</h4><br></div>
                            <hr>

                            <form class="needs-validation" novalidate method="POST" action="{{ route('Admin::buildings.store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">

                                    <!-- Start District -->
                                    <div class="col-md-6 mb-2">
                                        <label for="name">Building Name</label>
                                        <input type="text" class="field form-control @error('building_name') border border-danger @enderror" name="building_name"
                                               id="buildingName" value="{{ old('building_name') }}" placeholder="Building Name" required>
                                        @error('name')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End District -->

                                </div>

                                <hr>

                                <!-- End Name -->
                                <div class="form-row">
                                    <!-- Start City -->
                                    <div class="col-md-2 mb-2">
                                        <label for="last-name">City</label>
                                        @include('admin::lists._cities')
                                        @error('city')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End City -->

                                    <!-- Start District -->
                                    <div class="col-md-5 mb-2">
                                        <label for="district">District</label>
                                        <input type="text" class="field form-control @error('district') border border-danger @enderror" name="district"
                                               id="district" value="{{ old('district') }}" placeholder="District" required>
                                        @error('district')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End District -->

                                    <!-- Start District -->
                                    <div class="col-md-5 mb-2">
                                        <label for="street">Street</label>
                                        <input type="text" class="field form-control @error('street') border border-danger @enderror" name="street"
                                               id="street" value="{{ old('street') }}" placeholder="Street" required>
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
                                        <label for="building_number">Building Number</label>
                                        <input type="text" class="field form-control @error('building_number') border border-danger @enderror" name="building_number"
                                               id="street" value="{{ old('building_number') }}" placeholder="Building No." required>
                                        @error('building_number')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Building Number -->

                                    <!-- Start Building Number -->
                                    <div class="col-md-3 mb-2">
                                        <label for="building_number">Building Space</label>
                                        <input type="text" class="field form-control @error('building_space') border border-danger @enderror" name="building_space"
                                               id="street" value="{{ old('building_space') }}" placeholder="Building Space" required>
                                        @error('building_space')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Building Number -->

                                    <!-- Start Building Number -->
                                    <div class="col-md-3 mb-2">
                                        <label for="building_number">Building Price</label>
                                        <input type="text" class="field form-control @error('building_space') border border-danger @enderror" name="building_price"
                                               id="buildingPrice" value="{{ old('building_price') }}" placeholder="Building Price" required>
                                        @error('building_space')
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
                                                <td colspan="1"><h5>Number of</h5></td>
                                                <td style="width: 100px;"><label for="number_of_apartments">Apartments</label></td>
                                                <td style="width: 100px;"><label for="number_of_floors">floors</label></td>
                                                <td style="width: 100px;"><label for="number_of_apartments">Shop</label></td>
                                            </tr>
                                            <tr>
                                                <td colspan="1"></td>
                                                <td><input type="number" maxlength="10" class="field form-control @error('number_of_apartments') border border-danger @enderror" name="number_of_apartments"
                                                           id="street" value="{{ old('number_of_apartments') }}" placeholder="0" required></td>
                                                <td><input type="number" maxlength="10" class="field form-control @error('number_of_floors') border border-danger @enderror" name="number_of_floors"
                                                           id="street" value="{{ old('number_of_floors') }}" placeholder="0" required></td>
                                                <td><input type="number" maxlength="10" class="field form-control @error('number_of_shops') border border-danger @enderror" name="number_of_shops"
                                                           id="numberOfShops" value="{{ old('number_of_shops') }}" placeholder="0" required></td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>

                                <hr>

                                <div class="form-row">
                                    <!-- Start Building Number -->
                                    <div class="col-md-4 mb-1">
                                        <label for="instrument_number">Instrument number</label>
                                        <input type="text" class="field form-control @error('instrument_number') border border-danger @enderror" name="instrument_number"
                                               id="instrumentNumber" value="{{ old('instrument_number') }}" placeholder="Instrument number" required>
                                        @error('instrument_number')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Building Number -->
                                    <!-- Start Building Number -->
                                    <div class="col-md-2 mb-1">
                                        <label for="instrument_number">Instrument Date</label>
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
                                        <label for="instrument_number">Court Name</label>
                                        <input type="text" class="field form-control @error('court') border border-danger @enderror" name="court"
                                               id="instrumentDataAt" value="{{ old('court') }}" placeholder="Court name" required>
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
                                        <label for="construction_license_number">Construction License Number</label>
                                        <input type="text" class="field form-control @error('construction_license_number') border border-danger @enderror"
                                               name="construction_license_number"
                                               id="instrumentDataAt" value="{{ old('construction_license_number') }}"
                                               placeholder="Construction License Number" required>
                                        @error('construction_license_number')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End Building Number -->

                                    <!-- Start Building Number -->
                                    <div class="col-md-3 mb-1">
                                        <label for="construction_license_date_at">Construction License Date</label>
                                        <input type="date" class="field form-control @error('construction_license_date_at') border border-danger @enderror"
                                               name="construction_license_date_at"
                                               id="constructionLicenseDateAt" value="{{ old('construction_license_date_at') }}"
                                               placeholder="Construction License Number" required>
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
                                    <div class="col-md-2 mb-1">
                                        <label class="form-check-label"><h5>Building Type</h5></label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="buildingTypeResidential" name="building_type[]" value="residential">
                                        <label class="form-check-label" for="buildingTypeResidential">Residential</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="buildingTypeCommerical" name="building_type[]" value="commercial">
                                        <label class="form-check-label" for="buildingTypeCommerical">Commerical</label>
                                    </div>
                                </div>


                                <hr>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3 mt-3">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="instrumentImage">Instrument Image</label>
                                            <input type="file" class="custom-file-input" id="instrumentImage" name="instrument_image">
                                        </div>

                                        @error('instrument_image')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="buildingLicenseImage">Building License Image</label>
                                            <input type="file" class="custom-file-input" id="buildingLicenseImage" name="building_license_image">
                                        </div>

                                        @error('building_license_image')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="buildingImage">Building Image</label>
                                            <input type="file" class="custom-file-input" id="buildingImage" name="building_image" />
                                        </div>

                                        @error('building_image')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>



                                <hr>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="companyOwnerName">Extra Details</label>
                                        <textarea name="extra_details" class="form-control" rows="8"></textarea>
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
                                    <div class="col-md-2 mb-1">
                                        <label class="form-check-label"><h5>Rent Type</h5></label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeMonthly" value="monthly">
                                        <label class="form-check-label" for="inlineCheckbox1">Monthly</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeQuarterly" value="quarterly">
                                        <label class="form-check-label" for="inlineCheckbox1">Quarterly</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rendTypeMidterm" value="midterm">
                                        <label class="form-check-label" for="inlineCheckbox1">Midterm</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeYearly" value="yearly">
                                        <label class="form-check-label" for="inlineCheckbox1">Yearly</label>
                                    </div>
                                </div>


                                <hr>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1">
                                            <label class="custom-control-label" for="isActive">Active</label>
                                        </div>

                                    </div>
                                </div>


                                <button type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3">Create</button>
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

        var email = document.getElementById('email');

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

        var counter = 0;

        var deleteKid = function(nodeNo){
            document.getElementById('removeBtn-' + nodeNo).addEventListener('click', function(e){
                var kidNode = document.getElementById('kid-' + nodeNo);
                kidNode.remove();
                counter -= 1;
            });
        };

        var handleKids = function(val){
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

        var martialStatusElement = document.getElementById('maritalStatus');
        var haveKidsElement = document.getElementById('haveKids');
        var isHasKids = false;
        var maritalStatus = 'single';

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
            var kidsDiv = document.getElementById('kids');
            var mainDiv = document.createElement('div');
            mainDiv.setAttribute('id', 'kid-' + counter);
            var kidId = document.createElement('input');
            kidId.setAttribute('type', 'hidden');
            kidId.setAttribute('name', 'kid_id[]');
            kidId.value = counter;
            mainDiv.appendChild(kidId);

            var topColumn = document.createElement('div');
            topColumn.setAttribute('class', 'form-row');
            var topColumnCell = document.createElement('div');
            topColumnCell.setAttribute('class', 'col-md-12 mb-3');
            topColumn.appendChild(topColumnCell);
            mainDiv.appendChild(topColumn);

            var btnRemove = document.createElement('button');
            btnRemove.setAttribute('type', 'button');
            btnRemove.setAttribute('class', 'btn btn-danger btn-raised-primary btn-lg btn-rounded m-1 mt-3 float-right');
            btnRemove.setAttribute('id', 'removeBtn-' + counter);
            btnRemove.setAttribute('onclick', 'deleteKid('+ counter +')');

            btnRemove.innerHTML = '&times;';

            topColumnCell.appendChild(btnRemove);

            var firstColumn = document.createElement('div');
            firstColumn.setAttribute('class', 'form-row');

            var firstColumnFirstInput = document.createElement('div');
            firstColumnFirstInput.setAttribute('class', 'col-md-6 mb-3');

            var firstColumnSecondInput = document.createElement('div');
            firstColumnSecondInput.setAttribute('class', 'col-md-6 mb-3');

            var secondColumn = document.createElement('div');
            secondColumn.setAttribute('class', 'form-row');

            var secondColumnFirstInput = document.createElement('div');
            secondColumnFirstInput.setAttribute('class', 'col-md-6 mb-3');

            var secondColumnSecondInput = document.createElement('div');
            secondColumnSecondInput.setAttribute('class', 'col-md-6 mb-3');

            var nameLabel = document.createElement('label');
            nameLabel.innerHTML = 'Name';

            var identityLabel = document.createElement('label');
            identityLabel.innerHTML = 'Identity Number';

            var genderLabel = document.createElement('label');
            genderLabel.innerHTML = 'Gender';
            var genderSelect = document.createElement('select');
            genderSelect.setAttribute('name', 'kid_gender[]');
            genderSelect.setAttribute('class', 'form-control');

            var maleOption = document.createElement('option');
            var femaleOption = document.createElement('option');
            maleOption.setAttribute('value', 'male');
            maleOption.innerHTML = 'Male';

            femaleOption.setAttribute('value', 'female');
            femaleOption.innerHTML = 'Female';

            genderSelect.appendChild(maleOption);
            genderSelect.appendChild(femaleOption);

            var birthOfDateLabel = document.createElement('label');
            birthOfDateLabel.innerHTML = 'Birth of Date';
            var birthOfDateInput = document.createElement('input');
            birthOfDateInput.setAttribute('type', 'date');
            birthOfDateInput.setAttribute('class', 'form-control');
            birthOfDateInput.setAttribute('name', 'kid_birth_of_date_at[]');

            secondColumnFirstInput.appendChild(genderLabel);
            secondColumnFirstInput.appendChild(genderSelect);

            secondColumnSecondInput.appendChild(birthOfDateLabel);
            secondColumnSecondInput.appendChild(birthOfDateInput);

            var nameInput = document.createElement('input');
            nameInput.setAttribute('type', 'text');
            nameInput.setAttribute('class', 'form-control');
            nameInput.setAttribute('name', 'kid_name[]');
            nameInput.placeholder = 'Name';

            var identityInput = document.createElement('input');
            identityInput.setAttribute('type', 'text');
            identityInput.setAttribute('class', 'form-control');
            identityInput.setAttribute('name', 'kid_identity_number[]');
            identityInput.placeholder = 'Identity Number';

            var line = document.createElement('hr');

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
