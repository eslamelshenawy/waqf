<?php $__env->startSection('content'); ?>
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <section class="roles-and-permissions">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3"><?php echo e(__('admin::dashboard.inner.editnewuser')); ?></div>
                                <?php if(isset($errors)): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h6 class="alert alert-danger"><?php echo e($error); ?></h6>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(session()->has('success-edit')): ?>
                                    <h6 class="alert alert-success"><?php echo e(session()->get('success-edit')); ?></h6>
                                <?php endif; ?>
                                <form action="<?php echo e(route('Admin::administrators.update', $admin->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="username"><?php echo e(__('admin::dashboard.inner.username')); ?></label>
                                            <input type="text" id="username" name="username" class="form-control form-control-rounded"  placeholder="Enter username" value="<?php echo e($admin->username); ?>">
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="email"><?php echo e(__('admin::dashboard.inner.email')); ?></label>
                                            <input type="email" id="email" name="email" class="form-control form-control-rounded" placeholder="Enter Email" value="<?php echo e($admin->email); ?>">
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="password"><?php echo e(__('admin::dashboard.inner.password')); ?></label>
                                            <input type="password" id="password" name="password"  class="form-control form-control-rounded" placeholder="Enter password">
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="roles"><?php echo e(__('admin::dashboard.inner.roles')); ?></label>
                                            <select class="form-control form-control-rounded" id="roles" name="role_id">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->id); ?>" <?php echo e($admin['roles'][0]->id ==$role->id ? "selected": ""); ?>><?php echo e($role->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <input  type="submit" class="btn btn-primary" value="Submit" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/administrators/edit.blade.php ENDPATH**/ ?>