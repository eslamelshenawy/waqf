<?php $Notifications = app('\App\Notification'); ?>
<?php
    $count = $Notifications->whereIn('type', ['App\Notifications\TenantNotification','App\Notifications\AdminNotification','App\Notifications\BeneficiariesNotification','App\Notifications\BeneficiariesNotification'])->where('read_at',null)->get()->count();
?>

<!-- Notificaiton -->
<div class="dropdown">
    <div class="badge-top-container" id="dropdownNotification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="badge badge-primary"><?php echo e($count); ?></span>
        <i class="i-Bell text-muted header-icon"></i>
    </div>
    <!-- Notification dropdown -->
    <div class="dropdown-menu rtl-ps-none dropdown-menu-right notification-dropdown" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">

        <?php $__currentLoopData = $Notifications->orderBy('id', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="dropdown-item d-flex">
            <div class="notification-icon">
                <i class="i-Data-Power text-success mr-1"></i>
            </div>
            <div class="notification-details flex-grow-1">
                <a class="m-0 d-flex align-items-center readNoti"  dataId="<?php echo e($notification->id); ?>">


                    <?php if($notification->read_at == null): ?>
                    <span class="badge badge-pill badge-success ml-1 mr-1 " >new</span>
                    <?php endif; ?>


                </a>
                <a class="readNoti" dataId="<?php echo e($notification->id); ?>"> <p class="text-small text-muted m-0"><?php echo e(json_decode($notification->data)->message); ?></p></a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!-- Notificaiton End -->
<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/layouts/partials/_notifications.blade.php ENDPATH**/ ?>