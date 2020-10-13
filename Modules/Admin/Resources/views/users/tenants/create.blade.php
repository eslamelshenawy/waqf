@extends('admin::layouts.master')

@section('content')
<section class="tenants">
    <div class="container" id="tenantContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">

                        <a href="{{ route('Admin::tenants.index') }}" class="float-right">&times;</a>

                        <div class="clearfix"></div>

                        <div class="card-title">
                            <br><h4>{{ __('shared::users.tenant') . ' ' . __('shared::actions.new') }}</h4><br></div>
                        <hr>

                    <form class="needs-validation" novalidate method="POST" action="{{ route("Admin::tenants.store") }}" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <!-- Start Name -->
                            <div class="col-md-4 mb-4">
                                <label for="nameField">{{ __('shared::commons.name') }}</label>
                                <input type="text"
                                       class="field form-control @error('name') border border-danger @enderror"
                                       name="name" value="{{ old('name') }}" id="name" placeholder="{{ __('shared::commons.name') }}">
                                @error('name')
                                <div>
                                    <span class="badge badge-danger">{{ $errors->first('name') }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Name -->
                            <!-- Start Email -->
                            
                               <div class="col-md-4 mb-4">
                                <label for="nameField">{{ __('shared::commons.email') }}</label>
                                <input type="text"
                                       class="field form-control @error('email') border border-danger @enderror"
                                       name="email" value="{{ old('email') }}" id="name" placeholder="{{ __('shared::commons.email') }}">
                                @error('email')
                                <div>
                                    <span class="badge badge-danger">{{ $errors->first('email') }}</span>
                                </div>
                                @enderror
                            </div>
                            <!--<div class="col-md-3 mb-3">-->
                            <!--    <label for="email">{{ __('shared::commons.email') }}</label>-->
                            <!--    <input type="email" class="field form-control @error('email') border border-danger @enderror"-->
                            <!--           name="email" id="email" value="{{ old('email') }}"-->
                            <!--           placeholder="{{ __('shared::commons.email') }}" required>-->
                            <!--    @error('email')-->
                            <!--    <div>-->
                            <!--        <span class="badge badge-danger">{{ $errors->first('email') }}</span>-->
                            <!--    </div>-->
                            <!--    @enderror-->
                            <!--    <div id="invalidEmailMsg" style="display: none;">-->
                            <!--        <span class="badge badge-danger">-->
                            <!--            البريد الالكتروني غير صالح-->
                            <!--        </span>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- End Email -->
                            <!-- Start Email -->
                            <div class="col-md-2 mb-2">
                                <label for="mobile">{{ __('shared::commons.mobile_number') }}</label>
                                <input type="text" maxlength="10"
                                       class="field form-control @error('mobile') border border-danger @enderror"
                                       name="mobile" id="mobile" value="{{ old('mobile') }}"
                                       placeholder="{{ __('shared::commons.mobile_number') }}" required>
                                @error('mobile')
                                <div>
                                    <span class="badge badge-danger">{{ $errors->first('mobile') }}</span>
                                </div>
                                @enderror
                                <div id="invalidMobileMsg" style="display: none;">
                                    <span class="badge badge-danger">
                                        رقم الجوال غير صالح
                                    </span>
                                </div>
                            </div>
                            <!-- End Email -->
                        </div>

                        <div class="form-row">
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
                            <!-- Start Identity Number -->
                            <div class="col-md-6 mb-3">
                                <label for="identity_number">{{ __('shared::users.identity_number') }}</label>
                                <input type="text" maxlength="10"
                                       class="field form-control @error('identity_number') border border-danger @enderror"
                                       name="identity_number" value="{{ old('identity_number') }}" autocomplete="off"
                                       id="identityNumber" placeholder="{{ __('shared::users.identity_number') }}" required>
                                @error('identity_number')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Identity Number -->
                        </div>

                        <div class="form-row">
                            <!-- Start birth of date -->
                            <div class="col-md-6 mb-3">
                                <label for="birthOfDate">{{ __('shared::commons.birth_of_date') }}</label>
                                <input type="date" class="field form-control @error('birth_of_date_at') border border-danger @enderror"
                                       name="birth_of_date_at" value="{{ old('birth_of_date_at') }}" autocomplete="off" id="birthOfDateAt"
                                       placeholder="{{ __('shared::commons.birth_of_date') }}" required>
                                @error('birth_of_date_at')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Birth of date -->
                            <!-- Start Release date -->
                            <div class="col-md-3 mb-3">
                                <label for="releaseAt">{{ __('shared::commons.release_at') }}</label>
                                <input type="date" class="form-control @error('release_at') border border-danger @enderror"
                                       name="release_at" value="{{ old('release_at') }}"
                                       autocomplete="off" id="releaseAt"
                                       placeholder="{{ __('shared::commons.release_at') }}" required>
                                @error('release_at')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End Release date -->
                            <!-- Start end date -->
                            <div class="col-md-3 mb-3">
                                <label for="endDate">{{ __('shared::commons.end_date') }}</label>
                                <input type="date" class="field form-control @error('end_at') border border-danger @enderror"
                                       name="end_at" value="{{ old('end_at') }}" autocomplete="off" id="endAt"
                                       placeholder="{{ __('shared::commons.end_at') }}" required>
                                @error('end_at')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!-- End end date -->
                        </div>

                        <hr>

                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <label for="password">{{ __('shared::commons.password') }}</label>
                                <input type="password" name="password"
                                       class="field form-control @error('password') border border-danger @enderror"
                                       id="password" placeholder="{{ __('shared::commons.password') }}" autocomplete="off" required>
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

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="job">{{ __('shared::commons.job') }}</label>
                                @include('admin::lists._jobs', ['job' => old('job')])
                                @error('job')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-3 mb-3" id="jobTitleOtherDiv" style="display: none;">
                                <label for="jobTitle">{{ __('shared::commons.job_title') }}</label>
                                <input type="text" value="{{ old('job_title_other') }}"
                                       class="field form-control @error('job_title_other') border border-danger @enderror"
                                       id="jobTitleOther" placeholder="{{ __('shared::commons.job_title_other') }}" autocomplete="off" required>
                                @error('job_title_other')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                        </div>

                        <hr>

                        <div class="form-row">

                            <div class="col-md-4 mb-4">
                                <label for="maritalStatus">{{ __('shared::commons.marital_status') }}</label>

                                <select class="field form-control" name="marital_status" id="maritalStatus">
                                    <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>{{ __('shared::commons.single') }}</option>
                                    <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>{{ __('shared::commons.married') }}</option>
                                    <option value="widower" {{ old('marital_status') == 'widower' ? 'selected' : '' }}>{{ __('shared::commons.widower') }}</option>
                                    <option value="divorcee" {{ old('marital_status') == 'divorcee' ? 'selected' : '' }}>{{ __('shared::commons.divorcee') }}</option>
                                </select>

                            </div>
                        </div>

                        <!--<div class="form-row mt-2" id="haveKids" style="display: {{ old('is_has_kids') ? 'block' : 'none' }};">-->
                        <!--    <div class="col-md-6 mb-3">-->
                        <!--        <label for="company-ownder-name">{{ __('shared::commons.do_you_have_kids') }}</label>-->
                        <!--    </div>-->

                        <!--    <div class="row">-->
                        <!--        <div class="col-md-3">-->
                        <!--            <div class="custom-control custom-radio">-->
                        <!--                <input type="radio" value="1" onclick="handleKids(this.value)"-->
                        <!--                       class="custom-control-input is-has-kids"-->
                        <!--                       id="kidsYes" name="is_has_kids" {{ old('is_has_kids') == true ? 'checked' : '' }} required>-->
                        <!--                <label class="custom-control-label" for="kidsYes">-->
                        <!--                    {{ __('shared::commons.yes') }}-->
                        <!--                </label>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="cpl-md-6">-->
                        <!--            <div class="custom-control custom-radio mb-3">-->
                        <!--                <input type="radio" value="0" onclick="handleKids(this.value)"-->
                        <!--                       class="custom-control-input is-has-kids" id="kidsNo"-->
                        <!--                       name="is_has_kids" {{ old('is_has_kids') == false ? 'checked' : '' }} required>-->
                        <!--                <label class="custom-control-label" for="kidsNo">-->
                        <!--                    {{ __('shared::commons.no') }}-->
                        <!--                </label>-->
                        <!--            </div>-->

                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <hr>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="isActive" name="is_active"
                                           value="{{ old('is_active') == 1 ? 1 : 0 }}">
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


@section('scripting...')
<script>


    let job = document.getElementById('job');
    let jobTitleOtherDiv = document.getElementById('jobTitleOtherDiv');
    let jobTitleOtherInput = document.getElementById('jobTitleOther');

    job.addEventListener('change', function () {
        let currentValue = String(this.value).trim();
        if(currentValue === 'other'){
            window.jobTitleOtherDiv.style.display = 'block';
            jobTitleOtherInput.setAttribute('name', 'job_title_other');
        }else{
            window.jobTitleOtherDiv.style.display = 'none';
            jobTitleOtherInput.removeAttribute('name');
        }
    });

    Utils.validateEmail();
    Utils.validateMobile();

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
