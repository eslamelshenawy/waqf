<?php $__env->startSection('content'); ?>

        <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section class="singinform">

            <div class="container">
                <?php if(isset($errors)): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h6 class="alert alert-danger"><?php echo e($error); ?></h6>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if(session()->has('failed')): ?>
                    <h6 class="alert alert-danger"><?php echo e(session()->get('failed')); ?></h6>
                <?php endif; ?>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
            </div>

            <div class="container">
                <h3 class="singinform_title">تسجيل الدخول</h3>
                <p class="singinform_parg">
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك
                </p>
                <form method="POST" action="<?php echo e(route('login')); ?>" class="singinform-form">
                    <?php echo csrf_field(); ?>

                    <div class="input-container">
                        <!-- <i class="fa fa-envelope icon"></i> -->
                        <span class="input-icon">
                            <img class="input-icon-img" src="<?php echo e(asset('img/email.png')); ?>" alt="">
                        </span>
                        <input class="input-field"
                        type="text" placeholder="<?php echo e(__('client::users.identity_number')); ?>" name="username">

                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="badge badge-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="input-container">
                        <!-- <i class="fa fa-key icon"></i> -->
                        <span class="input-icon">
                        <img class="input-icon-img" src="<?php echo e(asset('img/email.png')); ?>" alt="">
                    </span>
                        <input class="input-field" type="password" placeholder="الرقم السري" name="password">
                        <span class="input-icon">
                        <a href="#" id="show-pass">
                            <img class="input-icon-img" src="<?php echo e(asset('img/eye.png')); ?>" alt="">
                        </a>
                    </span>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="badge badge-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="btn">تسجيل الدخول</button>
                </form>
            </div>
        </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/auth/login.blade.php ENDPATH**/ ?>