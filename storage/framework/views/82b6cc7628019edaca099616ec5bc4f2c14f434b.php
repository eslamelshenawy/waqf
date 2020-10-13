<?php $__env->startSection('content'); ?>
<section class="roles-and-permissions">
    <div class="container">
        <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row">

            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-3"><?php echo e(__('admin::privileges._permissions', ['something' => __('shared::actions.manage')])); ?></h4>



                        <div class="form-row mt-3 mb-3">
                            <div class="col-md-12">
                                <form method="POST" action="<?php echo e(route('Admin::syncing')); ?>">
                                    <button class="btn btn-raised btn-raised-primary shadow" type="button" onclick="syncing()">
                                        <i class="fas fa-sync-alt"></i>&nbsp;&nbsp;<?php echo e(__('admin::privileges._permissions', ['something' => __('shared::actions.sync')])); ?>

                                    </button>
                                </form>
                            </div>

                        </div>

                        <div class="table-responsive">

                            <table id="multicolumn_ordering_table" class="table table-striped table-bordered" style="width:100%">


                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?php echo e(__('admin::privileges.name')); ?></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($permissions && $permissions->count()): ?>
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e(++$key); ?></th>
                                            <td><?php echo e($permission->name); ?></td>

                                            <td>
                                                <a href="<?php echo e(route('Admin::permissions.edit', $permission->id)); ?>" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <form style="display: none;" method="POST" action="<?php echo e(route('Admin::permissions.destroy', $permission->id)); ?>" id="form-<?php echo e($permission->id); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                                <a href="JavaScript:void(0);" class="text-danger mr-2" onclick="deletePermission(<?php echo e($permission->id); ?>)">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
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


<?php $__env->startSection('scripting...'); ?>
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

        function deletePermission(permission_id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    setTimeout(function(){
                        document.getElementById(`form-${permission_id}`).submit();
                    }, 2000);

                }
            });

            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/roles_and_permissions/permissions/index.blade.php ENDPATH**/ ?>