<?php $__env->startSection('content'); ?>
    <?php $bank = app('\Modules\Accounting\Entities\Bank'); ?>

    <section class="roles-and-permissions">
    <div class="container">
        <?php echo $__env->make('accounting::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <?php if($type == 'expenses'): ?>
                        <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __('accounting::_.reports_expenses')); ?></h4>
                        <?php else: ?>
                            <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __('accounting::_.reports_received')); ?></h4>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?php echo e(__('رقم السند')); ?></th>
                                    <th scope="col"><?php echo e(__('اسم الحساب')); ?></th>
                                    <th scope="col"><?php echo e(__('نوع الدفع')); ?></th>
                                    <th scope="col"><?php echo e(__('تاريخ الانشاء')); ?></th>
                                    <th scope="col"><?php echo e(__('المبلغ المدفوع')); ?></th>
                                    <th scope="col"><i class="i-Check text"></i> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($Voucher && $Voucher->count()): ?>
                                    <?php $__currentLoopData = $Voucher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $box): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td scope="row"><?php echo e(++$key); ?></td>
                                            <td scope="row"><?php echo e($box->number); ?></td>
                                            <td scope="row"><?php echo e($box->account->name); ?></td>
                                            <td scope="row"><?php echo e($box->paymentable_type == "Fund" ? "صندوق ": " بنك"); ?></td>
                                            <td scope="row"><?php echo e($box->created_at); ?></td>
                                            <td scope="row"><?php echo e($box->paid_amount); ?></td>
                                            <td scope="row">
                                                <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('read reports')): ?>
                                                    <!-- Button trigger modal -->




                                                        <a data-toggle="modal" data-target="#exampleModal" id="details_voucher" data_id="<?php echo e($box->id); ?>" class="text-success mr-2">
                                                        <i class="fa fa-eye font-weight-bold"></i>
                                                    </a>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles...'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('styling...'); ?>
<style>
    .page-item.active .page-link {
        background-color: #639;
        border-color: #639;
    }
</style>
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






















































































<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Accounting\Resources/views/reports/index.blade.php ENDPATH**/ ?>