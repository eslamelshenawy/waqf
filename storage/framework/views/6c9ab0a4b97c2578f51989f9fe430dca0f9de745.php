<?php $__env->startSection('content'); ?>
    <?php $bank = app('\Modules\Accounting\Entities\Bank'); ?>

    <section class="roles-and-permissions">
        <div class="container" id="app">
            <?php echo $__env->make('accounting::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            <?php if($type == 'tenant'): ?>
                                <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __('accounting::_.tenants')); ?></h4>
                            <?php elseif($type == "agency"): ?>
                                <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __('accounting::_.agencies')); ?></h4>
                            <?php else: ?>
                                <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __('accounting::_.beneficiaries')); ?></h4>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?php echo e(__('الاسم ')); ?></th>
                                        <th scope="col"><?php echo e(__('الايميل')); ?></th>
                                        <th scope="col"><?php echo e(__('الهاتف')); ?></th>
                                        <th scope="col"><?php echo e(__('الرقم القومى')); ?></th>
                                        <th scope="col"><?php echo e(__('الرصيد')); ?></th>
                                        <th scope="col"><i class="i-Check text"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(@$data && $data->count()): ?>
                                        <?php $__currentLoopData = @$data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $box): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td scope="row"><?php echo e(++$key); ?></td>
                                                <td scope="row"><?php echo e($box->name); ?></td>
                                                <td scope="row"><?php echo e($box->email); ?></td>
                                                <td scope="row"><?php echo e($box->mobile); ?></td>
                                                <td scope="row"><?php echo e($box->identity_number); ?></td>
                                                <?php if($type == "tenant"): ?>
                                                <?php if($box->balances != null): ?>
                                                    <td scope="row"><?php echo e((($box->balances->credit)-($box->balances->debit) )< 0 ? (($box->balances->credit)-($box->balances->debit))."  "."مدين " : (($box->balances->credit)-($box->balances->debit))."  "."دائن"); ?></td>
                                                    <?php else: ?>
                                                        <td scope="row">0</td>
                                                    <?php endif; ?>
                                                <?php elseif($type == "agency"): ?>
                                                    <td scope="row"><?php echo e((($box->balances->credit)-($box->balances->debit) )< 0 ? (($box->balances->credit)-($box->balances->debit))."  "."مدين " : (($box->balances->credit)-($box->balances->debit))."  "."دائن"); ?></td>
                                                <?php else: ?>
                                                    <td scope="row"><?php echo e((($box->balances->debit)-($box->balances->credit) )< 0 ? (($box->balances->debit)-($box->balances->credit))."  "."مدين " : (($box->balances->debit)-($box->balances->credit))."  "."دائن"); ?></td>
                                                <?php endif; ?>
                                                <td scope="row">
                                                    <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('read receivables')): ?>
                                                        <?php if($type == "tenant"): ?>

                                                        <a href="<?php echo e(url('en/accounting/receivable/tenant')); ?>/<?php echo e($box->id); ?>"  class="text-success mr-2">
                                                            <i class="fa fa-eye font-weight-bold"></i>
                                                        </a>
                                                        <?php elseif($type == "agency"): ?>
                                                            <a href="<?php echo e(url('en/accounting/receivable/agency')); ?>/<?php echo e($box->id); ?>"  class="text-success mr-2">
                                                                <i class="fa fa-eye font-weight-bold"></i>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(url('en/accounting/receivable/beneficiary')); ?>/<?php echo e($box->id); ?>"  class="text-success mr-2">
                                                                <i class="fa fa-eye font-weight-bold"></i>
                                                            </a>

                                                        <?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles...'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts...'); ?>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Accounting\Resources/views/Receivables/index.blade.php ENDPATH**/ ?>