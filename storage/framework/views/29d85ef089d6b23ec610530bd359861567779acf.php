<?php $estate = app('\App\Estate'); ?>
<?php $image = app('\App\Image'); ?>
<?php $page = app('\App\Page'); ?>
<?php $str = app('\Illuminate\Support\Str'); ?>
<?php $__env->startSection('content'); ?>
    <main>
        <?php echo $__env->make('client::partials._slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('client::layouts.partials._search_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('client::partials._bio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('client::partials._services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if($estate->count()): ?>
        <?php echo $__env->make('client::partials._real_estate_last_6_ads', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo $__env->make('client::partials._video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('client::partials._space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/index.blade.php ENDPATH**/ ?>