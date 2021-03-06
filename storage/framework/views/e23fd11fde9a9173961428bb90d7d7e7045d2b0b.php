<?php $__env->startSection('content'); ?>
    <section class="tenants">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">

                        <div class="card-body">

                            <a href="<?php echo e(route('Admin::beneficiaries.index')); ?>" class="float-right">&times;</a>

                            <div class="clearfix"></div>

                            <div class="card-title"><br>
                                <h4> <?php echo e(__('shared::users.beneficiary') . ' ' . __('shared::actions.new')); ?></h4>
                                <br>
                            </div>
                            <hr>

                            <form class="needs-validation" novalidate method="POST" action="<?php echo e(route("Admin::beneficiaries.store")); ?>" autocomplete="off">
                                <?php echo csrf_field(); ?>

                                <div class="form-row">

                                    <!-- Start Name -->
                                    <div class="col-md-4 mb-4">
                                        <label for="name"><?php echo e(__('shared::commons.name')); ?></label>
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
                                    <!-- End Name -->

                                    <!-- Start Email -->
                                    <div class="col-md-3 mb-3">
                                        <label for="email"><?php echo e(__('shared::commons.email')); ?></label>
                                        <input type="email" class="field form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="email" id="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('shared::commons.email')); ?>" required>
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
                                        البريد الالكتروني لا يصلح
                                    </span>
                                        </div>
                                    </div>
                                    <!-- End Email -->

                                    <!-- Start Email -->
                                    <div class="col-md-2 mb-2">
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

                                        <div id="invalidMobileMsg" style="display: none;">
                                        <span class="badge badge-danger">
                                            رقم الجوال لا يصلح
                                        </span>
                                        </div>
                                    </div>
                                    <!-- End Email -->

                                </div>

                                <hr>

                                <div class="form-row">
                                    <!-- Start Identity Number -->
                                    <div class="col-md-6 mb-3">
                                        <label for="identity_number"><?php echo e(__('shared::commons.identity_number')); ?></label>
                                        <input type="text" maxlength="10" class="field form-control <?php $__errorArgs = ['identity_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="identity_number" value="<?php echo e(old('identity_number')); ?>"
                                               autocomplete="off" id="identityNumber" placeholder="<?php echo e(__('shared::commons.identity_number')); ?>" required>
                                        <?php $__errorArgs = ['identity_number'];
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
                                    <!-- End Identity Number -->

                                    <!-- Start Identity Number -->
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
                                    <!-- End Identity Number -->
                                </div>

                                <div class="form-row">
                                    <!-- Start birth of date -->
                                    <div class="col-md-6 mb-3">
                                        <label for="birthOfDate"><?php echo e(__('shared::commons.birth_of_date')); ?></label>
                                        <input type="date" class="field form-control <?php $__errorArgs = ['birth_of_date_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="birth_of_date_at" value="<?php echo e(old('birth_of_date_at')); ?>"
                                               autocomplete="off" id="birthOfDateAt"
                                               placeholder="<?php echo e(__('shared::commons.birth_of_date_at')); ?>" required>
                                        <?php $__errorArgs = ['birth_of_date_at'];
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
                                    <!-- End Birth of date -->

                                    <!-- Start Release date -->
                                    <div class="col-md-3 mb-3">
                                        <label for="releaseAt"><?php echo e(__('shared::commons.release_at')); ?></label>
                                        <input type="date" class="form-control <?php $__errorArgs = ['release_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="release_at" value="<?php echo e(old('release_at')); ?>"
                                               autocomplete="off" id="releaseAt"
                                               placeholder="<?php echo e(__('shared::commons.release_at')); ?>" required>
                                        <?php $__errorArgs = ['release_at'];
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
                                    <!-- End Release date -->

                                    <!-- Start end date -->
                                    <div class="col-md-3 mb-3">
                                        <label for="endDate"><?php echo e(__('shared::commons.end_date')); ?></label>
                                        <input type="date" class="field form-control <?php $__errorArgs = ['end_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="end_at" value="<?php echo e(old('end_at')); ?>" autocomplete="off" id="endAt"
                                               placeholder="<?php echo e(__('shared::commons.end_at')); ?>" required>
                                        <?php $__errorArgs = ['end_at'];
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
                                    <!-- End end date -->

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
                                        <input type="password" name="password_confirmation"
                                               class="field form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="passwordConfirmation" placeholder="<?php echo e(__('shared::commons.password_confirmation')); ?>" autocomplete="off" required>
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

                                <div class="form-row">

                                    <div class="col-md-3 mb-3">
                                        <label for="job"><?php echo e(__('shared::commons.job')); ?></label>

                                        <?php echo $__env->make('admin::lists._jobs', ['job' => old('job')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php $__errorArgs = ['job'];
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

                                    <div class="col-md-3 mb-3" id="jobTitleOtherDiv" style="display: none;">
                                        <label for="jobTitle"><?php echo e(__('shared::commons.job_title_other')); ?></label>
                                        <input type="text" value="<?php echo e(old('job_title_other')); ?>"
                                               class="field form-control <?php $__errorArgs = ['job_title_other'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="jobTitleOther" placeholder="<?php echo e(__('shared::commons.job_title_other')); ?>" autocomplete="off" required>
                                        <?php $__errorArgs = ['job_title_other'];
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
                                    <div class="col-md-3 mb-3">
                                        <label for="companyName"><?php echo e(__('shared::commons.company_name')); ?></label>
                                        <input type="text" name="company_name" value="<?php echo e(old('company_name')); ?>" id="companyName" class="form-control"
                                               placeholder="<?php echo e(__('shared::commons.company_name')); ?>" />
                                        <?php $__errorArgs = ['company_name'];
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

                                    <div class="col-md-4 mb-3">
                                        <label for="bank"><?php echo e(__('shared::commons.bank')); ?></label>
                                        <?php echo $__env->make('admin::lists._banks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php $__errorArgs = ['bank'];
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

                                    <div class="col-md-4 mb-3">
                                        <label for="bankAccountNumber"><?php echo e(__('shared::commons.bank_account_number')); ?></label>
                                        <input type="text" name="bank_account_number"
                                               class="field form-control <?php $__errorArgs = ['bank_account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               value="<?php echo e(old('bank_account_number')); ?>" id="bankAccountNumber" maxlength="14"
                                               placeholder="<?php echo e(__('shared::commons.bank_account_number')); ?>" autocomplete="off" required>
                                        <?php $__errorArgs = ['bank_account_number'];
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

                                    <div class="col-md-4 mb-3">
                                        <label for="bankIbanNumber"><?php echo e(__('shared::commons.bank_iban_number')); ?></label>
                                        <input type="text" name="bank_iban_number" maxlength="25"
                                               class="field form-control <?php $__errorArgs = ['bank_iban_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="ibanNumber" value="<?php echo e(old('bank_iban_number')); ?>"
                                               placeholder="<?php echo e(__('shared::commons.bank_iban_number')); ?>" autocomplete="off" required>
                                        <?php $__errorArgs = ['bank_iban_number'];
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
                                <input type="hidden" id="maritalStatusValue"  value ="<?php echo e(old('marital_status')); ?>"/>
                                <div class="form-row">

                                    <div class="col-md-4 mb-4">
                                        <label for="maritalStatus"><?php echo e(__('shared::commons.marital_status')); ?></label>

                                        <select class="field form-control" name="marital_status" id="maritalStatus">
                                            <option value="single" <?php echo e(old('marital_status') == 'single' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.single')); ?></option>
                                            <option value="married" <?php echo e(old('marital_status') == 'married' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.married')); ?></option>
                                            <option value="widower" <?php echo e(old('marital_status') == 'widower' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.widower')); ?></option>
                                            <option value="divorcee" <?php echo e(old('marital_status') == 'divorcee' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.divorcee')); ?></option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-row mt-2" id="haveKids" style="display: <?php echo e(old('is_has_kids') ? 'block' : 'none'); ?>;">
                                    <div class="col-md-6 mb-3">
                                        <label for="company-ownder-name"><?php echo e(__('shared::commons.do_you_have_kids')); ?></label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="1" onclick="handleKids(this.value)"
                                                       class="custom-control-input is-has-kids"
                                                       id="kidsYes" name="is_has_kids" <?php echo e(old('is_has_kids') == true ? 'checked' : ''); ?> required>
                                                <label class="custom-control-label" for="kidsYes">
                                                    <?php echo e(__('shared::commons.yes')); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="cpl-md-6">
                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" value="0" onclick="handleKids(this.value)"
                                                       class="custom-control-input is-has-kids" id="kidsNo"
                                                       name="is_has_kids" <?php echo e(old('is_has_kids') == false ? 'checked' : ''); ?> required>
                                                <label class="custom-control-label" for="kidsNo">
                                                    <?php echo e(__('shared::commons.no')); ?>

                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div id="kids" style="display: <?php echo e(old('kid_id') ? 'block' : 'none'); ?>;">
                                    <!-- #StartKidSection -->
                                    <?php if(old('kid_id')): ?>
                                    <?php for($i=0; $i<count(old('kid_id')); $i++): ?>
                                    <div id="kid-<?php echo e($i); ?>">
                                        <hr>
                                        <input type="hidden" value="<?php echo e($i); ?>" name="kid_id[]">

                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <!-- #removeBtn -->
                                                <button class="btn btn-danger btn-raised-primary btn-sm btn-rounded m-1 mt-3 float-right"
                                                        id="removeBtn-0" type="button" onclick="deleteKid(<?php echo $i; ?>)">&times;</button>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="kidName"><?php echo e(__('shared::commons.name')); ?></label>
                                                <input type="text" class="form-control" name="kid_name[]" value="<?php echo e(old('kid_name.' . $i)); ?>"
                                                       autocomplete="off" id="kidName"
                                                       placeholder="<?php echo e(__('shared::commons.kid_name')); ?>" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="kidIdentityNumber"><?php echo e(__('shared::commons.identity_number')); ?></label>
                                                <input type="text" class="form-control"
                                                       name="kid_identity_number[]" maxlength="10" value="<?php echo e(old('kid_identity_number.' . $i)); ?>"
                                                       autocomplete="off"
                                                       id="kidIdentityNumber"
                                                       placeholder="<?php echo e(__('shared::commons.kid_identity_number')); ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="kidGender"><?php echo e(__('shared::commons.gender')); ?></label>
                                                <select name="kid_gender[]" class="form-control" id="kidGender">
                                                    <option value="male" <?php echo e(old('kid_gender.' . $i) == 'male' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.male')); ?></option>
                                                    <option value="female" <?php echo e(old('kid_gender.' . $i) == 'female' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.female')); ?></option>
                                                </select>

                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="kidBirthOfDateAt"><?php echo e(__('shared::commons.birth_of_date')); ?></label>
                                                <input type="date" class="form-control" name="kid_birth_of_date_at[]"
                                                       autocomplete="off" value="<?php echo e(old('kid_birth_of_date_at.' . $i)); ?>"
                                                       id="kidBirthOfDateAt" placeholder="<?php echo e(__('shared::commons.birth_of_date')); ?>" required>
                                            </div>
                                        </div>

                                        <hr>

                                    </div>
                                    <?php endfor; ?>
                                    <?php else: ?>
                                        <div id="kid-0">
                                            <hr>
                                            <input type="hidden" value="0" name="kid_id[]">

                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <!-- #removeBtn -->
                                                    <button class="btn btn-danger btn-raised-primary btn-sm btn-rounded m-1 mt-3 float-right"
                                                            id="removeBtn-0" type="button" onclick="deleteKid(0)">&times;</button>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="kidName"><?php echo e(__('shared::commons.name')); ?></label>
                                                    <input type="text" class="form-control" name="kid_name[]" autocomplete="off" id="kidName"
                                                           placeholder="<?php echo e(__('shared::commons.kid_name')); ?>" required>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="kidIdentityNumber"><?php echo e(__('shared::commons.identity_number')); ?></label>
                                                    <input type="text" class="form-control" maxlength="10" name="kid_identity_number[]" autocomplete="off"
                                                           id="kidIdentityNumber"
                                                           placeholder="<?php echo e(__('shared::commons.kid_identity_number')); ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="kidGender"><?php echo e(__('shared::commons.gender')); ?></label>
                                                    <select name="kid_gender[]" class="form-control" id="kidGender">
                                                        <option value="male"><?php echo e(__('shared::commons.male')); ?></option>
                                                        <option value="female"><?php echo e(__('shared::commons.female')); ?></option>
                                                    </select>

                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="kidBirthOfDateAt"><?php echo e(__('shared::commons.birth_of_date')); ?></label>
                                                    <input type="date" class="form-control" name="kid_birth_of_date_at[]" autocomplete="off"
                                                           id="kidBirthOfDateAt" placeholder="<?php echo e(__('shared::commons.birth_of_date')); ?>" required>
                                                </div>
                                            </div>

                                            <hr>

                                        </div>
                                    <?php endif; ?>

                                </div>
                                <!-- #EndKidSection -->

                                <button type="button" class="btn btn-raised btn-raised-primary btn-sm btn-rounded m-1 mt-3" id="addKid" style="display: none;">&plus;</button>
                                <hr>
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
$(document).ready(function () {
             var martialStatusElement = $('#maritalStatusValue').val();
            //  alert(martialStatusElement);
        var haveKidsElement = document.getElementById('haveKids');
        var isHasKids = false;
        var maritalStatus = '<?php echo __('shared::commons.single'); ?>';


            if(martialStatusElement === 'single'){
                haveKidsElement.style.display = 'none';
                document.getElementById('kids').style.display = 'none';
                document.getElementById('addKid').style.display = 'none';
            }
            else if(martialStatusElement === 'married'){
                haveKidsElement.style.display = 'block';

            }else if(martialStatusElement === 'widower'){
                haveKidsElement.style.display = 'block';
            }else if(martialStatusElement === 'divorcee'){
                haveKidsElement.style.display = 'block';
            }
        
     
 });
        let job = document.getElementById('job');
        let jobTitleOtherDiv = document.getElementById('jobTitleOtherDiv');
        let jobTitleOtherInput = document.getElementById('jobTitleOther');

        job.addEventListener('change', function () {
            let currentValue = String(this.value).trim();
            if(currentValue === 'other'){
                window.jobTitleOtherDiv.style.display = 'block';
                jobTitleOtherInput.setAttribute('name', 'job_title_other');
            }else{
                window.jobTitleOtherDiv.style.display = 'none';
                jobTitleOtherInput.removeAttribute('name');
            }
        });

        Utils.validateEmail();
        Utils.validateMobile();

        var counter = 0;

        var deleteKid = function(nodeNo){
            document.getElementById('removeBtn-' + nodeNo).addEventListener('click', function(e){
                var kidNode = document.getElementById('kid-' + nodeNo);
                kidNode.remove();
                counter -= 1;
            });
        };

        var handleKids = function(val){
            if(val === '1'){
                document.getElementById('kids').style.display = 'block';
                document.getElementById('addKid').style.display = 'block';
            }

            if(val === '0'){
                document.getElementById('kids').style.display = 'none';
                document.getElementById('addKid').style.display = 'none';
            }
        };

        document.getElementById('name').focus();
        document.getElementById('email').value = '';

        var martialStatusElement = document.getElementById('maritalStatus');
        var haveKidsElement = document.getElementById('haveKids');
        var isHasKids = false;
        var maritalStatus = '<?php echo __('shared::commons.single'); ?>';

        martialStatusElement.addEventListener('change', function(){
            maritalStatus = this.value;

            if(maritalStatus === 'single'){
                haveKidsElement.style.display = 'none';
                document.getElementById('kids').style.display = 'none';
            }
            else if(maritalStatus === 'married'){
                haveKidsElement.style.display = 'block';

            }else if(maritalStatus === 'widower'){
                haveKidsElement.style.display = 'block';
            }else if(maritalStatus === 'divorcee'){
                haveKidsElement.style.display = 'block';
            }
        });

        document.getElementById('addKid').addEventListener('click', function(e){
            counter += 1;
            var kidsDiv = document.getElementById('kids');
            var mainDiv = document.createElement('div');
            mainDiv.setAttribute('id', 'kid-' + counter);
            var kidId = document.createElement('input');
            kidId.setAttribute('type', 'hidden');
            kidId.setAttribute('name', 'kid_id[]');
            kidId.value = counter;
            mainDiv.appendChild(kidId);

            var topColumn = document.createElement('div');
            topColumn.setAttribute('class', 'form-row');
            var topColumnCell = document.createElement('div');
            topColumnCell.setAttribute('class', 'col-md-12 mb-3');
            topColumn.appendChild(topColumnCell);
            mainDiv.appendChild(topColumn);

            var btnRemove = document.createElement('button');
            btnRemove.setAttribute('type', 'button');
            btnRemove.setAttribute('class', 'btn btn-danger btn-raised-primary btn-sm  btn-rounded m-1 mt-3 float-right');
            btnRemove.setAttribute('id', 'removeBtn-' + counter);
            btnRemove.setAttribute('onclick', 'deleteKid('+ counter +')');

            btnRemove.innerHTML = '&times;';

            topColumnCell.appendChild(btnRemove);

            var firstColumn = document.createElement('div');
            firstColumn.setAttribute('class', 'form-row');

            var firstColumnFirstInput = document.createElement('div');
            firstColumnFirstInput.setAttribute('class', 'col-md-6 mb-3');

            var firstColumnSecondInput = document.createElement('div');
            firstColumnSecondInput.setAttribute('class', 'col-md-6 mb-3');

            var secondColumn = document.createElement('div');
            secondColumn.setAttribute('class', 'form-row');

            var secondColumnFirstInput = document.createElement('div');
            secondColumnFirstInput.setAttribute('class', 'col-md-6 mb-3');

            var secondColumnSecondInput = document.createElement('div');
            secondColumnSecondInput.setAttribute('class', 'col-md-6 mb-3');

            var nameLabel = document.createElement('label');
            nameLabel.innerHTML = '<?php echo __('shared::commons.kid_name'); ?>';

            var identityLabel = document.createElement('label');
            identityLabel.innerHTML = '<?php echo __('shared::commons.kid_identity_number'); ?>';

            var genderLabel = document.createElement('label');
            genderLabel.innerHTML = '<?php echo __('shared::commons.gender'); ?>';
            var genderSelect = document.createElement('select');
            genderSelect.setAttribute('name', 'kid_gender[]');
            genderSelect.setAttribute('class', 'form-control');

            var maleOption = document.createElement('option');
            var femaleOption = document.createElement('option');
            maleOption.setAttribute('value', 'male');
            maleOption.innerHTML = '<?php echo __('shared::commons.male'); ?>';

            femaleOption.setAttribute('value', 'female');
            femaleOption.innerHTML = '<?php echo __('shared::commons.female'); ?>';

            genderSelect.appendChild(maleOption);
            genderSelect.appendChild(femaleOption);

            var birthOfDateLabel = document.createElement('label');
            birthOfDateLabel.innerHTML = '<?php echo __('shared::commons.birth_of_date'); ?>';
            var birthOfDateInput = document.createElement('input');
            birthOfDateInput.setAttribute('type', 'date');
            birthOfDateInput.setAttribute('class', 'form-control');
            birthOfDateInput.setAttribute('name', 'kid_birth_of_date_at[]');

            secondColumnFirstInput.appendChild(genderLabel);
            secondColumnFirstInput.appendChild(genderSelect);

            secondColumnSecondInput.appendChild(birthOfDateLabel);
            secondColumnSecondInput.appendChild(birthOfDateInput);

            var nameInput = document.createElement('input');
            nameInput.setAttribute('type', 'text');
            nameInput.setAttribute('class', 'form-control');
            nameInput.setAttribute('name', 'kid_name[]');
            nameInput.placeholder = '<?php echo __('shared::commons.kid_name'); ?>';

            var identityInput = document.createElement('input');
            identityInput.setAttribute('type', 'text');
            identityInput.setAttribute('class', 'form-control');
            identityInput.setAttribute('name', 'kid_identity_number[]');
            identityInput.setAttribute('maxlength', '10');
            identityInput.placeholder = '<?php echo __('shared::commons.kid_identity_number'); ?>';

            var line = document.createElement('hr');

            // col-md-12 mb-3 //

            firstColumnFirstInput.appendChild(nameLabel);
            firstColumnFirstInput.appendChild(nameInput);

            firstColumnSecondInput.appendChild(identityLabel);
            firstColumnSecondInput.appendChild(identityInput);

            firstColumn.appendChild(firstColumnFirstInput);
            firstColumn.appendChild(firstColumnSecondInput);
            secondColumn.appendChild(secondColumnFirstInput);
            secondColumn.appendChild(secondColumnSecondInput);
            mainDiv.appendChild(firstColumn);
            mainDiv.appendChild(secondColumn);
            mainDiv.appendChild(line);
            kidsDiv.appendChild(mainDiv);

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/users/beneficiaries/create.blade.php ENDPATH**/ ?>