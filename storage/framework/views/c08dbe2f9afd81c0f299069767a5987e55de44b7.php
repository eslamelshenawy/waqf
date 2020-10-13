<div class="log__-__in">
    <li class="userlog log__in">
        <a href="#">
            <img src="<?php echo e(asset('img/about1.png')); ?>" alt="user pic">
            <i class="fas fa-caret-down"></i> <?php if(Auth::guard('agency')->check()): ?><?php echo e(__('client::commons.maintenance_center')); ?><?php endif; ?>
        </a>
        <div class="user_dropdown">
            <ul>
                <li>
                    <?php if(auth()->guard('web')->check()): ?>
                        <a href="<?php echo e(route('maintenance.old')); ?>">
                            <i class="fas fa-history"></i>
                            الطلبات السابقة
                        </a>
                    <?php elseif(auth()->guard('beneficiary')->check()): ?>
                        <a href="<?php echo e(url('advance')); ?>">
                            <i class="fas fa-history"></i>
                            السلف
                        </a>
                    <?php elseif(auth()->guard('agency')->check()): ?>
                        <a href="<?php echo e(route('agency.orders')); ?>">
                            <i class="fas fa-history"></i>
                            الطلبات السابقة
                        </a>
                    <?php endif; ?>

                </li>
                <?php if(auth()->guard('beneficiary')->check()): ?>
                    <li>
                        <a href="<?php echo e(url('statement_account')); ?>">
                            <i class="fas fa-money-bill"></i>
                            كشف الحساب
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->guard('beneficiary')->check()): ?>
                    <li>
                        <a href="<?php echo e(url('balance')); ?>">
                            <i class="fas fa-money-bill"></i>
                            الميزانيه
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->guard('beneficiary')->check()): ?>
                    <li>
                        <a href="<?php echo e(url('information')); ?>">
                            <i class="fas fa-money-bill"></i>
                            معلومات المبانى والايجارات
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(route('Client::setting')); ?>">
                        <i class="fas fa-cog"></i>
                        الاعدادات
                    </a>
                </li>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" id="logoutForm">
                        <?php echo csrf_field(); ?>
                        <a onclick="logout()" href="#">
                            <i class="fas fa-sign-in-alt"></i>
                            الخروج
                        </a>
                    </form>

                </li>
            </ul>
        </div>
    </li>


    <?php
        if(Auth::guard('web')->check())
       {
           $count = Auth::guard('web')->user()->unreadNotifications->where('type', 'App\Notifications\TenantNotification')->count();
          $notifications = Auth::guard('web')->user()->Notifications;
       }
       elseif(Auth::guard('admin')->check())
       {
          $count = Auth::guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\AdminNotification')->count();
          $notifications = Auth::guard('admin')->user()->Notifications;
       }
       elseif(Auth::guard('beneficiary')->check())
       {
          $count = Auth::guard('beneficiary')->user()->unreadNotifications->where('type', 'App\Notifications\BeneficiariesNotification')->count();
          $notifications = Auth::guard('beneficiary')->user()->Notifications;
       }
       elseif(Auth::guard('agency')->check())
       {
           $count = Auth::guard('agency')->user()->unreadNotifications->where('type', 'App\Notifications\AgencyNotification')->count();
          $notifications = Auth::guard('agency')->user()->Notifications;
       }
    ?>
    <li class="notification__log log__in">
        <a href="#">
            <img src="<?php echo e(asset('img/bell.png')); ?>" alt="notifications">
            <span class="new_notifications">
  <span><?php echo e($count); ?></span>
</span>
        </a>
        <div class="notifications_dropdown">
            <?php if(!$notifications->isEmpty()): ?>

            <ul>

                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style=" <?php echo e($notification->read_at == null ? 'width: -webkit-fill-available;' : ""); ?>">
                        <a href="#" class="readNoti" dataId="<?php echo e($notification->id); ?>" style="<?php echo e($notification->read_at == null ? 'background: #741b40;color: #fff;' : ''); ?> ">
                            <i class="far fa-check-circle"></i>
                            <span>
                               <?php echo e($notification->data['message']); ?>

                        </span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </ul>
            <div class="see-more">
                <a href="<?php echo e(url('allNotification')); ?>">مشاهدة الكل</a>
            </div>
            <?php else: ?>
                <ul>

                        <li>
                            <a href="#">
                                <i class="far fa-check-circle"></i>

                                <span>
                               لا توجد اشعارات
                        </span>
                            </a>
                        </li>


                </ul>
            <?php endif; ?>
        </div>
    </li>
</div>


<?php $__env->startSection('scripting...'); ?>
    <script>


    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/layouts/partials/_logged_board.blade.php ENDPATH**/ ?>