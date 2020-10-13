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
                            <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('shared::estates.apartments') }}</h4>

                            <div class="table-responsive">

                                <table id="multicolumn_ordering_table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('shared::commons.number') }}</th>
                                        <th scope="col">{{ __('shared::commons.name') }}</th>
                                        <th scope="col"><i class="i-Check text"></i> </th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($apartments && $apartments->count())
                                        @foreach($apartments as $key => $apartment)
                                            <tr>
                                                <td scope="row">{{ ++$key }}</td>
                                                <td scope="row">{{ $apartment->number }}</td>
                                                <td scope="row">{{ $apartment->building->name }}</td>
                                                <td scope="row">
                                                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('update apartments'))
                                                    <a href="{{ route('Admin::apartments.edit', $apartment->id) }}" class="text-success mr-2">
                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                    </a>
                                                    @endif
                                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('delete apartments'))

                                                        <form style="display: none;" method="POST" action="{{ route('Admin::apartments.destroy', $apartment->id) }}"
                                                          id="form-{{ $apartment->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a href="JavaScript:void(0);" class="text-danger mr-2"
                                                       onclick="deleteEstate({!! $apartment->id !!})">
                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                    </a>
                                                        @endif
                                                </td>

                                                <td scope="row">
                                                    <form method="POST" action="{{ route('Admin::control') }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="model" value="App\Building" />
                                                        <input type="hidden" name="id" value="{{ $apartment->id }}" />
                                                        @switch($apartment->is_active)
                                                            @case(true)
                                                            <label class="switch switch-success mr-3">
                                                                <input type="checkbox" checked name="is_active" onchange="this.form.submit()" value="0">
                                                                <span class="slider"></span>
                                                            </label>
                                                            @break
                                                            @case(false)
                                                            <label class="switch switch-success mr-3">
                                                                <input type="checkbox" name="is_active" onchange="this.form.submit()" value="1">
                                                                <span class="slider"></span>
                                                            </label>
                                                            @break
                                                        @endswitch
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('create apartments'))

                                <a type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm" href="{{ route('Admin::apartments.create') }}">&plus; {{ __('shared::actions.new') }}</a>
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

@push('scripts...')
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endpush

@section('scripting...')
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




        function deleteEstate(estate_id){
            Swal.fire({
                title: 'هل انت متاكد من الالغاء',
                text: "لن تتمكن من التراجع عن هذا",
                icon: 'تحذير',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'تم الالغاء',
                        'تم الغاء العقار',
                        'نجاح'
                    );
                    setTimeout(function(){
                        document.getElementById(`form-${estate_id}`).submit();
                    }, 2000);

                }
            });

            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
@endsection
