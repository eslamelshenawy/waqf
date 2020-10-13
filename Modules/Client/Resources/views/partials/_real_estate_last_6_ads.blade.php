<section class="latest__estate__ads">
    <div class="tit">
        <h2>احدث إعلانات العقارات</h2>
    </div>
    <div class="container">
        <div class="row">
            @foreach($estate->all() as $key => $est)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="estate__ads--item">
                    <div class="estate__ads--item--top">
                        <span class="type">ايجار</span>
                        <div class="estate__ads--item--top-img">
                            <img src="{{url('/images')}}/{{ @$image->where(['imageable_id' => $est->id, 'more' => null])->pluck('name')->random() }}" alt="">
                        </div>
                    </div>
                    <div class="estate__ads--item--bottom">
                        <div class="estate__ads--item--bottom-header-top">
                            <div class="bottom-header-top-data">
                                <h2>{{ __('shared::estates.' . $est->estate_type, ['something' => '']) . ' ب' . $est->city->name_ar }}</h2>
                                <div class="data-items">
                                    <div class="data-item">
                                        <span class="data-item-info">
                                            {{ en2ar($est->space) }}م<sup>{{ en2ar('2') }}</sup>
                                        </span>
                                        <span class="data-item-icon">
                                            <img src="img/plans.png" alt="">
                                        </span>
                                    </div>
                                    <div class="data-item">
                                        <span class="data-item-info">
                                            {{ en2ar('3') }}
                                        </span>
                                        <span class="data-item-icon">
                                            <img src="img/Path105.png" alt="">
                                        </span>
                                    </div>
                                    <div class="data-item">
                                        <span class="data-item-info">
                                            {{ en2ar('9') }}
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
                                        {{ $est->address }}
                                    </span>
                                </div>
                            </div>
                            <div class="details">
                                <a href="{{ route('estate.show', $est->slug) }}">التفاصيل</a>
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom-paragraph">
                            <p>
                                {{ $est->extra_details }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
