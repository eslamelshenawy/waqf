<?php $__env->startSection('top-navbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-content'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Welcome
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- msg container -->
    <section class="welcom-msg" style="padding: 0; padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col text-center text-white">
                    <div>
                        <i class="fas fa-check-circle fa-10x"></i>
                        <h2 style="margin-bottom: 30px;">أهلا بك فى أوقاف الفاضل</h2>
                        <span style="width: 100px;
              height: 3px; background-color: white;"></span>
                        <p>
                            تم انشاء حسابكم بنجاح و جارى المراجعة على الحساب و سيتم ابلاغك
                            فورا على التأكيد و تفعيل الحساب
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <button class="btn btn-lg btn-light mb-lg-4"
                            onclick="location.href = '/'">استمرار</button>
                    <div class="logo__footer text-center">
                        <img src='<?php echo e(asset("img/logo-footer.png")); ?>' alt="Footer" />
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styling...'); ?>
    <style>
        body {
            background: #fafafa url(<?php echo e(asset("/img/bg@2x.png")); ?>) no-repeat center;

            background-size: cover;
        }

        button.btn.btn-lg {
            display: block;
            width: 50%;
            margin: 0 auto;
        }

        span {
            display: block;
            width: 100px;
            height: 2px;
            margin: 0 auto;
            background-color: white;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/StaticPage/Resources/views/welcome.blade.php ENDPATH**/ ?>