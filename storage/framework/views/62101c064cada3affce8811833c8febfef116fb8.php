<html>
<head>

</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">

                <div class="table-responsive">

                    <table id="multicolumn_ordering_table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo e(__('اسم المبنى')); ?></th>
                            <th scope="col"><?php echo e(__('العنوان ')); ?></th>
                            <th scope="col"><?php echo e(__('اسم المستاجر')); ?></th>
                            <th scope="col"><?php echo e(__('تاريخ الايجار')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $buildings = app('\App\Estate'); ?>
                        <?php $estateOrder = app('\App\EstateOrder'); ?>
                        <?php $tenant = app('\App\Tenant'); ?>
                        <?php if($buildings->get() && $buildings->count()): ?>
                       
                            <?php $__currentLoopData = $buildings->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $building): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php
                           $type = $building->estate_type;
                           if($building->estate_type == "apartment"){
                           $type="شقه";
                           }  if($building->estate_type == "shop"){
                           $type="شقه";
                           }  if($building->estate_type == "land"){
                           $type="شقه";
                           }
                           ?>
                                <tr>
                                    <td scope="row"><?php echo e(++$key); ?></td>
                                    <td scope="row"><?php echo e($building->name  ? $building->name    : $type); ?>

                                    <?php if($type != "building"): ?>
                                    <?php echo e($building->number); ?>

                                    <?php endif; ?>
                                    </td>
                                    <td scope="row"><?php echo e($building->district  ? $building->district  :  $building->where('id',$building->parent_id)->first()->district); ?>,<?php echo e($building->street ? :  $building->where('id',$building->parent_id)->first()->street); ?></td>
                                    <td scope="row">
                                        <?php if($building->estaterent  !=  null ): ?>
                                        <?php echo e($tenant->where('id',$building->estaterent->tenant_id)->first()->name); ?>

                                        <?php else: ?>
                                        غير مستاجر
                                        <?php endif; ?>
                                        </td>
                                    <td scope="row">
                                        <?php if($building->estaterent  !=  null ): ?>
                                        <?php echo e($estateOrder->where('tenant_id',$building->estaterent->tenant_id)->first()->rented_at); ?>

                                        <?php else: ?>
                                                                                غير مستاجر
 
                                        <?php endif; ?>
                                        </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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

<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/users/resultInformation.blade.php ENDPATH**/ ?>