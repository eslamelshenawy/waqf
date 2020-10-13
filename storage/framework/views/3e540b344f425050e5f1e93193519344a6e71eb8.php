<?php $__env->startSection('content'); ?>

    <section class="roles-and-permissions">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                        <div class="card-title"><?php echo e(__('admin::dashboard.administrators.administrator') . ' ' . __('shared::actions.new')); ?></div>
                        <form class="needs-validation" novalidate method="POST" action="<?php echo e(route('Admin::administrators.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name"><?php echo e(__('shared::commons.name')); ?></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="name" autocomplete="off" id="name"
                                           placeholder="<?php echo e(__('shared::commons.name')); ?>" required>
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
                                <div class="col-md-6 mb-3">
                                    <label for="last-name"><?php echo e(__('shared::commons.email')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="emailValidation">@</span>
                                        </div>
                                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="email" name="email" placeholder="<?php echo e(__('shared::commons.email')); ?>" autocomplete="off"
                                               aria-describedby="emailValidation" required>

                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div>
                                        <span class="badge badge-danger"><?php echo e($message); ?></span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="password"><?php echo e(__('shared::commons.password')); ?></label>
                                    <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="password" placeholder="<?php echo e(__('shared::commons.password')); ?>" autocomplete="off" required>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div>
                                            <span class="badge badge-danger"><?php echo e($message); ?></span>
                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation"><?php echo e(__('shared::commons.password_confirmation')); ?></label>
                                    <input type="password" name="password_confirmation" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="password-confirmation" placeholder="<?php echo e(__('shared::commons.password_confirmation')); ?>" autocomplete="off" required>
                                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div>
                                            <span class="badge badge-danger"><?php echo e($message); ?></span>
                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="roleId"><?php echo e(__('admin::dashboard.role') . ' ' . __('shared::commons.and') . ' ' . __('admin::dashboard.permissions.it')); ?></label>
                                    <?php $role = app('Spatie\Permission\Models\Role'); ?>
                                    <select class="form-control" id="roleId" name="role_id">
                                        <option selected disabled>
                                            <?php echo e(__('admin::dashboard._role', ['something' => __('shared::actions.select')])); ?>

                                        </option>
                                        <?php $__currentLoopData = $role->where('guard_name', 'admin')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div>
                                        <span class="badge badge-danger"><?php echo e($message); ?></span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3 mt-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1">
                                        <label class="custom-control-label" for="isActive">
                                            <?php echo e(__('shared::commons.active')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>



                            <button class="btn btn-raised btn-raised-primary btn-rounded m-1" type="submit">
                                <i class="fas fa-save"></i>&nbsp;&nbsp;<?php echo e(__('shared::actions.create')); ?>

                            </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripting...'); ?>
<script>
    document.getElementById('first-name').value = '';
    document.getElementById('last-name').value = '';
    document.getElementById('email').value = '';

    var email = document.getElementById('email');

    email.addEventListener('keyup', function(){
        console.log('Typing');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/administrators/create.blade.php ENDPATH**/ ?>