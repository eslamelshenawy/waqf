@extends('accounting::layouts.master')
@section('content')
    @inject('bank', '\Modules\Accounting\Entities\Bank')

    <section class="roles-and-permissions">
    <div class="container">
        @include('accounting::layouts.partials._success')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        @if($type != 'bank')
                        <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('accounting::_.fund') }}</h4>
                        @else
                            <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('accounting::_.bank') }}</h4>
                        @endif
                        <div class="table-responsive">
                            <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('shared::commons.name') }}</th>
                                    @if($type == 'bank')
                                        <th scope="col">رقم الحساب</th>
                                    @endif
                                    <th scope="col">{{ __('تاريخ الانشاء') }}</th>
                                    <th scope="col"><i class="i-Check text"></i> </th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($type == 'bank')
                                    @php
                                    $fund= $bank->all();
                                    @endphp
                                @endif
                                @if($fund && $fund->count())
                                    @foreach($fund as $key => $box)

                                        <tr>
                                            <td scope="row">{{ ++$key }}</td>
                                            <td scope="row">{{ $box->name }}</td>
                                            @if($type == 'bank')
                                                <td scope="row">{{ $box->number_account }}</td>
                                            @endif
                                            <td scope="row">{{ $box->created_at }}</td>
                                            <td scope="row">
                                                @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update accountings'))
                                                    <a href="{{ url( 'en/accounting/fund',$box->id) }}/edit?type={{$type}}" class="text-success mr-2">
                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                    </a>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('delete accountings'))

                                                    <form style="display: none;" method="get" action="{{ url('en/accounting/fund/destroy', $box->id) }}" id="form-{{ $box->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="model" value="{{$type}}" />
                                                        <input type="hidden" name="id" value="{{ $box->id }}" />

                                                    </form>
                                                    <a href="JavaScript:void(0);" class="text-danger mr-2"
                                                       onclick="deleteEstate({!! $box->id !!})">
                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td scope="row">
                                                <form method="get" action="{{ url('accounting/fund/control') }}">
                                                    @csrf
                                                    @method('get')
                                                    <input type="hidden" name="model" value="{{$type}}" />
                                                    <input type="hidden" name="id" value="{{ $box->id }}" />
                                                    @switch($box->is_active)
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
                            @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update accountings'))
                                <a type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm" href="{{ route('Accounting::fund.create','type='.$type) }}">&plus; {{ __('shared::actions.new') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
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
    .page-item.active .page-link {
        background-color: #639;
        border-color: #639;
    }
</style>
@endsection
@push('scripts...')
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endpush
@section('scripting...')
    <script>
        $('#multicolumn_ordering_tabl').DataTable({
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
