@extends('admin::layouts.master')
@section('content')
    <section class="roles-and-permissions">
        <div class="container">
            @include('admin::layouts.partials._success')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('طلبات الميزانيه') }}</h4>
                            <div class="table-responsive">
                                <table id="multicolumn_ordering_table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('shared::commons.beneficiary') }}</th>
                                        <th scope="col">{{ __('السبب') }}</th>
{{--                                        <th scope="col" id="admin_commit_ad">{{ __('shared::commons.commit') }}</th>--}}
                                        <th scope="col">{{ __('shared::commons.status') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($orderBalance && $orderBalance->count())
                                        @foreach($orderBalance as $key => $balance)
                                         @if($balance->madeBy  != NULL  )
                                        @if(@$balance->madeBy->deleted_at  == NULL  )
                                            <tr>
                                                <td scope="row">{{ ++$key }}</td>
                                                <td scope="row">{{$balance->madeBy->name}}</td>
                                                <td scope="row">{{$balance->reason}}</td>
                                                <input type="hidden" name="id" value="{{$balance->admin_commit }}">
                                                <td scope="row">
                                                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('delete orderbalances'))

                                                    <form method="get" action="{{ url('en/dashboard/balance/accept') }}">
                                                        @csrf
                                                        @method('get')
                                                        <input type="hidden" name="model" value="App\Beneficiary" />
                                                        <input type="hidden" name="id" value="{{ $balance->beneficiary_id }}" />
                                                        @switch($balance->is_accepted)
                                                            @case(true)
                                                            <label class="switch switch-success mr-3">
                                                                <input type="checkbox" checked name="is_accepted" onchange="this.form.submit()" value="0">
                                                                <span class="slider"></span>
                                                            </label>
                                                            @break
                                                            @case(false)
                                                            <label class="switch switch-success mr-3">
                                                                <input type="checkbox" name="is_accepted" onchange="this.form.submit()" value="1">
                                                                <span class="slider"></span>
                                                            </label>
                                                            @break
                                                        @endswitch
                                                    </form>
                                                    @endif

                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
{{--                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('create buildings'))--}}
{{--                                <a type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm" href="{{ route('Admin::buildings.create') }}">&plus; {{ __('shared::actions.new') }}</a>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="date_pay_done" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تاريخ السداد الفعلى </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" style="min-width: 100%" id="date_advance">
                </div>
                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="button" class="btn btn-primary"id="send_date">Save </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="example1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">سبب الرفض</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
{{--                    <textarea name="admin_commit" id="admin_commit" cols="30" rows="10"></textarea>--}}
                    <textarea class="form-control" style="min-width: 100%" id="admin_commit"></textarea>
                </div>
                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="button" class="btn btn-primary" id="send_comment">Save </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

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
        }
    </script>
@endsection
