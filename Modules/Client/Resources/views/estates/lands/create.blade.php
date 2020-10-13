<div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab">
    <!-- register form -->
    <div>
        <form method="POST" action="{{ route('land.store') }}" enctype="multipart/form-data">
            @csrf
            <h5>المعلومات الخاصة بقطعة الارض</h5>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="landNumber">
                        رقم القطعة
                        <span class="lable__start">*</span>
                    </label>
                    <input type="landNumber" name="number"
                           class="form-control land-number @error('number') border border-danger @enderror"
                           id="landNumber" required />
                    @error('number')
                    <span class="badge badge-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="landSpace">
                        مساحة القطعة
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" class="form-control land-space @error('space') border border-danger @enderror" name="space" id="landSpace" required />
                    @error('space')
                        <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="landPrice">
                        سعر القطعة
                        <span class="lable__start">*</span>
                    </label>
                    <input type="number" class="form-control land_price @error('price') border border-danger @enderror" name="price" id="landPrice" required />
                    @error('price')
                    <span class="badge badge-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="landLocation">
                        موقع القطعة
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" name="location" class="form-control @error('location') border border-danger @enderror land-location" id="landLocation" />
                    @error('location')
                    <span class="badge badge-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-6 ">
                            <label for="instrumentNumber">
                                رقم الصك
                                <span class="lable__start">*</span>
                            </label>
                            <input type="number" id="instrumentNumber" class="form-control @error('instrument_number') border border-danger @enderror" name="instrument_number" />
                        </div>
                        <div class="form-group col-md-4 col-sm-6 ">
                            <label for="instrumentDateAt">
                                تاريخ الصك
                                <span class="lable__start">*</span>
                            </label>
                            <input type="date" class="form-control @error('instrument_date_at') border border-danger @enderror" name="instrument_date_at" id="instrumentDateAt" />
                        </div>
                        <div class="form-group col-md-4 col-sm-6 ">
                            <label for="court">
                                اسم المحكمة
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" class="form-control court @error('court') border border-danger @enderror" name="court" id="court" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
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

                <div class="col-md-12 mt-3">
                    <label>نوع القطعة</label>
                </div>

                <div class="col-md-4 col-sm-6 mb-2 mt-2">
                    <div class="radio-form">
                        <label class="radio-form-container">سكني
                            <input type="checkbox" name='land_type[]' value="residential" checked>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-form-container">تجاري
                            <input type="checkbox" name='land_type[]' value="commercial">
                            <span class="checkmark"></span>
                        </label>

                        @error('land_type')
                        <span class="badge badge-danger">
                        {{ $message }}
                         </span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="landDescription">
                        وصف القطعة
                        <span class="lable__start">*</span>
                    </label>
                    <textarea name="land_description" id="landDescription"
                              class="land-description form-control @error('land_description') border border-danger @enderror"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="district">
                        اسم الحي
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" class="form-control district @error('district') border border-danger @enderror" name="district" id="district"/>
                    @error('district')
                    <span class="badge badge-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="street">
                        أسم الشارع
                        <span class="lable__start">*</span>
                    </label>
                    <input type="text" class="form-control street @error('street') border border-danger @enderror" name="street" id="street" />
                </div>
            </div>

            <h5> رفع صور المحل التجاري</h5>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="instrumentImage">
                        إرفاق الصك
                        <span class="lable__start">*</span>
                    </label>
                    <div class="form-group-icon">
                        <input type="file" class="form-control images" name="images[]" id="images" multiple />
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
            <div class="register">
                <button type="submit">
                    تسجيل
                </button>
            </div>
        </form>
    </div>
</div>