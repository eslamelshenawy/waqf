@extends('accounting::layouts.master')
@section('content')

    <section class="roles-and-permissions">
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                            <h4 class="card-title mb-3">{{ __('accounting::_._invoices') }}</h4>
                        <div class="table-responsive">
                            <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Invoice Number	</th>
                                    <th scope="col">Tenant </th>
                                    <th scope="col">Created At	 </th>
                                    <th scope="col">Invoice Amount </th>
                                    <th scope="col"><i class="i-Check text"></i> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($invoices && $invoices->count())
                                    @foreach($invoices as $key => $invoice)
                                        <tr>
                                            <td scope="row">{{ ++$key }}</td>
                                            <td scope="row">{{ $invoice->order_number }}</td>
                                            <td scope="row">{{ $invoice->tenant_name }}</td>
                                            <td scope="row">{{ $invoice->created_at }}</td>
                                            <td scope="row">{{ $invoice->amount }}</td>
                                            <td scope="row">
                                                @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update accountings')||auth()->user()->can('update invoices'))
                                                    <a href="{{ route('Accounting::invoices.edit', $invoice->id)}}" class="text-success mr-2">
                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                    </a>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('delete accountings')||auth()->user()->can('delete invoices'))

                                                    <form style="display: none;" method="POST" action="{{url('en/accounting/invoices/destroy', $invoice->id) }}" id="form-{{ $invoice->id }}">
                                                        @csrf
                                                        @method('post')
                                                        <input type="hidden" name="id" value="{{ $invoice->id }}" />

                                                    </form>
                                                    <a href="JavaScript:void(0);" class="text-danger mr-2"
                                                       onclick="deleteEstate({!! $invoice->id !!})">
                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('create accountings')||auth()->user()->can('create invoices'))
                                <a type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm" href="{{ route('Accounting::invoices.create') }}">&plus; {{ __('shared::actions.new') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection

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
                        'تم الغاء ',
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
