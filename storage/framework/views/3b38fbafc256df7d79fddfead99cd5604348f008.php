<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container">
            <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __('shared::estates.Reservations')); ?></h4>
                            <div class="table-responsive">
                                <table id="multicolumn_ordering_table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"> <?php echo e(__('shared::commons.numorder')); ?></th>
                                        <th scope="col"><?php echo e(__('shared::commons.name')); ?></th>
                                        <th scope="col"><?php echo e(__('shared::commons.order_type')); ?></th>
                                        <th scope="col"><?php echo e(__('shared::commons.tenant')); ?></th>
                                        <th scope="col"><?php echo e(__('shared::commons.amount')); ?></th>
                                        <th scope="col"><?php echo e(__('shared::commons.status')); ?></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($reservate && $reservate->count()): ?>
                                        <?php $__currentLoopData = $reservate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td scope="row"><?php echo e(++$key); ?></td>
                                                <td scope="row"><?php echo e($res->order_number); ?></td>
                                                <td scope="row"><?php echo e($res->madeBy->name ? $res->madeBy->name  : $res->madeBy->slug); ?></td>
                                                <td scope="row"><?php echo e($res->order_type); ?></td>
                                                <td scope="row"><?php echo e($res->tenanter->name); ?></td>
                                                <td scope="row"><?php echo e($res->amount); ?></td>
                                                <td scope="row">
                                                    <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasAnyPermission(['update accountings','update estateorders'])): ?>

                                                    <form method="get" action="<?php echo e(url('en/dashboard/estates/Reservations/accept')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('get'); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($res->id); ?>" />
                                                        <input type="hidden" name="tenant_id" value="<?php echo e($res->tenanter->id); ?>" />

                                                        <?php if($res->is_accepted != 0): ?>
                                                            <label class="switch switch-success mr-3">
                                                                <input type="checkbox" <?php echo e($res->is_accepted == 1 ? "checked" :" "); ?>  name="is_accepted" onchange="this.form.submit()" value="0" >
                                                                <span class="slider"></span>
                                                            </label>
                                                            <button disabled class="btn btn-success"> تم الموافقه</button>

                                                            <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update accountings')): ?>
                                                                <a type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm" href="<?php echo e(route('Accounting::invoices.create')); ?>">
                                                                إصدار فاتوره
                                                                </a>
                                                            <?php endif; ?>

                                                            <?php else: ?>
                                                            <label class="switch switch-success mr-3">
                                                                <input type="checkbox" <?php echo e($res->is_accepted == 1 ? "checked" :" "); ?>  name="is_accepted" onchange="this.form.submit()" value="1">
                                                                <span class="slider"></span>
                                                            </label>
                                                            <button disabled class="btn btn-warning"> معلق</button>
                                                                <?php endif; ?>

                                                    </form>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
        div.dataTables_wrapper div.dataTables_filter label {
            margin-right: 292px;
        }
        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin-right: 530px;
        }
        .pagination .page-item.active .page-link {
            background-color: #663399 !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts...'); ?>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('scripting...'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/estates/Reservations/index.blade.php ENDPATH**/ ?>