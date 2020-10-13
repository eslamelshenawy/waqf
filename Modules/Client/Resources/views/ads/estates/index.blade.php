@extends('client::layouts.master')

@section('content')
    @include('client::layouts.partials._breadcrumb')

    <section class="tit__link">
        <div class="container">
            <ul class="links">
                <li>الرئيسيه</li>
                <li><a href="#"> / إعلانات عقارية</a></li>
            </ul>
        </div>
    </section>

    <section class="search__box">
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="form-group select-form">
                            <select>
                                <option value="0">نوع العقار</option>
                                <option value="0"> للبيع</option>
                                <option value="0">نوع العقار</option>
                                <option value="0"> للبيع</option>
                                <option value="0">نوع العقار</option>
                                <option value="0"> للبيع</option>
                            </select>
                        </div>
                        <div class="form-group select-form form-box--big">
                            <select>
                                <option value="0"> للبيع</option>
                                <option value="0">نوع العقار</option>
                                <option value="0">نوع العقار</option>
                                <option value="0"> للبيع</option>
                                <option value="0">نوع العقار</option>
                                <option value="0"> للبيع</option>
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
                                <select>
                                    <option value="0"> عدد الغرف</option>
                                    <option value="0"> عدد الغرف</option>
                                    <option value="0"> عدد الغرف </option>
                                    <option value="0"> للبيع</option>
                                    <option value="0">نوع العقار</option>
                                    <option value="0"> للبيع</option>
                                </select>
                            </div>
                            <div class="form-group select-form">
                                <select>
                                    <option value="0"> الحمامات</option>
                                    <option value="0"> الحمامات </option>
                                    <option value="0"> الحمامات </option>
                                    <option value="0"> للبيع</option>
                                    <option value="0">نوع العقار</option>
                                    <option value="0"> للبيع</option>
                                </select>
                            </div>
                            <div class="form-group select-form">
                                <select>
                                    <option value="0"> الطابق</option>
                                    <option value="0"> الطابق </option>
                                    <option value="0"> الطابق </option>
                                    <option value="0"> للبيع</option>
                                    <option value="0">نوع العقار</option>
                                    <option value="0"> للبيع</option>
                                </select>
                            </div>
                            <div class="form-group select-form">
                                <select>
                                    <option value="0"> الكماليات</option>
                                    <option value="0"> الكماليات </option>
                                    <option value="0"> الكماليات </option>
                                    <option value="0"> للبيع</option>
                                    <option value="0">نوع العقار</option>
                                    <option value="0"> للبيع</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-box--big">
                            <input type="search" placeholder="ابحث عن">
                            <button type="submit">بحث</button>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="latest__estate__ads">
        <div class="tit">
            <h2>احدث إعلانات العقارات</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type type-rent">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type type-rent">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type type-rent">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type type-rent">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type type-rent">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estate__ads--item">
                        <div class="estate__ads--item--top">
                            <span class="type type-rent">تمليك</span>
                            <div class="estate__ads--item--top-img">
                                <img src="img/Saratogafarms.png" alt="">
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom">
                            <div class="estate__ads--item--bottom-header-top">
                                <div class="bottom-header-top-data">
                                    <h2>شقة بالرياض</h2>
                                    <div class="data-items">
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                200m<sup>2</sup>
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/plans.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                3
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/Path105.png" alt="">
                                            </span>
                                        </div>
                                        <div class="data-item">
                                            <span class="data-item-info">
                                                9
                                            </span>
                                            <span class="data-item-icon">
                                                <img src="img/bed.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-info">
                                <div class="location">
                                    <div class="location-item">
                                        <span class="location-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                    <div class="location-item">
                                        <span class="location-data">
                                            طريق الرياض الرئيسي
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">التفاصيل</a>
                                </div>
                            </div>
                            <div class="estate__ads--item--bottom-paragraph">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                    التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم
                                    استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن
                                    استخدام "هنا يوجد محتوى نصي، هنا يوجد
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination-dection">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1 \</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2 </a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>


@endsection