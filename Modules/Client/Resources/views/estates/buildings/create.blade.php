<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <!-- register form -->
    <div>
        <form method="POST" action="{{ route('building.store') }}">
            @csrf

            <h5> المعلومات الخاصة بالعقار</h5>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="buildingName">
                        اسم المبني
                    </label>
                    <input type="text" class="form-control building-name" name="name" id="buildingName" required/>
                    @error('name')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="name">
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
                    <label for="district">
                        اسم الحي
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" required name="district" class="form-control district @error('district') border border-danger @enderror" id="district" />
                    @error('district')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="street">
                        أسم الشارع
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" required name="street" class="form-control street @error('street') @enderror" id="street" />
                    @error('street')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="buildingNumber">
                        رقم المبني
                        <span class="lable__start">*</span>
                    </label>
                    <input required type="number" class="form-control building-number @error('number') border border-danger @enderror" name="number" id="buildingNumber" />
                    @error('number')
                    <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="name">
                        * مساحة المبني
                        <span class="lable__start">*</span>
                    </label>
                    <input required type="number" class="form-control building-space @error('space') border border-danger @enderror"
                           name="space" id="buildingSpace"/>
                    @error('space')
                    <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="numberOfApartments">
                        عدد الشقق
                        <span class="lable__start">*</span>
                    </label>
                    <input required type="text" class="form-control number-of-apartments @error('number_of_apartments') @enderror" name="number_of_apartments" id="numberOfApartments" />
                    @error('number_of_apartments')
                    <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="name">
                        عدد الطوابق
                        <span class="lable__start">*</span>
                    </label>
                    <input required type="number" class="form-control number-of-floors" name="number_of_floors" id="numberOfFloors" />
                    @error('number_of_floors')
                    <span class="badge badge-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="numberOfShops">
                        عدد المحلات التجارية
                        <span class="lable__start">*</span>
                    </label>
                    <input required type="number" id="numberOfShops" class="form-control number-of-shops @error('number_of_shops') border border-danger @enderror" name="number_of_shops" />
                    @error('number_of_shops')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="instrumentNumber">
                                    رقم الصك
                                    <span class="lable__start">*</span>
                                </label>
                                <input required type="text" class="form-control instrument-number @error('instrument_number') @enderror" name="instrument_number"
                                       id="instrumentNumber" />
                                @error('instrument_number')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="instrumentDateAt">
                                    تاريخ الصك
                                    <span class="lable__start">*</span>
                                </label>
                                <input type="date" class="form-control instrument-date-at @error('instrument_date_at') border border-danger @enderror"
                                       id="instrumentDateAt" name="instrument_date_at" />
                                @error('instrument_date_at')
                                    <span class="badge badge-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="court">
                                    اسم المحكمة
                                    <span required class="lable__start">*</span>
                                </label>
                                <input type="text" id="court" name="court" class="form-control court @error('court') border border-danger @enderror" />
                                @error('court')
                                    <span class="badge badge-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="constructionLicenseNumber">
                        رقم رخصة الانشاء
                        <span class="lable__start">*</span>
                    </label>
                    <input required type="text" class="form-control construction-license-number @error('construction_license_number') border border-danger @enderror" name="construction_license_number" id="constructionLicenseNumber" />
                    @error('construction_license_number')
                    <span class="badge badge-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="constructionLicenseDateAt">
                        تاريخ رخصة الانشاء
                        <span class="lable__start">*</span>
                    </label>
                    <input required type="date" class="form-control" name="construction_license_date_at" id="constructionLicenseDateAt" />
                    @error('construction_license_date_at')
                    <span class="badge badge-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <h5> نوع المبنى</h5>

            <div class="col-md-4 col-sm-6">
                <div class="radio-form">
                    <label class="radio-form-container">سكني
                        <input type="checkbox" name='building_type[]' checked  value="residential">
                        <span class="checkmark"></span>
                    </label>
                    <label class="radio-form-container">تجاري
                        <input type="checkbox" name='building_type[]' value="commercial">
                        <span class="checkmark"></span>
                    </label>

                    @error('building_type')
                    <span>
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


            <h5>رفع مستندات المبني</h5>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">
                        إرفاق الصك
                        <span class="lable__start">*</span>
                    </label>
                    <div class="form-group-icon">
                        <input type="file" class="form-control instrument-image" name="instrument_image"
                               id="instrumentImage" />
                        <div class="form-group-file">
                            <span class="icon-img">
                                <img src="{{ asset('img') }}/cam-icon.png" alt="">
                            </span>
                            @error('instrument_image')
                            <span class="badge badge-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="type-requirde">
                            <ul>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="buildingLicenseImage">
                        إرفاق رحصة المبني
                        <span class="lable__start">*</span>
                    </label>
                    <div class="form-group-icon">
                        <input type="file"
                               class="form-control building-license-image @error('building_license_image') border border-danger @enderror"
                               name="building_license_image" id="buildingLicenseImage" />
                        <div class="form-group-file">
                            <span class="icon-img">
                                <img src="{{ asset('img') }}/cam-icon.png" alt="">
                            </span>
                            @error('building_license_image')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="type-requirde">
                            <ul>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="buildingImage">
                        إرفاق صور المبني
                        <span class="lable__start">*</span>
                    </label>
                    <div class="form-group-icon">
                        <input type="file" class="form-control building-image @error('building_image') @enderror" name="building_image" />
                        <div class="form-group-file">
                            <span class="icon-img">
                                <img src="{{ asset('img') }}/cam-icon.png" alt="">
                            </span>
                            @error('building_image')
                                <span class="badge badge-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="type-requirde">
                            <ul>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                                <li>
                                    <span class="item-type">Photo.png</span>
                                    <span class="lable__start">*</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="extraDetails">
                        تفاصيل اخري
                        <span class="lable__start">*</span>
                    </label>
                    <textarea name="extra_details" class="extra-details" id="extraDetails"></textarea>
                </div>
            </div>

            <div class="form-row">
                @include('shared::lists._rent_types')
                <div class="form-group col-md-6">
                    <label for="buildingPrice">
                        السعر
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" class="form-control building-price" name="price" id="buildingPrice" />
                    @error('price')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="register">
                <button type="submit">
                    تسجيل
                </button>
            </div>
        </form>
    </div>
</div>