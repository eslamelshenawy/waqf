@extends('client::layouts.master')
@section('content')
    @include('client::layouts.partials._breadcrumb_3d')
    @include('client::layouts.partials._search_box')
    <section class="latest__estate__ads">
        <div class="tit">
            <h2>احدث إعلانات العقارات</h2>
        </div>
        <div class="container">
            <div class="row">
                <!-- Start Real Estate Blocks -->
{{--                @include('client::estates.partials._building')--}}
                <!-- Start Real Estate Blocks -->
                @if(@$estates->IsEmpty() != true)

                @each('client::estates.partials._estate', $estates, 'estate')

                    <div class="pagination-dection">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                    <span class="sr-only">{{ __('shared::commons.previous') }}</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">{{ count($estates) }} \</a></li>
{{--                            <li class="page-item active"><a class="page-link" href="#">{{ en2ar('2') }} </a></li>--}}
                            <li class="page-item active"><a class="page-link" href="#">{{ count($estates) }} </a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                    <span class="sr-only">{{ __('shared::commons.next') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                @else
                    <div class="tit">
                        <h4> {{ __('shared::commons.nodate') }}</h4>
                    </div>


                @endif
            </div>

        </div>
    </section>


@endsection
