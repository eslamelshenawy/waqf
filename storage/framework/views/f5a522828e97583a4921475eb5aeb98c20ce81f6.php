<?php $__env->startSection('content'); ?>
    <div class="auth-layout-wrap" style="background-image: url(<?php echo e(adminUrl()); ?>/images/photo-wide-4.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="<?php echo e(adminUrl()); ?>/images/logo.png" alt="">
                            </div>
                            <h1 class="mb-3 text-18"><?php echo e(__('client::auth.sign_in')); ?></h1>
                            <form method="POST" action="<?php echo e(route('admin.login')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php if(isset($errors)): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h6 class="alert alert-danger"><?php echo e($error); ?></h6>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(session()->has('failed')): ?>
                                    <h6 class="alert alert-danger"><?php echo e(session()->get('failed')); ?></h6>
                                <?php endif; ?>
                                <?php if(session()->has('logout')): ?>
                                    <h6 class="alert alert-success"><?php echo e(session()->get('logout')); ?></h6>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="email"><?php echo e(__('shared::commons.email')); ?></label>
                                    <input class="form-control form-control-rounded" type="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password"><?php echo e(__('shared::commons.password')); ?></label>
                                    <input class="form-control form-control-rounded" type="password" name="password">
                                </div>
                                <input type="submit" class="btn btn-rounded btn-primary btn-block mt-2"
                                       value="<?php echo e(__('client::auth.login')); ?>" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/create.blade.php ENDPATH**/ ?>