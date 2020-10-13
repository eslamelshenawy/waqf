<html>
<head>

</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
{{--                <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('shared::estates.buildings') }}</h4>--}}
                <div class="table-responsive">

                    <table id="multicolumn_ordering_table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('اسم المبنى') }}</th>
                            <th scope="col">{{ __('العنوان ') }}</th>
                            <th scope="col">{{ __('اسم المستاجر') }}</th>
                            <th scope="col">{{ __('تاريخ الايجار') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @inject('buildings', '\App\Estate')
                        @inject('estateOrder', '\App\EstateOrder')
                        @inject('tenant', '\App\Tenant')
                        @if($buildings->get() && $buildings->count())
                       
                            @foreach($buildings->get() as $key => $building)
                           @php
                           $type = $building->estate_type;
                           if($building->estate_type == "apartment"){
                           $type="شقه";
                           }  if($building->estate_type == "shop"){
                           $type="شقه";
                           }  if($building->estate_type == "land"){
                           $type="شقه";
                           }
                           @endphp
                                <tr>
                                    <td scope="row">{{ ++$key }}</td>
                                    <td scope="row">{{ $building->name  ? $building->name    : $type  }}
                                    @if($type != "building")
                                    {{$building->number}}
                                    @endif
                                    </td>
                                    <td scope="row">{{ $building->district  ? $building->district  :  $building->where('id',$building->parent_id)->first()->district  }},{{ $building->street ? :  $building->where('id',$building->parent_id)->first()->street  }}</td>
                                    <td scope="row">
                                        @if($building->estaterent  !=  null )
                                        {{  $tenant->where('id',$building->estaterent->tenant_id)->first()->name }}
                                        @else
                                        غير مستاجر
                                        @endif
                                        </td>
                                    <td scope="row">
                                        @if($building->estaterent  !=  null )
                                        {{  $estateOrder->where('tenant_id',$building->estaterent->tenant_id)->first()->rented_at }}
                                        @else
                                                                                غير مستاجر
 
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
<script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
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
</body>
</html>

