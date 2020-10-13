<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="register register-tenants">
        <div class="container">
            <div class="heading">
                <h2>تسجيل حساب جديد</h2>
                <span class="line"></span>
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                    سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات
                    في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                </p>
            </div>
            <!-- register form -->
            <div>
                <h2>
                    المستفيدين
                    <span class="line-start"></span>
                </h2>

                <form method="POST" action="<?php echo e(route('beneficiaries.registering')); ?>">
                    <?php echo csrf_field(); ?>
                    <h5>المعلومات الشخصية</h5>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">
                                الاسم
                                <span class="lable__start">*</span>
                            </label>

                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" />
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <div class="form-group col-md-3">
                            <label for="identityNumber">
                                رقم الهوية
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" maxlength="10" class="form-control <?php $__errorArgs = ['identity_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="identity_number" />
                            <?php $__errorArgs = ['identity_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="city">
                                المدينة
                                <span class="lable__start">*</span>
                            </label>
                            <?php echo $__env->make('shared::lists._cities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mobile">
                                الجوال
                                <span class="lable__start">*</span></label>
                            <input type="tel" maxlength="10" placeholder="" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mobile" id="mobile" />
                            <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="badge badge-danger">
                                <?php echo e($message); ?>

                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name">
                                البريد الالكتروني
                                <span class="text-title" style="font-size: 13px;">(<?php echo e(__('shared::commons.optional')); ?>)</span>
                            </label>
                            <input type="email" placeholder="<?php echo e(__('shared::commons.optional')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" id="email"/>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="badge badge-danger">
                                <?php echo e($message); ?>

                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                    </div>



                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="name">
                                تاريخ الميلاد
                                <span class="lable__start">*</span>
                            </label>
                            <input type="date" name="birth_of_date_at"
                             class="form-control <?php $__errorArgs = ['birth_of_date_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                             <?php $__errorArgs = ['birth_of_date_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="releaseAt">
                                تاريخ الاصدار
                                <span class="lable__start">*</span>
                            </label>
                            <input type="date" name="release_at"
                             class="form-control <?php $__errorArgs = ['release_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />

                             <?php $__errorArgs = ['release_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="endAt">
                                تاريخ الانتهاء
                                <span class="lable__start">*</span>
                            </label>
                            <input type="date" name="end_at" class="form-control <?php $__errorArgs = ['end_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <?php $__errorArgs = ['end_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">
                                كلمة المرور
                                <span class="lable__start">*</span>
                            </label>
                            <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" />
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="passwordConfirmation">
                                تأكيد كلمة المرور
                                <span class="lable__start">*</span>
                            </label>
                            <input type="password" name="password_confirmation"
                             class="form-control password-confirmation" id="passwordConfirmation" />

                             <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <h5>جهة العمل</h5>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="job">
                                المهنة
                                <span class="lable__start">*</span>
                            </label>
                            <?php echo $__env->make('shared::lists._jobs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php $__errorArgs = ['job'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="name">
                                المسمى الوظيفى
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" class="form-control <?php $__errorArgs = ['job_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> job_title" name="job_title" />
                            <?php $__errorArgs = ['job_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="companyName">
                                اسم جهة العمل
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" name="company_name" id="companyName"
                             class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> company-name" />
                             <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="bankId">
                                اسم البنك
                                <span class="lable__start">*</span>
                            </label>
                            <?php echo $__env->make('shared::lists._banks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php $__errorArgs = ['bank_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bankIbanNumber">
                                رقم الايبان
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" name="bank_iban_number"
                             class="form-control bank-iban-number <?php $__errorArgs = ['bank_iban_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="bankIbanNumber" />
                             <?php $__errorArgs = ['bank_iban_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge badge-danger">
                                    <?php echo e($message); ?>

                                </span>
                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bankAccountNumber">
                                رقم الحساب البنكى
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" name="bank_account_number" id="bankAccountNumber"
                             class="form-control <?php $__errorArgs = ['bank_account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> bank-account-number" />

                            <?php $__errorArgs = ['bank_account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="badge badge-danger">
                                <?php echo e($message); ?>

                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                    </div>


                    <h5>الحالة الاجتماعية</h5>
                    <div class="form-row">
                        <?php echo $__env->make('shared::lists._martial_status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php $__errorArgs = ['martial_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="badge badge-danger">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-row" id="haveKids" style="display: none;">
                        <div class="col-md-4">
                            <label for="company-ownder-name"><?php echo e(__('client::users.have_a_kids_?')); ?></label>
                            <div class="custom-control custom-radio">
                                <input type="radio" value="1" onclick="handleKids(this.value)" class="custom-control-input is-has-kids" id="kidsYes" name="is_has_kids">
                                <label class="custom-control-label" for="kidsYes">
                                    <?php echo e(__('shared::commons.yes')); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" value="0" onclick="handleKids(this.value)" class="custom-control-input is-has-kids" id="kidsNo" name="is_has_kids">
                                <label class="custom-control-label" for="kidsNo">
                                    <?php echo e(__('shared::commons.no')); ?>

                                </label>
                                <div class="invalid-feedback">More example invalid feedback text</div>
                            </div>
                        </div>
                    </div>

                    <!-- Add kid div -->
                    <div id="kids" style="display:none;">
                    <!-- #StartKidSection -->
                        <div id="kid-0">
                            <hr>
                            <input type="hidden" value="0" name="kid_id[]">

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="kidName"><?php echo e(__('shared::commons.name')); ?></label>
                                    <input type="text" class="form-control" name="kid_name[]" autocomplete="off" id="kidName" placeholder="<?php echo e(__('shared::commons.name')); ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="kidIdentityNumber"><?php echo e(__('shared::commons.identity_number')); ?></label>
                                    <input type="text" class="form-control" name="kid_identity_number[]" autocomplete="off" id="kidIdentityNumber" placeholder="<?php echo e(__('shared::commons.identity_number')); ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="kidGender"><?php echo e(__('shared::commons.genders.gender')); ?></label>

                                    <select name="kid_gender[]" class="form-control" id="kidGender">
                                        <option value="male">
                                            <?php echo e(__("shared::commons.genders.male")); ?>

                                        </option>
                                        <option value="female">
                                            <?php echo e(__('shared::commons.genders.female')); ?>

                                        </option>
                                    </select>

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="kidBirthOfDateAt">
                                        <?php echo e(__('shared::commons.birth_of_date')); ?>

                                    </label>
                                    <input type="date" class="form-control" name="kid_birth_of_date_at[]" autocomplete="off" id="kidBirthOfDateAt" placeholder="Birth of date">
                                </div>
                            </div>

                            <hr>

                        </div>
                    </div>
                    <!-- End kid div -->





                    <div class="form_icons" id="addKidBtnDiv" style="display:none;">
                        <a href="javascript:void(0)" id="addKid">
                            <img src="<?php echo e(asset('img')); ?>/add-icon.png" alt="add icon" class="add_icon" />
                        </a>
                    </div>
                    <hr>
                    <div class="form-row">
                            <div class="form-check">
                                <input  class="form-check-input <?php $__errorArgs = ['check_agree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> check_agree" type="radio" name="check_agree" value="1">

                                <label class="form-check-label" for="check_agree">
                                    <a href="#">
                                        <?php echo e(__('shared::commons.check_agree')); ?>

                                        </a>
                                </label>
                            </div>
                        <?php $__errorArgs = ['check_agree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="badge badge-danger">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
            
                    <button type="submit" class="btn btn-lg btn-block mt-4" 
                        style="margin-top: 10px;">
                        تسجيل
                    </button>
                </form>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripting...'); ?>
<script>

    var counter = 0;

    function func(val){
        let kidsDiv = document.getElementById('haveKids');
        let addKidBtnDiv = document.getElementById('addKidBtnDiv');
        switch(val){
            case 'single':
                kidsDiv.style.display = 'none';
                addKidBtnDiv.style.display = 'none';
                break;
            
            case 'married':
                kidsDiv.style.display = 'block';
                addKidBtnDiv.style.display = 'block';
                break;
            
            case 'widower':
                kidsDiv.style.display = 'block';
                addKidBtnDiv.style.display = 'block';
                break;
            
            case 'divorcee':
                kidsDiv.style.display = 'block';
                addKidBtnDiv.style.display = 'block';
                break;

        }
    }

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

        var btnRemoveImg = document.createElement('img');
        btnRemoveImg.setAttribute('src', '<?php echo asset("img"); ?>/del-icon.png');

        var btnRemove = document.createElement('a');
        btnRemove.setAttribute('href', 'javascript:void(0)');
        btnRemove.setAttribute('id', 'removeBtn-' + counter); // del_icon
        btnRemove.setAttribute('class', 'del_icon');
        btnRemove.setAttribute('onclick', 'deleteKid('+ counter +')');
        btnRemove.appendChild(btnRemoveImg);

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
        nameLabel.innerHTML = '<?php echo __('shared::commons.name'); ?>';

        var identityLabel = document.createElement('label');
        identityLabel.innerHTML = '<?php echo __('shared::commons.identity_number'); ?>';

        var genderLabel = document.createElement('label');
        genderLabel.innerHTML = '<?php echo __('shared::commons.genders.gender'); ?>';
        var genderSelect = document.createElement('select');
        genderSelect.setAttribute('name', 'kid_gender[]');
        genderSelect.setAttribute('class', 'form-control');

        var maleOption = document.createElement('option');
        var femaleOption = document.createElement('option');
        maleOption.setAttribute('value', 'male');
        maleOption.innerHTML = '<?php echo __('shared::commons.genders.male'); ?>';

        femaleOption.setAttribute('value', 'female');
        femaleOption.innerHTML = '<?php echo __('shared::commons.genders.female'); ?>';

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
        nameInput.placeholder = '<?php echo __('shared::commons.name'); ?>';

        var identityInput = document.createElement('input');
        identityInput.setAttribute('type', 'text');
        identityInput.setAttribute('class', 'form-control');
        identityInput.setAttribute('name', 'kid_identity_number[]');
        identityInput.placeholder = '<?php echo __('shared::commons.identity_number'); ?>';

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

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/users/beneficiaries/create.blade.php ENDPATH**/ ?>