@extends('client::layouts.master')

@section('content')
   @inject('bank', '\Modules\Accounting\Entities\Bank')
    @php
        $balance= @$data->balances->credit - @$data->balances->debit
    @endphp
@section('content')
    <section class="roles-and-permissions">
        <div class="container">
            @include('admin::layouts.partials._success')

            <section class="heading">
                <div class="container">
                    <div class="heading__body old-requests">
                        <h1>  {{ __('shared::actions.statement_account') }}</h1>
                        <span class="line"></span>
                    </div>
                </div>
            </section>

            <div class="search-results_details" id="advance_added">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search_info">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-results__action">

                                        <div class="table-responsive">
                                            <table class="display table table-striped table-bordered dataTable" id="alternative_pagination_table" style="width:100%">
                                                <caption>
                                                    {{-- {{ $vouchers->count() }} --}}
                                                </caption>
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">رقم السند </th>
                                                    <th scope="col">نوع الدفع</th>
                                                    <th scope="col">المبلغ المدفوع</th>
                                                    <th scope="col">تاريخ السند </th>
                                                    <th scope="col"> نوع الحساب </th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center">
                                             @inject("Voucher", "\Modules\Accounting\Entities\Voucher")
                                            @inject('account', '\Modules\Accounting\Entities\Account')
                                            @inject('Invoice', '\Modules\Accounting\Entities\Invoice')
                                            @php
                                            if($data->balances){
                                                $vouchers=$Voucher->where('number',$data->balances->moveId)->get();
                                                if($vouchers->IsEmpty() == true){
                                                $vouchers=$Invoice->where('order_number',$data->balances->moveId)->get();
                                                }

                                                $accounts=$Voucher->where('id',$data->balances->moveId)->get();
                                                 }else{
                                            $vouchers = null;
                                            }
                                            @endphp

                                                @php
                                                $sum=0;
                                                @endphp
                                                @if($vouchers)
                                                @foreach(@$vouchers as $key => $voucher)
                                                       @php
                                                            if($Voucher->where('number',$data->balances->moveId)->get()->IsEmpty() != true){
                                                               $accountname=$account->where('id',$voucher->account_idAttributable)->first();
                                                               }else{
                                                                   $accountname=$account->where('id',$voucher->account_id)->first();
                                                               }
                                                               
                                                                 $account=$account->where('id',$voucher->paymentable_id)->first();
                                                        @endphp

                                                    <tr>
                                                        <th scope="row">{{++$key}}</th>
                                                        <td>{{$voucher->number}}</td>
                                                        <td>{{$account->name}}</td>
                                                        <td>{{@$voucher->paid_amount }}</td>
                                                        <td>{{$voucher->date }}</td>
                                                        <td>{{@$accountname->name}}</td>

                                                    </tr>
                                                    @php
                                                    $sum +=@$voucher->paid_amount ;
                                                    @endphp
                                                @endforeach
                                                <tr>
                                                     <td scope="col"> الرصيد</td>
                                                   <td colspan="5" scope="col"> {{$sum}}</td>
                                                </tr>
 @else
                                                    <!--لا توجد اى تعاملات-->

                                                    @endif
                                                </tbody>
                                            </table>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
@push('scripts...')
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endpush
@section('scripting...')
<script>
  $('#alternative_pagination_table').DataTable({
            language: {
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            }
        });
</script>
@endsection




{{-- <div class="loader-bubble loader-bubble-primary m-5"></div> --}}


