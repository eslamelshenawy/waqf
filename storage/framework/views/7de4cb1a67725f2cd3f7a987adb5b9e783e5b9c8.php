<?php $__env->startSection('content'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-title">
                        <!--<div class="p-3">-->
                        <!--    <span>User</span>-->
                        <!--    <a class="btn btn-info" href="<?php echo e(route('Admin::beneficiaries.create')); ?>">Add New Beneficiary</a>-->
                        <!--</div>-->
                    </div>
                    <div class="card-body">
                        <?php if(session()->has('delete')): ?>
                            <h6 class="alert alert-success"><?php echo e(session()->get('delete')); ?></h6>
                        <?php endif; ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">mobile</th>
                                <th scope="col">رقم الهويه</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                     <th scope="row"><?php echo e($beneficiary->id); ?></th>
                                    <td><?php echo e($beneficiary->name); ?></td>
                                    <td><?php echo e($beneficiary->email); ?></td>
                                    <td>
                                        <?php echo e($beneficiary->mobile); ?>

                                    </td>
                                     <td>
                                        <?php echo e($beneficiary->identity_number); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/users/beneficiaries/show.blade.php ENDPATH**/ ?>