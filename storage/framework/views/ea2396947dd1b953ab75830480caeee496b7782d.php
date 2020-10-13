<?php $page = app('\App\Page'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="blog-heading">
        <div class="container">
            <div class="blog-heading__body">
                <h1><?php echo e($page->where('slug', 'terms')->first()->title); ?></h1>
                <span class="line"></span>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم
                    لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدا</p>
            </div>
        </div>
    </section>

    <section class="main-about-us">
        <div class="container">
            <?php echo $page->where('slug', 'terms')->first()->content; ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/StaticPage/Resources/views/terms_policy.blade.php ENDPATH**/ ?>