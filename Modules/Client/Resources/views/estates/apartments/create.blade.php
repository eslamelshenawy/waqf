<div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <!-- register form -->
    <div>
        <form method="POST" action="{{ route('apartment.store') }}" enctype="multipart/form-data">
            @csrf

            {{ $errors }}

            <h5> المعلومات الخاصة بالشقة السكنية</h5>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="apartmentNumber">
                        رقم الشقة
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" required class="form-control @error('number') border border-danger @enderror apartment-number" name="number" id="apartmentNumber" />
                    @error('number')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="floorNumber">
                        الدور
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" required class="form-control @error('floor_number') border border-danger @enderror floor-number" name="floor_number" id="floorNumber" />
                    @error('floor_number')
                        <span>
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">
                        المبني
                        <span class="lable__start">*</span>
                    </label>
                    @component('shared::components._buildings')
                    @endcomponent
                </div>
                <div class="form-group col-md-6">
                    <label for="numberOfRooms">
                        عدد الغرف
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" required class="form-control @error('number_of_rooms') border border-danger @enderror number_of_rooms" name="number_of_rooms" id="numberOfRooms" />
                    @error('number_of_rooms')
                    <span>
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="apartmentSpace">
                        المساحة
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" required class="form-control apartment-space @error('space') border border-danger @enderror" name="space" id="apartmentSpace" />
                </div>
                <div class="form-group col-md-6">
                    <label for="numberOfToilets">
                        عدد الحمامات
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" required name="number_of_toilets" class="form-control number-of-toilets @error('number_of_toilets') border border-danger @enderror" id="numberOfToilets" />
                    @error('number_of_toilets')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="numberOfKitchens">
                        عدد المطابخ
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" required id="numberOfKitchens" class="form-control number-of-kitchens @error('number_of_kitchens') border border-danger @enderror" name="number_of_kitchens" />
                    @error('number_of_kitchens')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5> أجهزة التكيف</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">لا
                            <input type="radio" value="1" checked="checked" name="is_has_air_conditioner" id="isHasAirConditionerYes"
                                   class="is-has-air-conditioner
                                @error('is_has_air_conditioner') border border-danger @enderror" />نعم
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" value="0" name="is_has_air_conditioner" id="isHasAirConditionerNo" class="is-has-air-conditioner">
                            <span class="checkmark"></span>
                        </label>

                        @error('is_has_air_conditioner')
                            <span class="badge badge-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="numberOfAirConditioner">
                        عدد التكيفات
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" id="numberOfAirConditioner"
                           class="form-control number-of-air-conditioner" name="number_of_air_conditioner" required />
                    @error('number_of_air_conditioner')
                        <span>
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5> المطبخ مجهز</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">نعم
                            <input type="radio" checked="checked" name="is_kitchen_ready"
                                   class="is-kitchen-ready" id="isKitchenReadyYes" value="1" required>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" name="is_kitchen_ready" value="0" class="is-kitchen-ready" id="isKitchenReadyNo" required>
                            <span class="checkmark"></span>
                        </label>

                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="numberOfKitchens">
                        تفاصيل المطبخ
                        <span class="lable__start">*</span>
                    </label>
                    <textarea class="kitchen-details" id="kitchenDetails" name="kitchen_details" required></textarea>
                    @error('number_of_kitchens')
                    <span class="badge badge-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5> موقف السياره</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">نعم
                            <input type="radio" checked="checked" name="is_has_parking" class="is-has-parking" value="1" id="isHasParkingYes">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" name="is_has_parking" class="is-has-parking" value="0" id="isHasParkingNo">
                            <span class="checkmark"></span>
                        </label>

                        @error('is_has_parking')
                        <span>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">
                        رقم الموقف
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" required class="form-control parking-number @error('parking_number') border border-danger @enderror" name="parking_number" id="parkingNumber" />
                    @error('parking_number')
                        <span>
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">

                    @include('shared::lists._rent_types')
                </div>
                <div class="form-group col-md-6">
                    <label for="price">
                        السعر
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" required class="form-control apartment-price" name="price" id="apartmentPrice" />
                    @error('price')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <h5> رفع صور الشقة</h5>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">
                        إرفاق الصك
                        <span class="lable__start">*</span>
                    </label>
                    <div class="form-group-icon">
                        <input type="file" class="form-control" name="images[]" />
                        <div class="form-group-file">
                            <span class="icon-img">
                                <img src="{{ asset('img') }}/cam-icon.png" alt="">
                            </span>
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
            </div>

            <div class="form-group ">
                <label for="extraDetails">
                    تفاصيل اخري
                    <span class="lable__start">*</span>
                </label>
                <textarea name="extraDetails" id="extraDetails"></textarea>
            </div>

            <div class="register">
                <button type="submit">
                    تسجيل
                </button>
            </div>
        </form>
    </div>
</div>