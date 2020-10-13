@extends('client::layouts.master')

@section('content')
    @include('client::layouts.partials._breadcrumb_3d')

    <section class="register register-tenants">
        <div class="container">
            <div class="heading">
                <h2>تسجيل حساب جديد</h2>
                <span class="line"></span>
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                    سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات
                    في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                </p>
            </div>
            <!-- register form -->
            <div>
                <h2>
                    المستفيدين
                    <span class="line-start"></span>
                </h2>

                <form method="POST" action="{{ route('beneficiaries.registering') }}">
                    @csrf
                    <h5>المعلومات الشخصية</h5>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">
                                الاسم
                                <span class="lable__start">*</span>
                            </label>

                            <input type="text" class="form-control @error('name') border border-danger @enderror" value="{{ old('name') }}" name="name" />
                            @error('name')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="form-group col-md-3">
                            <label for="identityNumber">
                                رقم الهوية
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" maxlength="10" value="{{ old('identity_number') }}" class="form-control @error('identity_number') border border-danger @enderror" name="identity_number" />
                            @error('identity_number')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="city">
                                المدينة
                                <span class="lable__start">*</span>
                            </label>
                            @include('shared::lists._cities')
                            @error('city')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mobile">
                                الجوال
                                <span class="lable__start">*</span></label>
                            <input type="tel" maxlength="10" placeholder="" value="{{ old('mobile') }}" class="form-control @error('mobile') border border-danger @enderror" name="mobile" id="mobile" />
                            @error('mobile')
                            <span class="badge badge-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name">
                                البريد الالكتروني
                                <span class="text-title" style="font-size: 13px;">({{ __('shared::commons.optional') }})</span>
                            </label>
                            <input type="email" placeholder="{{ __('shared::commons.optional') }}"value="{{ old('email') }}" class="form-control @error('email') border border-danger @enderror" name="email" id="email"/>
                            @error('email')
                            <span class="badge badge-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        
                    </div>



                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="name">
                                تاريخ الميلاد
                                <span class="lable__start">*</span>
                            </label>
                            <input type="date" name="birth_of_date_at" value="{{ old('birth_of_date_at') }}"
                             class="form-control @error('birth_of_date_at') border border-danger @enderror" />
                             @error('birth_of_date_at')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                             @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="releaseAt">
                                تاريخ الاصدار
                                <span class="lable__start">*</span>
                            </label>
                            <input type="date" name="release_at" value="{{ old('release_at') }}"
                             class="form-control @error('release_at') border border-danger @enderror" />

                             @error('release_at')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="endAt">
                                تاريخ الانتهاء
                                <span class="lable__start">*</span>
                            </label>
                            <input type="date" name="end_at" value="{{ old('end_at') }}" class="form-control @error('end_at') border border-danger @enderror" />
                            @error('end_at')

                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">
                                كلمة المرور
                                <span class="lable__start">*</span>
                            </label>
                            <input type="password" class="form-control @error('password') border border-danger @enderror" value="{{ old('password') }}" name="password" id="password" />
                            @error('password')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                             @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="passwordConfirmation">
                                تأكيد كلمة المرور
                                <span class="lable__start">*</span>
                            </label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                             class="form-control password-confirmation" id="passwordConfirmation" />

                             @error('password_confirmation')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                             @enderror
                        </div>
                    </div>
                    <h5>جهة العمل</h5>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="job">
                                المهنة
                                <span class="lable__start">*</span>
                            </label>
                            @include('shared::lists._jobs')
                            @error('job')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="name">
                                المسمى الوظيفى
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" value="{{ old('job_title') }}" class="form-control @error('job_title') border border-danger @enderror job_title" name="job_title" />
                            @error('job_title')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="companyName">
                                اسم جهة العمل
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" name="company_name" id="companyName" value="{{ old('company_name') }}"
                             class="form-control @error('company_name') border border-danger @enderror company-name" />
                             @error('company_name')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="bankId">
                                اسم البنك
                                <span class="lable__start">*</span>
                            </label>
                            @include('shared::lists._banks')
                            @error('bank_id')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bankIbanNumber">
                                رقم الايبان
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" name="bank_iban_number" maxlength="25" value="{{ old('bank_iban_number') }}"
                             class="form-control bank-iban-number @error('bank_iban_number') border border-danger @enderror" id="bankIbanNumber" />
                             @error('bank_iban_number')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                             @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bankAccountNumber">
                                رقم الحساب البنكى
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" name="bank_account_number" id="bankAccountNumber" maxlength="14" value="{{ old('bank_account_number') }}"
                             class="form-control @error('bank_account_number') border border-danger @enderror bank-account-number" />

                            @error('bank_account_number')
                            <span class="badge badge-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        
                    </div>


                    <h5>الحالة الاجتماعية</h5>
                    <div class="form-row">
                        @include('shared::lists._martial_status')
                        @error('martial_status')
                            <span class="badge badge-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-row" id="haveKids" style="display: none;">
                        <div class="col-md-4">
                            <label for="company-ownder-name">{{ __('client::users.have_a_kids_?') }}</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" value="1" onclick="handleKids(this.value)" class="custom-control-input is-has-kids" id="kidsYes" name="is_has_kids">
                                <label class="custom-control-label" for="kidsYes">
                                    {{ __('shared::commons.yes') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" value="0" onclick="handleKids(this.value)" class="custom-control-input is-has-kids" id="kidsNo" name="is_has_kids">
                                <label class="custom-control-label" for="kidsNo">
                                    {{ __('shared::commons.no') }}
                                </label>
                                <div class="invalid-feedback">More example invalid feedback text</div>
                            </div>
                        </div>
                    </div>

                    <!-- Add kid div -->
                    <div id="kids" style="display:none;">
                    <!-- #StartKidSection -->
                        <div id="kid-0">
                            <hr>
                            <input type="hidden" value="0" name="kid_id[]">

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="kidName">{{ __('shared::commons.name') }}</label>
                                    <input type="text" class="form-control" name="kid_name[]"  autocomplete="off" id="kidName" placeholder="{{ __('shared::commons.name') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="kidIdentityNumber">{{ __('shared::commons.identity_number') }}</label>
                                    <input type="text" class="form-control" name="kid_identity_number[]" maxlength="10"autocomplete="off" id="kidIdentityNumber" placeholder="{{ __('shared::commons.identity_number') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="kidGender">{{ __('shared::commons.genders.gender') }}</label>

                                    <select name="kid_gender[]" class="form-control" id="kidGender">
                                        <option value="male">
                                            {{ __("ذكر") }}
                                        </option>
                                        <option value="female">
                                            {{ __('أنثى') }}
                                        </option>
                                    </select>

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="kidBirthOfDateAt">
                                        {{ __('shared::commons.birth_of_date') }}
                                    </label>
                                    <input type="date" class="form-control" name="kid_birth_of_date_at[]" autocomplete="off" id="kidBirthOfDateAt" placeholder="Birth of date">
                                </div>
                            </div>

                            <hr>

                        </div>
                    </div>
                    <!-- End kid div -->





                    <div class="form_icons" id="addKidBtnDiv" style="display:none;">
                        <a href="javascript:void(0)" id="addKid">
                            <img src="{{ asset('img') }}/add-icon.png" alt="add icon" class="add_icon" />
                        </a>
                    </div>
                    <hr>
                    <div class="form-row">
                            <div class="form-check">
                                <input  class="form-check-input @error('check_agree') border border-danger @enderror check_agree" type="radio" name="check_agree" value="1">

                                <label class="form-check-label" for="check_agree">
                                    <a href="#">
                                        {{   __('shared::commons.check_agree') }}
                                        </a>
                                </label>
                            </div>
                        @error('check_agree')
                        <span class="badge badge-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
            
                    <button type="submit" class="btn btn-lg btn-block mt-4" 
                        style="margin-top: 10px;">
                        تسجيل
                    </button>
                </form>
            </div>
        </div>
    </section>


@endsection

@section('scripting...')
<script>

    var counter = 0;

    function func(val){
        let kidsDiv = document.getElementById('haveKids');
        let addKidBtnDiv = document.getElementById('addKidBtnDiv');
        switch(val){
            case 'single':
                kidsDiv.style.display = 'none';
                addKidBtnDiv.style.display = 'none';
                break;
            
            case 'married':
                kidsDiv.style.display = 'block';
                addKidBtnDiv.style.display = 'block';
                break;
            
            case 'widower':
                kidsDiv.style.display = 'block';
                addKidBtnDiv.style.display = 'block';
                break;
            
            case 'divorcee':
                kidsDiv.style.display = 'block';
                addKidBtnDiv.style.display = 'block';
                break;

        }
    }

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

        var btnRemoveImg = document.createElement('img');
        btnRemoveImg.setAttribute('src', '{!! asset("img") !!}/del-icon.png');

        var btnRemove = document.createElement('a');
        btnRemove.setAttribute('href', 'javascript:void(0)');
        btnRemove.setAttribute('id', 'removeBtn-' + counter); // del_icon
        btnRemove.setAttribute('class', 'del_icon');
        btnRemove.setAttribute('onclick', 'deleteKid('+ counter +')');
        btnRemove.appendChild(btnRemoveImg);

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
        nameLabel.innerHTML = '{!! __('shared::commons.name') !!}';

        var identityLabel = document.createElement('label');
        identityLabel.innerHTML = '{!! __('shared::commons.identity_number') !!}';

        var genderLabel = document.createElement('label');
        genderLabel.innerHTML = '{!! __('shared::commons.genders.gender') !!}';
        var genderSelect = document.createElement('select');
        genderSelect.setAttribute('name', 'kid_gender[]');
        genderSelect.setAttribute('class', 'form-control');

        var maleOption = document.createElement('option');
        var femaleOption = document.createElement('option');
        maleOption.setAttribute('value', 'male');
        maleOption.innerHTML = '{!! __('shared::commons.genders.male') !!}';

        femaleOption.setAttribute('value', 'female');
        femaleOption.innerHTML = '{!! __('shared::commons.genders.female') !!}';

        genderSelect.appendChild(maleOption);
        genderSelect.appendChild(femaleOption);

        var birthOfDateLabel = document.createElement('label');
        birthOfDateLabel.innerHTML = '{!! __('shared::commons.birth_of_date') !!}';
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
        nameInput.placeholder = '{!! __('shared::commons.name') !!}';

        var identityInput = document.createElement('input');
        identityInput.setAttribute('type', 'text');
        identityInput.setAttribute('class', 'form-control');
        identityInput.setAttribute('name', 'kid_identity_number[]');
        identityInput.setAttribute('maxlength', '10');
        identityInput.placeholder = '{!! __('shared::commons.identity_number') !!}';

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
