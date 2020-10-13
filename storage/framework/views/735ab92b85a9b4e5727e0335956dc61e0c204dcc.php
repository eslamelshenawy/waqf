<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="register register-maintaince">
        <div class="container">
            <div class="heading">
                <h2>تسجيل حساب جديد</h2>
                <span class="line"></span>
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                    سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات
                    في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدا
                </p>
            </div>
            <!-- register form -->
            <div>
                <h2>
                    جهات الصيانة
                    <span class="line"></span>
                </h2>

                <h4>المعلومات الشخصية</h4>
                
                <form method="POST" action="<?php echo e(route('agencies.registering')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">
                                اسم المستخدم
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" />
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

                        <div class="form-group col-md-6">
                            <label for="identityNumber">
                                رقم الهوية
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" maxlength="10" class="form-control <?php $__errorArgs = ['identity_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="identity_number" value="<?php echo e(old('identity_number')); ?>" />
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

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="companyName">
                                اسم الشركة
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" name="company_name"
                            class="form-control company-name <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="companyName" value="<?php echo e(old('company_name')); ?>" />
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

                        <div class="form-group col-md-6">
                            <label for="email">
                                البريد الالكتروني
                                <span class="">(<?php echo e(__('shared::commons.optional')); ?>)</span>
                            </label>
                            <input type="text" name="email" value="<?php echo e(old('email')); ?>"
                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
                            <label for="name">
                                العنوان
                                <span class="lable__start">*</span>
                            </label>
                            <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" value="<?php echo e(old('address')); ?>" />

                            <?php $__errorArgs = ['address'];
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
                                النوع
                                <span class="lable__start">*</span>
                            </label>
                            <select name="type" class="form-control" onchange="showService(this.value)">
                                <option selected disabled>اختار نوع الجهة</option>
                                <option value="person" <?php echo e(old('type') == 'person' ? 'selected' : ''); ?>>فرد</option>
                                <option value="agency" <?php echo e(old('type') == 'agency' ? 'selected' : ''); ?>>شركة</option>
                            </select>
                            <?php $__errorArgs = ['type'];
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
                                رقم الجوال
                                <span class="lable__start">*</span>
                            </label>
                            <input type="tel" name="mobile" maxlength="10" value="<?php echo e(old('mobile')); ?>"
                            class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">
                                كلمة المرور
                                <span class="lable__start">*</span>
                            </label>
                            <input type="password" name="password" value="<?php echo e(old('password')); ?>"
                             class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
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
                            <label for="name">
                                تأكيد كلمة المرور
                                <span class="lable__start">*</span>
                            </label>
                            <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password_confirmation')); ?>" name="password_confirmation" />
                        </div>
                    </div>

                    <div class="form-row">
                        <?php echo $__env->make('client::users.agencies.partials._service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('client::users.agencies.partials._services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block">
                        تسجيل
                    </button>
                </form>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripting...'); ?>
<script>
    function showService(val){
        switch(val){
            case 'person':
                document.getElementById('serviceDiv').style.display = 'block';
                document.getElementById('otherServiceDiv').style.display = 'none';
                document.getElementById('servicesDiv').style.display = 'none';
                break;
            case 'agency':
                document.getElementById('servicesDiv').style.display = 'block';
                document.getElementById('otherServicesDiv').style.display = 'block';
                document.getElementById('serviceDiv').style.display = 'none';
                break;
        }
    }

    function chooseService(currentElement){
        if(currentElement.value === 'other'){
            document.getElementById('otherServiceDiv').style.display = 'block';
            document.getElementById('otherServicesDiv').style.display = 'none';
            // document.getElementById('otherServiceInput').setAttribute('name', 'service_other');
        }else{
            document.getElementById('otherServicesDiv').style.display = 'block';
            document.getElementById('otherServiceDiv').style.display = 'none';
        }

        // if(currentElement.checked === true){
        //     document.getElementById('otherServiceDiv').style.display = 'block';
        // }else{
        //     document.getElementById('otherServiceDiv').style.display = 'none';
        // }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/users/agencies/create.blade.php ENDPATH**/ ?>