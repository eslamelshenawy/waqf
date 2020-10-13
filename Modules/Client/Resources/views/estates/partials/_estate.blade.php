@inject("image", "\App\Image")
<div class="col-md-6 col-sm-6 col-xs-12">


    <div class="estate__ads--item">
        <div class="estate__ads--item--top">
            <span class="type">ايجار</span>
            <div class="estate__ads--item--top-img">
                <img src="{{url('/images')}}/{{ $image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random() }}" alt="">
            </div>
        </div>
        <div class="estate__ads--item--bottom">
            <div class="estate__ads--item--bottom-header-top">
                <div class="bottom-header-top-data">
                    @switch($estate->estate_type)
                        @case('building')
                            <h2>{{ $estate->name }}</h2>
                            @break
                        @case('apartment')
                            <h2>{{ __('shared::estates.apartment') }}</h2>
                            @break
                        @case('shop')
                            {{ __('shared::estates.shop') }}
                            @break
                        @case('land')
                            {{ __('shared::estates.land') }}
                            @break
                    @endswitch
                    <div class="data-items">
                        <div class="data-item">
                            <span class="data-item-info">
                                {{ en2ar($estate->space) }}<sup>2</sup>
                            </span>
                            <span class="data-item-icon">
                                <img src="{{ asset('img') }}/plans.png" alt="">
                            </span>
                        </div>
                        <div class="data-item">
                            <span class="data-item-info">
                                {{ en2ar('3') }}
                            </span>
                            <span class="data-item-icon">
                                <img src="{{ asset('img') }}/Path105.png" alt="">
                            </span>
                        </div>
                        <div class="data-item">
                            <span class="data-item-info">
                                {{ en2ar('9') }}
                            </span>
                            <span class="data-item-icon">
                                <img src="{{ asset('img') }}/bed.png" alt="">
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
                            {{ $estate->address }}
                        </span>
                    </div>
                </div>
                <div class="details">
                    <a href="{{ route('estate.show', $estate->slug) }}">التفاصيل</a>
                </div>
            </div>
            <div class="estate__ads--item--bottom-paragraph">
                <p>
                    {{ $estate->extra_details }}
                </p>
            </div>
        </div>
    </div>

</div>

