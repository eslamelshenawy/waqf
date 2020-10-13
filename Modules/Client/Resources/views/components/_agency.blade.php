<div class="search-results_details">
    @inject("image", "\App\Image")
    @php
        if(\Auth::check()){
        if(\App\Tenant::with('estateOrders')->find(Auth::guard('web')->user()->id)['estateOrders']->isNotEmpty() ){
            $estate_id=\App\Tenant::with('estateOrders')->find(Auth::guard('web')->user()->id)['estateOrders'][0]->estate_id;

            } else{
        $estate_id=0;
        
            }
        }
          else{
        $estate_id=0;
        
            } 

            $image=   $image->where(['imageable_id' => $agency->id, 'more' => "image-agency"])->pluck('name')->first();
    @endphp
   
    <div class="row">
        <div class="col-md-3">
            <div class="profile_pic">
                @if($image != null)
                    <img src="{{url('/images')}}/{{$image}}" alt="">
                @else
                    <img src="{{ asset('img') }}/{{ $agency->image_url ?? 'saudi-man.png' }}" alt="">
                @endif

            </div>
        </div>
        <div class="col-md-9">
            <div class="search_info">
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{ $agency->name ?? __('shared::commons.companies.name') }} </h3>
                    </div>
                    <div class="col-md-6">
                        <div class="search-results__action">

                            <!-- Button trigger modal -->
                            @if(auth()->guard('web')->check())

                                <button type="button" class="btn btn-primary maintence_order" data-toggle="modal" data-target="#exampleModal" id="maintence_order" 
                                data_id="{{ $agency->id}}" agencyType="@foreach(explode(',', $agency->services) as $service){{ __("client::users.services.$service")}} @endforeach" estate_id="{{$estate_id}}">
                                    {{ __('shared::commons.maintenance_order') }}
                                </button>
                            @else
                                <button type="button" class="btn btn-primary maintence_order_notauth" >
                                    {{ __('shared::commons.maintenance_order') }}
                                </button>

                            @endif


                            {{--                            <button type="button" @unless(Auth::check('tenant')) disabled @endif  v-on:click="setAgencyId({!! $agency->id !!})"--}}
                            {{--                                    class="btn"--}}
                            {{--                                    data-toggle="modal"--}}
                            {{--                                    data-target="#reserve_request">{{ __('shared::commons.maintenance_order') }}</button>--}}

                            <span class="search-results__action_type {{ $agency->type == 'agency' ? 'company' : 'technical' }}">
                                {{ ($agency->type == 'agency' ? __('shared::commons.companies.company') :
                                    __('shared::commons.companies.technical')) ?? '' }}
                            </span>
                        </div>
                    </div>
                </div>
                @foreach(explode(',', $agency->services) as $service)
                <input type="hidden" value="{{ __("client::users.services.$agency->services")}}" class="agencyType">
                @endforeach
                <div class="search_info__details">
                    <ul>
                        <li>{{ __('shared::commons.cities.city') }}: {{ $agency->city->name_ar ?? '' }}</li>
                        <li>{{ __('shared::commons.mobile_number') }}: {{ $agency->mobile ?? '' }}</li>
                    </ul>
                    <ul>
                        <li>{{ __('shared::commons.address') }}: {{ $agency->address ?? '' }}</li>
                        <li>{{ __('shared::commons.maintenance_type') }}:
                            @foreach(explode(',', $agency->services) as $service)
                                {{ __("client::users.services.$service") }}&nbsp; <br>
                            @endforeach
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
