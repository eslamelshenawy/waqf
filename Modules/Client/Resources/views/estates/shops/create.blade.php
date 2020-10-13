<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <!-- register form -->
    <div>
        <form method="POST" action="{{ route('shop.store') }}" enctype="multipart/form-data">
            @csrf
            <h5> المعلومات الخاصة بالمحل التجاري</h5>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="shopNumber">
                        رقم المحل
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" name="number"
                           class="form-control shop-number @error('number') border border-danger @enderror" id="shopNumber" required />
                    @error('number')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="shop_space">
                        المساحة
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" name="space"
                           class="form-control shop-space" id="shopSpace" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">
                        المبني
                        <span class="lable__start">*</span>
                    </label>
                    @component('shared::components._buildings')
                    @endcomponent
                </div>
                <div class="form-group col-md-6">
                    <h5> وجهة الشارع الرئيسي</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">نعم
                            <input type="radio" checked="checked" value="1" name="is_on_street_front">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" name="is_on_street_front" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="form-group col-md-6">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5> أجهزة التكيف</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">نعم
                            <input type="radio" checked="checked" name="is_has_air_conditioner">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" name="is_has_air_conditioner">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="numberOfAirConditioner">
                        عدد التكيفات / الماركة
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" class="form-control" id="numberOfAirConditioner" name="number_of_air_conditioner" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5> ديكورات</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">نعم
                            <input type="radio" checked="checked" name="is_has_decoration" value="1" id="isHasDecorationYes">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" name="is_has_decoration" value="0" id="isHasDecorationNo">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">
                        التفاصيل
                        <span class="lable__start">*</span>
                    </label>
                    <textarea name="decoration_details"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5> مستودع</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">نعم
                            <input type="radio" checked="checked" name="is_has_warehouse" value="1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" name="is_has_warehouse" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="warehouseSpace">
                        مساحة المستودع
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" class="form-control warehouse-space" name="warehouse_space" id="warehouseSpace" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5> أجهزة التكيف</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">نعم
                            <input type="radio" checked="checked" name="is_has_air_conditioner" value="1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" name="is_has_air_conditioner" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
{{--                <div class="form-group col-md-6">--}}
{{--                    <label for="numberOfAirConditions">--}}
{{--                        عدد التكيفات / الماركة--}}
{{--                        <span class="lable__start">*</span>--}}
{{--                    </label>--}}
{{--                    <input type="text" class="form-control" name="air_conditioner_" />--}}
{{--                </div>--}}
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">
                        عدد المطابخ
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" class="form-control" name="number_of_kitchens" />
                </div>
                <div class="from-group col-md-6">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    @include('shared::lists._rent_types')
                </div>
                <div class="form-group col-md-6">
                    <label for="name">
                        السعر
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" class="form-control" name="price" />
                    @error('price')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <h5> رفع صور المحل التجاري</h5>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">
                        إرفاق الصك
                        <span class="lable__start">*</span>
                    </label>
                    <div class="form-group-icon">
                        <input type="file" class="form-control" name="images[]" multiple />
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
                <textarea id="extraDetails" name="extra_details"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5> رخصة انشاء تجارية</h5>
                    <div class="radio-form">
                        <label class="radio-form-container">نعم
                            <input type="radio" checked="checked" name="is_has_license" value="1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">لا
                            <input type="radio" name="is_has_license" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="extraDetails">ملاحظات الترخيص</label>
                    <textarea name="extra_details" id="extraDetails" class="form-control"></textarea>
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