<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions" id="admin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">


                        <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __('admin::dashboard.administrators.it')); ?></h4>


                        <div class="table-responsive">
                                <table class="display table table-striped table-bordered dataTable" id="alternative_pagination_table" style="width:100%">
                                <caption>
                                    <?php echo e($administrators->count()); ?>

                                </caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"><?php echo e(__('shared::commons.name')); ?></th>
                                            <th scope="col"><?php echo e(__('shared::commons.avatar')); ?></th>
                                            <th scope="col"><?php echo e(__('shared::commons.email')); ?></th>
                                            <th scope="col"><?php echo e(__('shared::commons.status')); ?></th>
                                            <th scope="col"><i class="i-Check text"></i> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if($administrators && $administrators->count()): ?>
                                            <?php $__currentLoopData = $administrators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $administrator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <th scope="row"><?php echo e($administrator->id); ?></th>
                                                    <td><?php echo e($administrator->name); ?></td>
                                                    <td>
                                                        <?php if( ! is_null($administrator->avatar) ): ?>
                                                            <img class="rounded-circle m-0 avatar-sm-table" src="<?php echo e($administrator->avatar_url); ?>" alt="">
                                                        <?php else: ?>
                                                            <img class="rounded-circle m-0 avatar-sm-table" src="<?php echo e(adminUrl()); ?>/images/faces/1.jpg" alt="">
                                                        <?php endif; ?>
                                                    </td>

                                                    <td><?php echo e($administrator->email); ?></td>
                                                    <td>
                                                        <form method="POST" action="<?php echo e(route('Admin::administrators.update', $administrator->id)); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>
                                                            <?php switch($administrator->is_active):
                                                                case (1): ?>
                                                                <label class="switch switch-success mr-3">
                                                                    <input type="checkbox" checked name="is_active" onchange="this.form.submit()" value="1">
                                                                    <span class="slider"></span>
                                                                </label>
                                                                    <?php break; ?>
                                                                <?php case (0): ?>
                                                                <label class="switch switch-success mr-3">
                                                                    <input type="checkbox" name="is_active" onchange="this.form.submit()" value="0">
                                                                    <span class="slider"></span>
                                                                </label>
                                                                    <?php break; ?>
                                                            <?php endswitch; ?>
                                                        </form>

                                                    </td>
                                                    <td>
                                                        <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update administrators')): ?>
                                                        <a href="<?php echo e(route('Admin::administrators.edit', $administrator->id)); ?>" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                        <?php endif; ?>



                                                        <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('delete administrators')): ?>
                                                        <form style="display: none;" method="POST" action="<?php echo e(route('Admin::administrators.destroy', $administrator->id)); ?>" id="form-<?php echo e($administrator->id); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                        </form>
                                                        <a href="JavaScript:void(0);" class="text-danger mr-2" onclick="deletePermission(<?php echo e($administrator->id); ?>)">
                                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                        </a>
                                                            <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>

                            <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('create administrators')): ?>

                                <a class="btn btn-raised btn-raised-primary btn-rounded btn-sm m-1" href="<?php echo e(route('Admin::administrators.create')); ?>">
                                    &plus; <?php echo e(__('shared::actions.add')); ?>

                                </a>
                            <?php endif; ?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/administrators/index.blade.php ENDPATH**/ ?>