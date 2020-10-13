<?php $__env->startSection('content'); ?>
<section class="tenants">
    <div class="container" id="tenantContainer">

        <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="card-title"><br><h4><?php echo e(__('admin::privileges._the_permission', ['something' => __('shared::actions.edit')])); ?></h4><br></div>
                        <hr>
                        <form class="needs-validation" novalidate method="POST" action="<?php echo e(route('Admin::permissions.update', $permission->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">
                                        <?php echo e(__('admin::privileges._the_permission', ['something' => __('admin::privileges.name')])); ?>

                                    </label>
                                    <input type="text" class="field form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="name" autocomplete="off" id="name" value="<?php echo e(old('name', $permission->name)); ?>"
                                           placeholder="<?php echo e(__('admin::privileges._the_permission', ['something' => __('admin::privileges.name')])); ?>" required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div>
                                        <span class="badge badge-danger"><?php echo e($errors->first('name')); ?></span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm">
                                <?php echo e(__('shared::actions.update')); ?>

                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/roles_and_permissions/permissions/edit.blade.php ENDPATH**/ ?>