<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="latest__estate__ads">
        <div class="tit">
            <h2>جميع الإشعارات</h2>
        </div>
        <?php
            if(Auth::guard('web')->check())
           {
               $count = Auth::guard('web')->user()->unreadNotifications->where('type', 'App\Notifications\TenantNotification')->count();
              $notifications = Auth::guard('web')->user()->unreadNotifications;
           }
           elseif(Auth::guard('admin')->check())
           {
              $count = Auth::guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\BeneficiariesNotification')->count();
              $notifications = Auth::guard('admin')->user()->unreadNotifications;
           }
           elseif(Auth::guard('beneficiary')->check())
           {
              $count = Auth::guard('beneficiary')->user()->unreadNotifications->where('type', 'App\Notifications\BeneficiariesNotification')->count();
              $notifications = Auth::guard('beneficiary')->user()->unreadNotifications;
           }
           elseif(Auth::guard('agency')->check())
           {
               $count = Auth::guard('agency')->user()->unreadNotifications->where('type', 'App\Notifications\BeneficiariesNotification')->count();
              $notifications = Auth::guard('agency')->user()->unreadNotifications;
           }
        ?>
        <div class="container">
            <div class="row">
                <ul>
                    <?php if(!$notifications->isEmpty()): ?>

                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="#">
                                <i class="far fa-check-circle"></i>

                                <span>
                               <?php echo e($notification->data['message']); ?>

                        </span>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        لا توجد اشعارات
                    <?php endif; ?>

                </ul>
            </div>

        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/allNotification.blade.php ENDPATH**/ ?>