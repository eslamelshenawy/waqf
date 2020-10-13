<?php $setting = app('\App\GenerallSetting'); ?>
<?php
        $settings=$setting->find(1);
?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <ul>
                <li><?php echo \Session::get('success'); ?></li>
            </ul>
        </div>
    <?php endif; ?>

    <section class="heading">
        <div class="container">
            <div class="heading__body old-requests">
                <h1>تواصل معنا</h1>
                <span class="line"></span>
            </div>
        </div>
    </section>

    <section class="about-us_main">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="about-us_form">
                        <h3>تواصل معنا</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="title_contact" placeholder="الاسم" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email_contact" placeholder="البريد الالكترونى" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message_contact" placeholder="الرسالة" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-lg" id="send_message">ارسال</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="about-us_phone">
                        <h3>رقم الجوال</h3>
                        <ul>
                            <li> +966
                                <?php echo e(@$settings->site_mobile); ?></li>
                            <li>+966
                                <?php echo e(@$settings->site_phone); ?></li>
                        </ul>
                    </div>
                    <div class="about-us_email">
                        <p><?php echo e(@$settings->email); ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="about-us_address">
                        <h3>العنوان</h3>
                        <p><?php echo e(@$settings->site_addresse_ar); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us_map">
        <div>
            <img class="map" src="./img/map.png" alt="">
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts...'); ?>
    <script>

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/StaticPage\Resources/views/contact.blade.php ENDPATH**/ ?>