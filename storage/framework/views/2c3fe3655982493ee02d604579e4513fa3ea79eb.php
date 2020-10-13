<?php $page = app('\App\Page'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="blog-heading">
        <div class="container">
            <div class="blog-heading__body">
                <h1><?php echo e($page->where('slug', 'about')->first()->title); ?></h1>
                <span class="line"></span>
                <p>
                    
                     <?php echo $page->where('slug', 'about')->first()->content; ?>

                    
                    
                </p>
            </div>
        </div>
    </section>

    <section class="main-about-us">
        <div class="container">
            <?php echo $page->where('slug', 'about')->first()->content; ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/StaticPage/Resources/views/about.blade.php ENDPATH**/ ?>