@extends('client::layouts.master')
@section('content')
    @include('client::layouts.partials._breadcrumb_3d')
     @inject('Buildings', '\App\Building')
    <main>
    @include('client::layouts.partials._search_box_maintenance')
    <section class="search-results" id="maintenance">
        @if(session()->has('success'))

            <div class="container">
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            </div>
        @endif
        <div class="container">
            <div class="search-results_total">
                <p>عدد نتائج البحث {{ $agencies->count() }} فنى / شركة</p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">طلب صيانة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate method="POST" action="{{ route('Client::maintenance.store.order') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="apartment_id" id="apartment_id" value="">
                                <input type="hidden" name="tenant_id" id="tenant_id" value="{{@Auth::user()->id}}">
                                <input type="hidden" name="agency_id" id="agency_id" value="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            الاسم
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="{{@Auth::user()->name}}" name="username" required disabled/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            رقم الجوال
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="{{@Auth::user()->mobile}}" name="mobile" required disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="availableDate">
                                                    التاريخ المتاح
                                                    <span class="lable__start">*</span>
                                                </label>
                                                <input type="datetime-local" class="form-control" name="date" required  />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="apartmentId">
                                                    <span class="lable__start">*</span>
                                                    نوع الصيانه
                                                </label>
                                                <input type="text" class="form-control" id="apartmentId" name="apartmentId" required  />
{{--                                                <select class="form-control" id="apartmentId" name="apartmentId" required>--}}
{{--                                                    <option value="" {{ old('service') == '' ? 'selected' : '' }}>{{ __('اختر نوع الصيانه') }}</option>--}}
{{--                                                    <option value="electric" {{ old('service') == 'electric' ? 'selected' : '' }}>{{ __('shared::users.electric') }}</option>--}}
{{--                                                    <option value="carpenter" {{ old('service') == 'plumber' ? 'selected' : '' }}>{{ __('shared::users.plumber') }}</option>--}}
{{--                                                    <option value="carpenter" {{ old('service') == 'carpenter' ? 'selected' : '' }}>{{ __('shared::users.carpenter') }}</option>--}}
{{--                                                    <option value="carpenter" {{ old('service') == 'painter' ? 'selected' : '' }}>{{ __('shared::users.painter') }}</option>--}}
{{--                                                    <option value="carpenter" {{ old('service') == 'cleaning' ? 'selected' : '' }}>{{ __('shared::users.cleaning') }}</option>--}}
{{--                                                    <option value="uploading_and_downloading" {{ old('service') == 'uploading_and_downloading' ? 'selected' : '' }}>{{ __('shared::users.uploading_and_downloading') }}</option>--}}
{{--                                                    <option value="transfer_furniture" {{ old('service') == 'transfer_furniture' ? 'selected' : '' }}>{{ __('shared::users.transfer_furniture') }}</option>--}}
{{--                                                    <option value="paving" {{ old('service') == 'paving' ? 'selected' : '' }}>{{ __('shared::users.paving') }}</option>--}}
{{--                                                    <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>{{ __('shared::users.other') }}</option>--}}
{{--                                                </select>--}}
                                            </div>
                                        </div>
                                    
                                   
                                    @if(\Auth::check())
                                    @if(\App\Tenant::with('estateOrders')->find(Auth::guard('web')->user()->id)['estateOrders']->isEmpty() )
                                      <div class="form-group col-md-6">
                                                <label for="apartmentId">
                                                    <span class="lable__start">*</span>
                                                    اختر العقار الذى تريد الصيانه عليه
                                                </label>
                                             <select class="form-control" id="apartment_id" name="apartment_id" required>
                                                <option>........</option> 
                                                @foreach($Buildings->get() as $Building)
                                                <option value="{{$Building->id}}"> {{ $Building->slug }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                  
                                    @endif
                                    @endif
                                    <div class="form-group col-md-6">
                                        <label for="fix">
                                            العطل
                                            <span class="lable__start">*</span>
                                        </label>
                                        <textarea class="form-control" id="fix" name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                <!-- Start Identity Number -->
                                <div class="form-group col-md-6">
                                    @inject('city', '\App\City')
                                    <label for="identity_number">{{ __('shared::commons.city') }}</label>
                                    <select class="form-control" name="city" required>
                                        @foreach($city->all() as $c)
                                            <option value="{{ $c->name_en }}" {{ old('city') == $c->name_en ? 'selected' : '' }}>{{ $c->name_ar }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    <div>
                                        <span class="badge badge-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <!-- End Identity Number -->

                                <div class="form-group col-md-6">
                                    <h5 class="card-title">{{ __('shared::commons.images') }}</h5>

                                    @uploader(['field' => 'images[]', 'multi' => true,
                                    'title' => __('shared::commons.select_images')])
                                    @error('images')
                                    <div>
                                    <span class="badge badge-danger">
                                        {{ $message }}
                                    </span>
                                    </div>
                                    @enderror
                                </div>
                                </div>
                                <button type="submit"  class="btn btn-lg" style="width: 50%;">
                                    طلب الصيانة
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @each('client::components._agency', $agencies, 'agency')
            {{ $agencies->links() }}
            @auth
        </div>
        @endauth
    </section>
</main>
@endsection
@section('scripting...')
    <script !src="">
    </script>

@endsection
