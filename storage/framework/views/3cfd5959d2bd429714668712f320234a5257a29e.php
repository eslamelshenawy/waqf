<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container">
            <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php if(\Session::has('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <li><?php echo \Session::get('errors'); ?></li>
        </ul>
    </div>
<?php endif; ?>
            <div class="row">

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __('shared::users.the_beneficiaries')); ?></h4>
                            
                            


                            <div class="table-responsive">

                                <table id="multicolumn_ordering_table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?php echo e(__('shared::commons.name')); ?></th>
                                        <th scope="col"><?php echo e(__('shared::commons.status')); ?></th>
                                        <th scope="col"><i class="i-Check text"></i> </th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($beneficiaries && $beneficiaries->count()): ?>
                                        <?php $__currentLoopData = $beneficiaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $beneficiary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td scope="row"><?php echo e(++$key); ?></td>
                                                <td scope="row"><?php echo e($beneficiary->name); ?></td>
                                                <td scope="row"><?php echo e($beneficiary->status); ?></td>

                                                <td scope="row">
                                                    <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('update beneficiaries')): ?>
                                                    <a href="<?php echo e(route('Admin::beneficiaries.edit', $beneficiary->id)); ?>" class="text-success mr-2">
                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                    </a>
                                                    <?php endif; ?>
                                                      <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('show tenants')): ?>

                                                    <a href="<?php echo e(route('Admin::beneficiaries.show', $beneficiary->id)); ?>" class="text-success mr-2">
                                                        <i class="fa fa-eye font-weight-bold"></i>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('delete beneficiaries')): ?>

                                                    <form style="display: none;" method="POST" action="<?php echo e(route('Admin::beneficiaries.destroy', $beneficiary->id)); ?>" id="form-<?php echo e($beneficiary->id); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                    </form>
                                                    <a href="JavaScript:void(0);" class="text-danger mr-2"
                                                       onclick="deleteBeneficiary(<?php echo $beneficiary->id; ?>)">
                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                    </a>
                                                    <?php endif; ?>
                                                </td>

                                                <td scope="row">
                                                    <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('update beneficiaries')): ?>
                                                    <form method="POST" action="<?php echo e(route('Admin::control')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <input type="hidden" name="model" value="App\Beneficiary" />
                                                        <input type="hidden" name="id" value="<?php echo e($beneficiary->id); ?>" />
                                                    <?php switch($beneficiary->is_active):
                                                        case (true): ?>
                                                        <label class="switch switch-success mr-3">
                                                            <input type="checkbox" checked name="is_active" onchange="this.form.submit()" value="0">
                                                            <span class="slider"></span>
                                                        </label>
                                                        <?php break; ?>
                                                        <?php case (false): ?>
                                                        <label class="switch switch-success mr-3">
                                                            <input type="checkbox" name="is_active" onchange="this.form.submit()" value="1">
                                                            <span class="slider"></span>
                                                        </label>
                                                        <?php break; ?>
                                                    <?php endswitch; ?>
                                                    </form>
                                                    <?php endif; ?>

                                                </td>
                                            </tr>


                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('create beneficiaries')): ?>

                                <a type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm" href="<?php echo e(route('Admin::beneficiaries.create')); ?>">&plus; <?php echo e(__('shared::actions.new')); ?></a>
                                <?php endif; ?>
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




        function deleteBeneficiary(beneficiary_id){
            Swal.fire({
                title: 'هل انت متاكد من الالغاء',
                text: "لن تتمكن من التراجع عن هذا",
                icon: 'تحذير',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'تم الالغاء',
                        'تم الغاء المستفيد',
                        'نجاح'
                    );
                    setTimeout(function(){
                        document.getElementById(`form-${beneficiary_id}`).submit();
                    }, 2000);

                }
            });

            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/users/beneficiaries/index.blade.php ENDPATH**/ ?>