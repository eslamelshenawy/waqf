<section class="search__box">
    <div class="container">
        <form action="{{ route('search.home') }}" method="GET">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="form-group select-form">
                        <select name="type_estate" onchange="this.form.submit()">
                            <option value="0" >{{ __('shared::estates.type') }}</option>
                            <option value="all" {{request()->get('type_estate') == "all"  ? 'selected' : ""}}>{{ __('shared::commons.all') }}</option>
                            <option value="building" {{request()->get('type_estate') == "building"  ? 'selected' : ""}}>{{ __('shared::estates.buildings.building') }}</option>
                            <option value="apartment" {{request()->get('type_estate') == "apartment"  ? 'selected' : ""}}>{{ __('shared::estates.apartments.apartment') }}</option>
                            <option value="shop" {{request()->get('type_estate') == "shop"  ? 'selected' : ""}}>{{ __('shared::estates.shops.shop') }}</option>
                            <option value="land" {{request()->get('type_estate') == "land"  ? 'selected' : ""}}>{{ __('shared::estates.lands.land') }}</option>
                        </select>
                    </div>
                    <div class="form-group select-form form-box--big">
                        <select name="type_rent" onchange="this.form.submit()">
                            <option ></option>
                            <option value="all"{{request()->get('type_rent') == "all"  ? 'selected' : ""}}>{{ __('shared::commons.all') }}</option>
                            <option value="monthly" {{request()->get('type_rent') == "monthly"  ? 'selected' : ""}}>{{ __('shared::estates.monthly') }}</option>
                            <option value="quarterly" {{request()->get('type_rent') == "quarterly"  ? 'selected' : ""}}>{{ __('shared::estates.quarterly') }}</option>
                            <option value="midterm" {{request()->get('type_rent') == "midterm"  ? 'selected' : ""}}>{{ __('shared::estates.midterm') }}</option>
                            <option value="yearly" {{request()->get('type_rent') == "yearly"  ? 'selected' : ""}}>{{ __('shared::estates.yearly') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <div class="forms">
                        <div class="form-group select-form">
                            <select>
                                <option value="0"> السعر الادني</option>
                                <option value="0"> السعر الادني</option>
                                <option value="0"> السعر الادني</option>
                                <option value="0"> للبيع</option>
                                <option value="0">نوع العقار</option>
                                <option value="0"> للبيع</option>
                            </select>
                        </div>
                        <div class="form-group select-form">
                            <select>
                                <option value="0"> السعر الاقصي</option>
                                <option value="0"> السعر الاقصي</option>
                                <option value="0"> السعر الاقصي </option>
                                <option value="0"> للبيع</option>
                                <option value="0">نوع العقار</option>
                                <option value="0"> للبيع</option>
                            </select>
                        </div>
                        <div class="form-group select-form">
                            <select name="num_room" onchange="this.form.submit()">
                                <option value="0" {{request()->get('num_room') == "0"  ? 'selected' : ""}}> عدد الغرف</option>
                                <option value="1"{{request()->get('num_room') == "1"  ? 'selected' : ""}}>1</option>
                                <option value="2"{{request()->get('num_room') == "2"  ? 'selected' : ""}}>2</option>
                                <option value="3"{{request()->get('num_room') == "3"  ? 'selected' : ""}}>3</option>
                                <option value="4"{{request()->get('num_room') == "4"  ? 'selected' : ""}}>4</option>
                                <option value="5"{{request()->get('num_room') == "5"  ? 'selected' : ""}}>5</option>
                                <option value="6"{{request()->get('num_room') == "6"  ? 'selected' : ""}}>6</option>
                                <option value="7"{{request()->get('num_room') == "7"  ? 'selected' : ""}}>7</option>
                                <option value="8"{{request()->get('num_room') == "8"  ? 'selected' : ""}}>8</option>
                                <option value="9"{{request()->get('num_room') == "9"  ? 'selected' : ""}}>9</option>
                                <option value="10"{{request()->get('num_room') == "10"  ? 'selected' : ""}}>10</option>
                                <option value="11"{{request()->get('num_room') == "11"  ? 'selected' : ""}}>11</option>
                            </select>
                        </div>
                        <div class="form-group select-form">
                            <select onchange="this.form.submit()" name="toilets">
                                <option value="0"{{request()->get('toilets') == "0"  ? 'selected' : ""}}> الحمامات</option>
                                <option value="1"{{request()->get('toilets') == "1"  ? 'selected' : ""}}>1</option>
                                <option value="2"{{request()->get('toilets') == "2"  ? 'selected' : ""}}>2</option>
                                <option value="3"{{request()->get('toilets') == "3"  ? 'selected' : ""}}>3</option>
                                <option value="4"{{request()->get('toilets') == "4"  ? 'selected' : ""}}>4</option>
                                <option value="5"{{request()->get('toilets') == "5"  ? 'selected' : ""}}>5</option>
                                <option value="6"{{request()->get('toilets') == "6"  ? 'selected' : ""}}>6</option>
                                <option value="7"{{request()->get('toilets') == "7"  ? 'selected' : ""}}>7</option>
                                <option value="8"{{request()->get('toilets') == "8"  ? 'selected' : ""}}>8</option>
                                <option value="9"{{request()->get('toilets') == "9"  ? 'selected' : ""}}>9</option>
                                <option value="10"{{request()->get('toilets') == "10"  ? 'selected' : ""}}>10</option>
                                <option value="11"{{request()->get('toilets') == "11"  ? 'selected' : ""}}>11</option>
                            </select>
                        </div>
                        <div class="form-group select-form">
                            <select onchange="this.form.submit()" name="floors">
                                <option value="0"{{request()->get('floors') == "0"  ? 'selected' : ""}}> الطابق</option>
                                <option value="1"{{request()->get('floors') == "1"  ? 'selected' : ""}}>1</option>
                                <option value="2"{{request()->get('floors') == "2"  ? 'selected' : ""}}>2</option>
                                <option value="3"{{request()->get('floors') == "3"  ? 'selected' : ""}}>3</option>
                                <option value="4"{{request()->get('floors') == "4"  ? 'selected' : ""}}>4</option>
                                <option value="5"{{request()->get('floors') == "5"  ? 'selected' : ""}}>5</option>
                                <option value="6"{{request()->get('floors') == "6"  ? 'selected' : ""}}>6</option>
                                <option value="7"{{request()->get('floors') == "7"  ? 'selected' : ""}}>7</option>
                                <option value="8"{{request()->get('floors') == "8"  ? 'selected' : ""}}>8</option>
                                <option value="9"{{request()->get('floors') == "9"  ? 'selected' : ""}}>9</option>
                                <option value="10"{{request()->get('floors') == "10"  ? 'selected' : ""}}>10</option>
                                <option value="11"{{request()->get('floors') == "11"  ? 'selected' : ""}}>11</option>
                            </select>
                        </div>
{{--                        <div class="form-group select-form">--}}
{{--                            <select>--}}
{{--                                <option value="0"> الكماليات</option>--}}
{{--                                <option value="0"> الكماليات </option>--}}
{{--                                <option value="0"> الكماليات </option>--}}
{{--                                <option value="0"> للبيع</option>--}}
{{--                                <option value="0">نوع العقار</option>--}}
{{--                                <option value="0"> للبيع</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                    </div>
                    <div class="form-group form-box--big">
                        <input type="search" placeholder="ابحث عن" name="q" value="{{request()->get('q')}}">
                        <button type="submit">بحث</button>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
