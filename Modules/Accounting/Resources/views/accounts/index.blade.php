@extends('accounting::layouts.master')
@section('content')
    <section >
        <div class="container" >
            @include('accounting::layouts.partials._success')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">


                            @include('accounting::accounts.partials._new')

                            <div class="table-responsive">
                                <!--@if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('create accountings') ||auth()->user()->can('create accounts'))-->
                                <!--    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success" id="addBtn" data-toggle="modal" data-target="#modalSubscriptionForm"><i-->
                                <!--                    class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>-->
                                <!--@endif-->

                                <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Parent</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">TypeMenu</th>
                                        <th class="text-center">Balance</th>
                                        <th class="text-center"><i class="fas fa-times"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($accounts && $accounts->count())
                                        @foreach($accounts as $key => $account)
                                            @php
                                            if($account->parent_id != null ){
                                               $namAccount= @$account->account->name;
                                            }
                                            @endphp
                                            <tr>
{{--                                                <td scope="row">{{ ++$key }}</td>--}}
                                                <td scope="row">{{ $account->id }}</td>
                                                <td scope="row">{{ $account->code }}</td>
                                                <td scope="row">{{ @$namAccount }}</td>
                                                <td scope="row">{{ $account->name }}</td>
                                                <td scope="row">{{ $account->type }}</td>
                                                <td scope="row">{{ $account->typeMenu }}</td>
                                                <td scope="row">{{ $account->typeMenu == "دائنه" ? $account->creditFirst - $account->debitFrist : $account->debitFrist - $account->creditFirst }}</td>
                                                <td scope="row">
                                                    @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update accountings')||auth()->user()->can('update accounts'))
                                                        <a href="{{ url('en/accounting/accounts/edit', $account->id)}}" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                    @endif
                                                    @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('delete accountings') ||auth()->user()->can('delete accounts'))

                                                        <form style="display: none;" method="POST" action="{{url('api/accounts/remove', $account->id) }}" id="form-{{ $account->id }}">
                                                            @csrf
                                                            @method('post')
                                                            <input type="hidden" name="id" value="{{ $account->id }}" />

                                                        </form>
                                                        <a href="JavaScript:void(0);" class="text-danger mr-2"
                                                           onclick="deleteEstate({!! $account->id !!})">
                                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
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
            alertify.error("لم يتم انشاء حساب جديد ");
            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
@endsection

{{--@push('scripts...')--}}

{{--    --}}{{--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}

{{--    <!-- Compiled and minified JavaScript -->--}}

{{--@endpush--}}

{{--@section('styling...')--}}
{{--    <style>--}}
{{--        .pt-3-half {--}}
{{--            padding-top: 1.4rem;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endsection--}}

{{--@section('scripting...')--}}
{{--    --}}{{--  Start of Vue  --}}

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
{{--            mounted() {--}}
{{--                this.loadAccounts();--}}
{{--            },--}}
{{--            methods: {--}}
{{--                loadAccounts() {--}}
{{--                    axios.get('/api/accounts')--}}
{{--                        .then((response) => {--}}
{{--                            this.accounts = response.data.data;--}}
{{--                        }),--}}
{{--                        axios.get('/api/accounts/main')--}}
{{--                            .then((response) => {--}}
{{--                                this.accounts_main = response.data.data;--}}
{{--                            })--}}

{{--                },--}}
{{--                addAccount() {--}}
{{--                    axios.post('/api/accounts/create', {--}}
{{--                        parent_id: this.account.parent_id,--}}
{{--                        code: this.account.code,--}}
{{--                        name: this.account.name,--}}
{{--                        type: this.account.type--}}
{{--                    })--}}
{{--                        .then((response) => {--}}
{{--                            this.loadAccounts();--}}
{{--                            alertify.success('تمت الإضافه بالنجاح');--}}
{{--                            // location.reload();--}}
{{--                        })--}}
{{--                },--}}
{{--                removeAccount(value) {--}}
{{--                    // alert(value);--}}
{{--                    axios.post('/api/accounts/remove', {--}}
{{--                        id: value,--}}
{{--                    })--}}
{{--                        .then((response) => {--}}
{{--                            this.loadAccounts();--}}
{{--                            alertify.success('تمت الحذف بالنجاح');--}}
{{--                        })--}}
{{--                },--}}
{{--                showAddForm() {--}}
{{--                    // Show add new account form--}}
{{--                },--}}
{{--                save() {--}}
{{--                    // save new account in database and load data--}}
{{--                },--}}
{{--                commit(index, id, cell, fieldName) {--}}
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
{{--                onOptionChanged(value) {--}}
{{--                    // alert(value);--}}
{{--                    // this.type_account = value.type;--}}
{{--                    if (this.account.type == 'رئيسى') {--}}
{{--                        this.isSection1 = false--}}
{{--                    } else {--}}
{{--                        this.isSection1 = true--}}
{{--                    }--}}
{{--                    console.log(this.account.type == 'رئيسى', this.account.type, this.isSection1);--}}
{{--                }--}}

{{--            }--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}
