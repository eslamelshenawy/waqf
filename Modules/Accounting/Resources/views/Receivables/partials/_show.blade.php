@extends('accounting::layouts.master')
@section('content')
    @inject('bank', '\Modules\Accounting\Entities\Bank')
    @php
        $balance= @$data->balances->debit - @$data->balances->credit ;
        
    @endphp
    <section class="roles-and-permissions">
        <div class="container" id="app">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="modal-body">
                            <div class="accordion" id="accordionExample">
                                @if(@$type == "tenant")
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#rent" aria-expanded="false"
                                                        aria-controls="rent">
                                                    الإيجارات
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="rent" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table id="multicolumn_ordering_tabl"
                                                           class="table table-striped table-bordered"
                                                           style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">{{ __('الاسم ') }}</th>
                                                            <th scope="col">{{ __('السعر') }}</th>
                                                            <th scope="col">{{ __('المدينه') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($data->estateOrders as $key=> $estateOrder)
                                                            @inject('city', '\App\City')
                                                            @php
                                                                $details= $estateOrder->with('madeBy')->first();
                                                                 $city_name= $city->where('id',$details->madeBy->city_id)->select("name_ar")->first();
                                                                 if(@$data->balances != null){
                                                                     $balance=  $data->balances->debit - $data->balances->credit ;
                                                                 }
                                                            @endphp
                                                            {{--                                                            $details= $estateOrder->with('madeBy')->where('is_accepted',1)->first();--}}

                                                            <tr>
                                                                <td scope="row">{{ ++$key }}</td>
                                                                <td scope="row">{{@$details->madeBy->name}}</td>
                                                                <td scope="row">{{$estateOrder->amount}}</td>
                                                                <td scope="row">{{$city_name->name_ar}}</td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#balance" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                الرصيد
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="balance" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-2">
                                                    <label for="">دائن </label>
                                                    <p class="alert alert-primary" role="alert"
                                                       v-text="credit">{{@$data->balances->credit ? @$data->balances->credit : 0}}</p>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="">مدين</label>
                                                    <p class="alert alert-primary" role="alert"
                                                       v-text="debit">{{@$data->balances->debit ? @$data->balances->debit : 0}}</p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-2">
                                                    <label for=""> الرصيد </label>
                                                    <p class="alert alert-primary" role="alert"
                                                       v-text="balance">{{  $balance > 0 ? $balance :  $balance."مدين" }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo2">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#moveMake" aria-expanded="false"
                                                    aria-controls="moveMake">
                                               التفاصيل
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="moveMake" class="collapse" aria-labelledby="headingTwo2"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            @inject("Voucher", "\Modules\Accounting\Entities\Voucher")
                                            @inject('account', '\Modules\Accounting\Entities\Account')
                                            @inject('Invoice', '\Modules\Accounting\Entities\Invoice')
                                            @php
                                        
                                            if($data->balances){
                                             $vouchers=$Voucher->where('number',$data->balances->moveId)->get();
                                             
                                                if(@$type == "tenant"){
                                            
                                                $Invoicies=$Invoice->where('order_number',$data->balances->invoiceNum)->get();
                                               $vouchers= $vouchers->toBase()->merge($Invoicies);
                                                }

                                                $accounts=$Voucher->where('id',$data->balances->moveId)->get();
                                            }else{
                                            $vouchers = null;
                                            }
                                               
                                            @endphp
                                                
                                            <div class="table-responsive">
                                                <table id="multicolumn_ordering"
                                                       class="table table-striped table-bordered"
                                                       style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">{{ __('الحساب المدين') }}</th>
                                                        <th scope="col">{{ __('البيان') }}</th>
                                                        <th scope="col">{{ __('التاريخ') }}</th>
                                                        <th scope="col">{{ __('المبلغ') }}</th>
                                                        <th scope="col">{{ __('الحساب الدائن') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        @if($vouchers)
                                                    @foreach(@$vouchers as $key=> $voucher)
                                                        @php
                                                        
                                                             if($voucher->account_idAttributable != null){
                                                               $accountname=$account->where('id',$voucher->account_idAttributable)->first();
                                                               }else{
                                                               
                                                                   $accountname=$account->where('id',$voucher->account_id)->first();
                                                               }
                                                             $account=$account->where('id',$voucher->paymentable_id)->first();
                                                        @endphp

                                                        <tr>
                                                            <td scope="row">{{$account->name}}
                                                            <!--    @if($Voucher->where('number',$data->balances->moveId)->get()->IsEmpty() != true)-->
                                                            <!--    {{ @$voucher->document_type == "Payment" ? "سند صرف" :"سند قبض " }}-->
                                                            <!--    @else-->
                                                            <!--    {{  @$voucher->document_type == "credit" ? "فاتورة ايجار": ""  }}-->

                                                            <!--@endif-->
                                                            </td>
                                                            <td scope="row">{{@$voucher->description }}{{ @$voucher->notes}}</td>
                                                            <td scope="row">{{@$voucher->date }}{{ @$voucher->order_at}}</td>
                                                            <td scope="row">
                                                                
                                                                {{@$voucher->amount != 0 ? @$voucher->amount : @$voucher->paid_amount }}
                                                               
                                                                </td>
                                                            <td scope="row">{{@$accountname->name}}</td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                    @else
                                                    <!--لا توجد اى تعاملات-->

                                                    @endif

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                    @if($type == "agency")
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                            data-toggle="collapse" data-target="#maintenanceOrders"
                                                            aria-expanded="false" aria-controls="maintenanceOrders">
                                                        طلبات الصيانه
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="maintenanceOrders" class="collapse" aria-labelledby="headingTwo"
                                                 data-parent="#accordionExample">
                                                <div class="card-body">

                                                    <div class="table-responsive">
                                                        <table id="multicolumn_ordering99"
                                                               class="table table-striped table-bordered"
                                                               style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">{{ __('اسم وكيل الصيانه ') }}</th>
                                                                <th scope="col">{{ __('هاتف الوكيل') }}</th>
                                                                <th scope="col">{{ __('الاسم للعقار') }}</th>
                                                                <th scope="col">{{ __('الاسم المستاجر') }}</th>
                                                                <th scope="col">{{ __('المدينه') }}</th>
                                                                <th scope="col">{{ __('الوصف') }}</th>
                                                                <th scope="col">{{ __('حالة الطلب') }}</th>
                                                                <th scope="col">{{ __('تاريخ الذهاب للمستاجر') }}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if($data->maintenanceOrders)
                                                                
                                                            @foreach($data->maintenanceOrders as $key=> $maintenanceOrder)
                                                                @inject('city', '\App\City')
                                                                @inject('Tenant', '\App\Tenant')
                                                                @php
                                                                    $details= $maintenanceOrder->with('madeBy','agency','estate')->first();
                                                                     $city_name= $city->where('id',$maintenanceOrder->city_id)->select("name_ar")->first();
                                                                     $tenet_name=$Tenant->where('id',$maintenanceOrder->tenant_id)->first();

                                                                @endphp
                                                                <tr>
                                                                    <td scope="row">{{ ++$key }}</td>
                                                                    <td scope="row">{{$details->agency->name}}</td>
                                                                    <td scope="row">{{$details->agency->mobile}}</td>
                                                                    <td scope="row">{{$details->estate->name}}</td>
                                                                    <td scope="row"> <a href="{{ route('Admin::tenants.show', $tenet_name->id) }}">{{$tenet_name->name}}</a></td>
                                                                    <td scope="row">{{$city_name->name_ar}}</td>
                                                                    <td scope="row">{{$maintenanceOrder->description}}</td>
 <td scope="row">
                                                                        @if($maintenanceOrder->is_accepted == "1" && $maintenanceOrder->is_done == "0")
                                                                            تمت الموافقه على الطلب
                                                                        @endif
                                                                        
                                                                        @if($maintenanceOrder->is_accepted == "0" && $maintenanceOrder->is_done == "0")
                                                                            الطلب معلق
                                                                        @endif
                                                                        @if(($maintenanceOrder->is_accepted == "1" && $maintenanceOrder->is_done == "1"))

                                                                            تمت إنتهاء الصيانه
                                                                            @endif
                                                                       @if($maintenanceOrder->is_accepted == "2")
                                                                            تم رفض الطلب
                                                                    @endif
                                                                    </td>
                                                                    <td scope="row">{{$maintenanceOrder->ended_at != null ? $maintenanceOrder->ended_at : "---"}}</td>

                                                                </tr>
                                                            @endforeach
                                                            @else
                                                            
                                                            
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @if($type == "tenant")
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#maintenanceOrders"
                                                        aria-expanded="false" aria-controls="maintenanceOrders">
                                                    طلبات الصيانه
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="maintenanceOrders" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table id="multicolumn_ordering"
                                                           class="table table-striped table-bordered"
                                                           style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">{{ __('اسم وكيل الصيانه ') }}</th>
                                                            <th scope="col">{{ __('هاتف الوكيل') }}</th>
                                                            <th scope="col">{{ __('الاسم للعقار') }}</th>
                                                            <th scope="col">{{ __('المدينه') }}</th>
                                                            <th scope="col">{{ __('الوصف') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($data->maintenanceOrders as $key=> $maintenanceOrder)
                                                            @inject('city', '\App\City')
                                                            @php
                                                                $details= $maintenanceOrder->with('madeBy','agency','estate')->first();
                                                                 $city_name= $city->where('id',$maintenanceOrder->city_id)->select("name_ar")->first()

                                                            @endphp
                                                            <tr>
                                                                <td scope="row">{{ ++$key }}</td>
                                                                <td scope="row">{{$details->agency->name}}</td>
                                                                <td scope="row">{{$details->agency->mobile}}</td>
                                                                <td scope="row">{{$details->estate->name}}</td>
                                                                <td scope="row">{{$city_name->name_ar}}</td>
                                                                <td scope="row">{{$maintenanceOrder->description}}</td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($type == "tenant")
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#estateOrders"
                                                        aria-expanded="false" aria-controls="estateOrders">
                                                    طلبات الايجارات
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="estateOrders" class="collapse" aria-labelledby="headingThree"
                                             data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table id="multicolumn_ordering2"
                                                           class="table table-striped table-bordered"
                                                           style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">{{ __('الاسم ') }}</th>
                                                            <th scope="col">{{ __('السعر') }}</th>
                                                            <th scope="col">{{ __('المدينه') }}</th>
                                                            <!--<th scope="col">{{ __('مدة الايجار') }}</th>-->
                                                            <th scope="col">{{ __('تاريخ الانتهاء') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($data->rents as $key=> $rent)
                                                            @inject('city', '\App\City')
                                                            @php
                                                                $details= $rent->with('tenant','estate','estateOrders')->first();
                                                                 $city_name= $city->where('id',$details->estate->city_id)->select("name_ar")->first();
                                                                
                                                            @endphp
                                                            <tr>
                                                                <td scope="row">{{ ++$key }}</td>
                                                                <td scope="row">
                                                                     @if($details->estate != null)
                                                                    {{$details->estate->name}}
                                                                    @endif
                                                                    </td>
                                                                <td scope="row">
                                                                    @if($details->estateOrders != null)
                                                                    {{$details->estateOrders->amount}}
                                                                    @endif
                                                                    </td>
                                                                <td scope="row">{{$city_name->name_ar}}</td>
                                                                <!--<td scope="row">@if($details->estateOrders != null){{$details->estateOrders->rent_period}}@endif</td>-->
                                                                <td scope="row">@if($details->estateOrders != null){{$details->estateOrders->ended_at}} @endif</td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
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
@push('scripts...')

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


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
        $('#multicolumn_ordering99').DataTable({
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
        $('#multicolumn_ordering').DataTable({
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
        $('#multicolumn_ordering2').DataTable({
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


        function deleteEstate(estate_id) {
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
                    setTimeout(function () {
                        document.getElementById(`form-${estate_id}`).submit();
                    }, 2000);

                }
            });


        }
    </script>
@endsection
