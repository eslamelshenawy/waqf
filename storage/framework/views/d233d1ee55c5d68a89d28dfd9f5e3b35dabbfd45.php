<?php $__env->startSection('content'); ?>
<section class="tenants">
    <div class="container" id="tenantContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title"><br><h4><?php echo e(__('shared::commons.new_agency')); ?></h4><br></div>

                        <hr>
                            <form class="needs-validation" novalidate method="POST" action="<?php echo e(route("Admin::agencies.store")); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label><?php echo e(__('shared::commons.type')); ?></label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="type" value="person" <?php echo e(old('type') == 'person' ? 'checked' : ''); ?>

                                class="form-check-inline float-left mr-2 mt-1 agency-type" id="person" />
                                <label class="badge badge-outline-primary p-2"><?php echo e(__('shared::users.person')); ?></label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="type" value="agency" <?php echo e(old('type') == 'agency' ? 'checked' : ''); ?>

                                class="form-check-inline float-left mr-2 mt-1 agency-type" id="agency" />
                                <label class="badge badge-outline-primary p-2"><?php echo e(__('shared::users.agency')); ?></label>
                            </div>

                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div>
                                <span class="badge badge-danger"><?php echo e($errors->first('type')); ?></span>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <hr>

                        <div class="form-row">

                            <!-- Start Name -->
                            <div class="col-md-6 mb-3">
                                <label for="nameField"> <?php echo e(__('shared::users.agency')); ?> | <?php echo e(__('shared::users.person')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="name" value="<?php echo e(old('name')); ?>" id="name" placeholder="<?php echo e(__('shared::commons.name')); ?>">
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

                            <div class="col-md-3 mb-3">
                                <label for="identityNumber"><?php echo e(__('shared::commons.identity_number')); ?></label>
                                <input type="text"  maxlength="10"
                                       class="field form-control <?php $__errorArgs = ['identity_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="identity_number"
                                       value="<?php echo e(old('identity_number')); ?>" id="identityNumber"
                                       placeholder="<?php echo e(__('shared::commons.identity_number')); ?>">
                                <?php $__errorArgs = ['identity_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div>
                                    <span class="badge badge-danger"><?php echo e($errors->first('identity_number')); ?></span>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>

                        <div class="form-row">

                            <!-- End Name -->


                            <!-- Start Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email"><?php echo e(__('shared::commons.email')); ?></label>
                                <input type="email" class="field form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="email" id="email" value="<?php echo e(old('email')); ?>"
                                       placeholder="<?php echo e(__('shared::commons.email')); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div>
                                    <span class="badge badge-danger"><?php echo e($errors->first('email')); ?></span>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <div id="invalidEmailMsg" style="display: none;">
                                    <span class="badge badge-danger">
                                        <?php echo e(__('shared::validations.email.unique')); ?>

                                    </span>
                                </div>
                            </div>
                            <!-- End Email -->

                            <!-- Start Email -->
                            <div class="col-md-3 mb-2">
                                <label for="mobile"><?php echo e(__('shared::commons.mobile_number')); ?></label>
                                <input type="text" maxlength="10" class="field form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="mobile" id="mobile" value="<?php echo e(old('mobile')); ?>"
                                       placeholder="<?php echo e(__('shared::commons.mobile_number')); ?>" required>
                                <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div>
                                    <span class="badge badge-danger"><?php echo e($errors->first('mobile')); ?></span>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <!-- End Email -->


                            <!-- Start City Number -->
                            <div class="col-md-3 mb-3">
                                <?php $city = app('\App\City'); ?>
                                <label for="identity_number"><?php echo e(__('shared::commons.city')); ?></label>
                                <select class="form-control" name="city">
                                    <?php $__currentLoopData = $city->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c->name_en); ?>" <?php echo e(old('city') == $c->name_en ? 'selected' : ''); ?>><?php echo e($c->name_ar); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['city'];
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
                            <!-- End City Number -->

                        </div>

                        <hr>


                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <label for="password"><?php echo e(__('shared::commons.password')); ?></label>
                                <input type="password" name="password"
                                       class="field form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password"
                                       placeholder="<?php echo e(__('shared::commons.password')); ?>" autocomplete="off" required>
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
                                <input type="password" name="password_confirmation"
                                       class="field form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="passwordConfirmation" placeholder="<?php echo e(__('shared::commons.password_confirmation')); ?>"
                                       autocomplete="off" required>
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

                        <hr>


                        <!-- Bank account number -->

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="bank"><?php echo e(__('shared::commons.address')); ?></label>
                                <textarea id="bank"
                                          class="form-control badge-outline-dark <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          id="address" name="address" rows="4"><?php echo e(old('address')); ?></textarea>
                                <?php $__errorArgs = ['address'];
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

                        <hr>

                            <?php echo $__env->make('admin::users.agencies.partials._services_radios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin::users.agencies.partials._services_checks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              

                        <div class="form-row">
                            <div class="col-md-6 mb-3">

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="isActive" name="is_active"
                                           value="<?php echo e(old('is_active') == 1 ? 1 : 0); ?>">
                                    <label class="custom-control-label" for="isActive">
                                        <?php echo e(__('shared::commons.active')); ?>

                                    </label>
                                </div>

                            </div>
                        </div>

                            <button type="submit" class="btn btn-raised btn-raised-primary btn-sm btn-rounded m-1 mt-3">
                                <?php echo e(__('shared::actions.create')); ?>

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

    let agencyType = document.querySelectorAll('.agency-type');
    let service = document.getElementById('serviceDiv');
    let services = document.getElementById('servicesDiv');

    agencyType.forEach(function(tagElement){
        tagElement.addEventListener('change', function(){
            if(this.value === 'person'){
                services.style.display = 'none';
                service.style.display = 'block';

            }else{
                service.style.display = 'none';
                services.style.display = 'block';
            }
        })

    });

    function chooseService(currentElement){
        if(currentElement.value === 'other'){
            document.getElementById('otherServiceDiv').style.display = 'block';
            // document.getElementById('otherServiceInput').setAttribute('name', 'service_other');
        }else{
            document.getElementById('otherServiceDiv').style.display = 'none';
        }

        // if(currentElement.checked === true){
        //     document.getElementById('otherServiceDiv').style.display = 'block';
        // }else{
        //     document.getElementById('otherServiceDiv').style.display = 'none';
        // }
    }

    function chooseServices(currentElement){
        if(currentElement.value === 'other'){
            document.getElementById('otherServicesDiv').style.display = 'block';
            // document.getElementById('otherServicesInput').setAttribute('name', 'service_other');
        }

        if(currentElement.checked === true){
            document.getElementById('otherServicesDiv').style.display = 'block';
        }else{
            document.getElementById('otherServicesDiv').style.display = 'none';
        }
    }



    // var otherServiceRadio = document.getElementById('otherServiceRadio');
    // var otherServicesCheck = document.getElementById('otherServicesCheck');
    //
    //
    // document.getElementById('otherServiceDiv').style.display = 'block';
    // document.getElementById('otherServiceInput').setAttribute('name', 'otherService');





</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styling...'); ?>
    <style>
        .form-label{
            font-size: 14px;
            font-weight: bold;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/users/agencies/create.blade.php ENDPATH**/ ?>