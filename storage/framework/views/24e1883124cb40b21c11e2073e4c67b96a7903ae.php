<section class="breadcrumbs">
    <div class="container">
        <ul class="breadcrumbs_ulists">
            <li class="breadcrumbs_list">
                <a href="<?php echo e(url('/')); ?>">الرئيسية</a>
            </li>

            <?php if(session()->has('previous')): ?>
            <li class="breadcrumbs_list">
                <a href="<?php echo e(@session()->has('previous') ? @session()->get('previous')['url'] : '#'); ?>"><?php echo e(@session()->has('previous') ? @session()->get('previous')['name'] : ''); ?></a>
            </li>
            <?php endif; ?>






        </ul>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/layouts/partials/_breadcrumb_3d.blade.php ENDPATH**/ ?>