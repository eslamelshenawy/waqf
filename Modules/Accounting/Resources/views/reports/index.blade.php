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
                        @if($type == 'expenses')
                        <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('accounting::_.reports_expenses') }}</h4>
                        @else
                            <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('accounting::_.reports_received') }}</h4>
                        @endif
                        <div class="table-responsive">
                            <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('رقم السند') }}</th>
                                    <th scope="col">{{ __('اسم الحساب') }}</th>
                                    <th scope="col">{{ __('نوع الدفع') }}</th>
                                    <th scope="col">{{ __('تاريخ الانشاء') }}</th>
                                    <th scope="col">{{ __('المبلغ المدفوع') }}</th>
                                    <th scope="col"><i class="i-Check text"></i> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($Voucher && $Voucher->count())
                                    @foreach($Voucher as $key => $box)
                                        <tr>
                                            <td scope="row">{{ ++$key }}</td>
                                            <td scope="row">{{ $box->number }}</td>
                                            <td scope="row">{{ $box->account->name }}</td>
                                            <td scope="row">{{ $box->paymentable_type == "Fund" ? "صندوق ": " بنك" }}</td>
                                            <td scope="row">{{ $box->created_at }}</td>
                                            <td scope="row">{{ $box->paid_amount }}</td>
                                            <td scope="row">
                                                @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('read reports'))
                                                    <!-- Button trigger modal -->
{{--                                                        <button type="button" class="btn btn-primary" >--}}
{{--                                                            Launch demo modal--}}
{{--                                                        </button>--}}

                                                        <a data-toggle="modal" data-target="#exampleModal"  data_id="{{$box->id}}" class="text-success mr-2 details_voucher">
                                                        <i class="fa fa-eye font-weight-bold"></i>
                                                    </a>
                                                @endif
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">التفاصيل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="">رقم السند </label>
                                <div id="num_vocher" class="alert alert-primary" role="alert"></div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="">اسم الحساب</label>
                            <p id="name_account" class="alert alert-primary" role="alert"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for=""> نوع الدفع </label>
                            <p id="type_pay" class="alert alert-primary" role="alert"></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for=""> المبلغ الدفوع </label>
                            <p id="amount" class="alert alert-primary" role="alert"></p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

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
        }
    </script>
{{--    <script>--}}
{{--        const app = new Vue({--}}
{{--            el: '#app',--}}
{{--            data: {--}}
{{--                author: 'Eslam elshenawy',--}}
{{--                accounts: [],--}}
{{--                accounts_main: [],--}}
{{--                counter: 1,--}}
{{--                type_account: null,--}}
{{--                isSection1: false,--}}
{{--                account: {--}}
{{--                    parent_id: null,--}}
{{--                    code: null,--}}
{{--                    name: '',--}}
{{--                    type: null--}}
{{--                }--}}
{{--            },--}}
{{--            mounted(){--}}
{{--                this.loadAccounts();--}}
{{--            },--}}
{{--            methods: {--}}
{{--                loadAccounts(){--}}
{{--                    axios.get('/api/accounts')--}}
{{--                        .then((response) => {--}}
{{--                            this.accounts = response.data.data;--}}
{{--                        }),--}}
{{--                        axios.get('/api/accounts/main')--}}
{{--                            .then((response) => {--}}
{{--                                this.accounts_main = response.data.data;--}}
{{--                            })--}}

{{--                },--}}
{{--                addAccount(){--}}
{{--                    axios.post('/api/accounts/create', {--}}
{{--                        parent_id: this.account.parent_id,--}}
{{--                        code: this.account.code,--}}
{{--                        name: this.account.name,--}}
{{--                        type: this.account.type--}}
{{--                    })--}}
{{--                        .then((response) => {--}}
{{--                            this.loadAccounts();--}}
{{--                            alertify.success('تمت الإضافه بالنجاح');--}}
{{--                            location.reload();--}}
{{--                        })--}}
{{--                },--}}
{{--                removeAccount(value){--}}
{{--                    alert(value);--}}
{{--                    axios.post('/api/accounts/remove', {--}}
{{--                        id: value,--}}
{{--                    })--}}
{{--                        .then((response) => {--}}
{{--                            this.loadAccounts();--}}
{{--                            alertify.success('تمت الحذف بالنجاح');--}}
{{--                        })--}}
{{--                },--}}
{{--                showAddForm(){--}}
{{--                    // Show add new account form--}}
{{--                },--}}
{{--                save(){--}}
{{--                    // save new account in database and load data--}}
{{--                },--}}
{{--                commit(index, id, cell, fieldName){--}}
{{--                    let val = document.getElementById('accountsTable').rows[index].cells[cell].innerText;--}}
{{--                    axios.post('/api/accounts/update', {--}}
{{--                        id: id,--}}
{{--                        field: fieldName,--}}
{{--                        newVal: val--}}
{{--                    })--}}
{{--                        .then((response) => {--}}
{{--                            this.loadAccounts();--}}
{{--                        })--}}
{{--                },--}}
{{--                onOptionChanged(value){--}}
{{--                    // alert(value);--}}
{{--                    // this.type_account = value.type;--}}
{{--                    if(this.account.type == 'رئيسى'){--}}
{{--                        this.isSection1 = false--}}
{{--                    }else{--}}
{{--                        this.isSection1 = true--}}
{{--                    }--}}
{{--                    console.log(this.account.type == 'رئيسى',this.account.type ,this.isSection1);--}}
{{--                }--}}

{{--            }--}}
{{--        })--}}
{{--    </script>--}}
@endsection
