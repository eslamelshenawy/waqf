@extends('admin::layouts.master')


@section('content')
    <section class="roles-and-permissions">
        <div class="container">
            @include('admin::layouts.partials._success')
@if (\Session::has('errors'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('errors') !!}</li>
        </ul>
    </div>
@endif
            <div class="row">

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('shared::estates.lands.it') }}</h4>
                            {{--                        <p>Responsive tables allow tables to be scrolled horizontally with ease. Make any table responsive across all viewports by wrapping a <code>.table</code> with <code>.table-responsive</code>. Or, pick a maximum breakpoint with--}}
                            {{--                            which to have a responsive table up to by using <code>.table-responsive{-sm|-md|-lg|-xl}</code>.</p>--}}

                            {{--                            <div class="form-row mt-3 mb-3">--}}
                            {{--                                <div class="col-md-12">--}}
                            {{--                                    <form method="POST" action="{{ route('Admin::syncing') }}">--}}
                            {{--                                        <button class="btn btn-raised btn-raised-primary shadow" type="button" onclick="syncing()">--}}
                            {{--                                            <i class="fas fa-sync-alt"></i>&nbsp;&nbsp;{{ __('admin::privileges._permissions', ['something' => __('shared::actions.sync')]) }}--}}
                            {{--                                        </button>--}}
                            {{--                                    </form>--}}
                            {{--                                </div>--}}

                            {{--                            </div>--}}

                            <div class="table-responsive">

                                <table id="multicolumn_ordering_table" class="table table-striped table-bordered" style="width:100%">

                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('shared::commons.city') }}</th>
                                        <th scope="col">{{ __('shared::commons.number') }}</th>
                                        <th scope="col">{{ __('shared::estates.district') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @inject('city', '\App\City')

                                    @if($lands && $lands->count())
                                        @foreach($lands as $key => $land)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>
                                                        {{ $city->where('id',$land->city_id)->first()->name_ar }}
                                                </td>
                                                <td>{{ $land->number }}</td>
                                                <td>{{ $land->district }}</td>

                                                <td>
                                                    @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update lands'))
                                                    <a href="{{ route('Admin::lands.edit', $land->id) }}" class="text-success mr-2">
                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                    </a>
                                                    @endif
                                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('delete lands'))

                                                        <form style="display: none;" method="POST" action="{{ route('Admin::lands.destroy', $land->id) }}" id="form-{{ $land->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a href="JavaScript:void(0);" class="text-danger mr-2" onclick="deletePermission({{ $land->id }})">
                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                    </a>
                                                        @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('create lands'))
                                <a type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm" href="{{ route('Admin::lands.create') }}">&plus; {{ __('shared::actions.new') }}</a>
                                @endif
                            </div>


                        </div>

                    </div>
                    {{--                {{ $permissions->links() }}--}}
                </div>
            </div>
        </div>
    </section>
@endsection


@push('styles...')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('styling...')
    <style>
        div.dataTables_wrapper div.dataTables_filter label {
            margin-right: 292px;
        }
        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin-right: 530px;
        }
        .pagination .page-item.active .page-link {
            background-color: #663399 !important;
        }
    </style>
@endsection


@section('scripting...')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        $('#multicolumn_ordering_table').DataTable({
            language: {
                "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing":   "جارٍ التحميل...",
                "sLengthMenu":   "أظهر _MENU_ مدخلات",
                "sZeroRecords":  "لم يعثر على أية سجلات",
                "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix":  "",
                "sSearch":       "ابحث:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "الأول",
                    "sPrevious": "السابق",
                    "sNext":     "التالي",
                    "sLast":     "الأخير"
                },
                "oAria": {
                    "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            }
        });
        function deletePermission(permission_id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    setTimeout(function(){
                        document.getElementById(`form-${permission_id}`).submit();
                    }, 2000);

                }
            });

            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
@endsection
