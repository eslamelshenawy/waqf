@extends('accounting::layouts.master')
@section('content')
    <section >
        <div class="container" >
            @include('accounting::layouts.partials._success')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                             <h5> كشف حساب  {{$Journal[0]->account->name}}</h5>
                            @include('accounting::accounts.partials._new')
                            <div class="table-responsive">
                                <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">البيان</th>
                                        <th class="text-center">التاريخ</th>
                                        <th class="text-center">حركة مدينه</th>
                                        <th class="text-center">حركة دائنه</th>
                                        <th class="text-center">الرصيد</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @inject('Journals', '\Modules\Accounting\Entities\Journal')
                                        @php
                                            $sumdebit=0;
                                            $sumcredit=0;
                                        @endphp
                                        @foreach($Journal as $key=> $Jou)
                                        @php
                                            $sumdebit+=$Jou->debit;
                                            $sumcredit+=$Jou->credit;
                                        @endphp
                                            <tr>
                                                <td scope="row">{{++$key}}</td>
                                                <td scope="row">{{$Jou->details}}</td>
                                                <td scope="row">{{$Jou->date_at}}</td>
                                                <td scope="row">{{$Jou->debit}}</td>
                                                <td scope="row">{{$Jou->credit}}</td>
                                                <td scope="row">{{$Journal[0]->account->typeMenu == "مدين" ? ($sumdebit - $sumcredit ): ($sumcredit - $sumdebit ) }}</td>
                                            </tr>

                                    @endforeach
                                    <tr>
                                        <td scope="row">
                                        الاجمالى
                                        </td>
                                        <td colspan="4" style="    text-align: left;padding-left: 111px;">{{$Journal[0]->account->typeMenu == "مدين" ? ($sumdebit - $sumcredit ): ($sumcredit - $sumdebit ) }} </td>
                                    </tr>
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

            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
@endsection

