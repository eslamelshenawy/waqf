<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="singinform">
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <div class="container">
            <h3 class="singinform_title">رمز تأكيد الدخول</h3>
            <p class="singinform_parg">
                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في
                الصفحة التي يقرأها. ولذلك
            </p>
            <form method="POST" action="<?php echo e(route('checkCode')); ?>" class="singinform-form w-50 m-auto">
                <?php echo csrf_field(); ?>

                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php echo e($errors->first()); ?>

                </div>
                <?php endif; ?>

                <div class="clearfix"></div>

                <div class="input-container">
                    <!-- <i class="fa fa-envelope icon"></i> -->
                    <span class="input-icon">
                            <img class="input-icon-img" src="img/email.png" alt="" />
                        </span>
                    <input class="input-field" type="text" maxlength="4" placeholder="اكتب الكود هنا" name="code" />
                </div>

                <button type="submit" class="btn">تأكيد</button>
            </form>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/auth/code.blade.php ENDPATH**/ ?>