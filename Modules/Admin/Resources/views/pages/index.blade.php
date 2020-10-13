@extends('admin::layouts.master')

@section('content')

    <section class="roles-and-permissions">
        <div class="container">
            @include('admin::layouts.partials._success')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3">
                                {{ __('admin::dashboard._pages', ['something' => __('shared::actions.manage')]) }}
                            </h4>
                            <p style="height: 60px;"></p>


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('admin::dashboard.page_title') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($pages && $pages->count())
                                        @foreach($pages as $key => $page)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $page->title }}</td>
                                                <td>
                                                    <a href="{{ route('Admin::pages.edit', $page->slug) }}" class="text-success mr-2">
                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripting...')
    <script>


    </script>
@endsection




{{-- <div class="loader-bubble loader-bubble-primary m-5"></div> --}}


