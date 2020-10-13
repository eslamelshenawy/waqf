<?php $__env->startSection('content'); ?>
    <section class="tenants">
            <div class="container" id="tenantContainer">
                <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <div class="card-title"><br><h4><?php echo e(__('admin::privileges.role_', ['something' => __('shared::actions.new')])); ?></h4><br></div>

                                <hr>
                                <form class="needs-validation" novalidate method="POST" action="<?php echo e(route('Admin::roles.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name"><?php echo e(__('admin::privileges._role', ['something' => __('admin::privileges.name')])); ?></label>
                                            <input required="required" type="text" class="field form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                                   autocomplete="off" id="roleName1" value="<?php echo e(old('role_name')); ?>" placeholder="<?php echo e(__('admin::privileges._role', ['something' => __('admin::privileges.name')])); ?>">
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

                                    <div class="form-row mt-2">
                                        <div class="col-md-12">
                                            <form method="POST" action="<?php echo e(route('Admin::syncing')); ?>">
                                                <button class="btn btn-raised btn-raised-primary shadow" type="button" onclick="syncing()">
                                                    <i class="fas fa-sync-alt"></i>&nbsp;&nbsp;<?php echo e(__('admin::privileges._permissions', ['something' => __('shared::actions.sync')])); ?>

                                                </button>
                                            </form>
                                        </div>

                                    </div>


                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <td></td>
                                                        <td scope="col">Create</td>
                                                        <td scope="col">Read</td>
                                                        <td scope="col">Update</td>
                                                        <td scope="col">Delete</td>
                                                    </tr>
                                                    <form method="POST" action="<?php echo e(route('Admin::roles.store')); ?>" name="create_role" id="createRole">
                                                        <input type="hidden" name="name" id="roleName2">
                                                    <?php $__currentLoopData = getModels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <?php echo csrf_field(); ?>
                                                            <td><?php echo e($model = str_replace('.php', '', $model)); ?></td>
                                                            <td><input type="checkbox" class="checkbox" name="create[]" value="<?php echo e($model); ?>"></td>
                                                            <td><input type="checkbox" class="checkbox" name="read[]" value="<?php echo e($model); ?>"></td>
                                                            <td><input type="checkbox" class="checkbox" name="update[]" value="<?php echo e($model); ?>"></td>
                                                            <td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo e($model); ?>"></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </form>
                                                </table>
                                            </div>
                                        </div>
                                    </div>



















                                    <button type="submit"
                                            class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3"
                                            onclick="document.querySelector('#roleName2').value = document.querySelector('#roleName1').value;  document.querySelector('#createRole').submit()"><i class="fas fa-save"></i>&nbsp;&nbsp;<?php echo e(__('shared::actions.save')); ?></button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/roles_and_permissions/roles/create.blade.php ENDPATH**/ ?>