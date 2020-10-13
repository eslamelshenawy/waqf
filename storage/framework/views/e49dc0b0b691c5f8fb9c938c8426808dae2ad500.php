<?php $__env->startSection('content'); ?>
<?php echo $__env->make('shared::includes._md_', [], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="roles-and-permissions">
    <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <ul>
                <li><?php echo \Session::get('success'); ?></li>
            </ul>
        </div>
    <?php endif; ?>

    <div class="container">
        <?php echo $__env->make('accounting::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-responsive">
                <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update accountings') ||auth()->user()->can('create journals')): ?>
                    <span class="table-add float-right mb-3 mr-2">
                        <a href="<?php echo e(route('Accounting::accounts.journals.create')); ?>"type="submit" class="text-success btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm"><i
                                    class="fas fa-plus fa-2x" aria-hidden="true"></i></a>
                    </span>
                <?php endif; ?>

            <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">رقم القيد</th>
                    <th class="text-center">التاريخ</th>
                    <th class="text-center">اسم الحساب</th>
                    <th class="text-center">حركة مدينه</th>
                    <th class="text-center">حركة دائنه</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $journals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $Jou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td scope="row"><?php echo e(++$key); ?></td>
                        <td scope="row"><?php echo e($Jou->number); ?></td>
                        <td scope="row"><?php echo e($Jou->date_at); ?></td>
                        <td scope="row"><?php echo e(@$Jou->account->name); ?></td>
                        <td scope="row"><?php echo e($Jou->debit); ?></td>
                        <td scope="row"><?php echo e($Jou->credit); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts...'); ?>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('scripting...'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting/Resources/views/journals/index.blade.php ENDPATH**/ ?>