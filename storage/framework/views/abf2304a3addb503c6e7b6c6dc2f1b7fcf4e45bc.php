<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="logo">
                        <a href="<?php echo e(url('/')); ?>">
                            <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <div class="click--nav">
                        <ul class="nav-left">
                            <!-- /.icon -->
                            <li>
                                <div id="nav-icon1">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="body-overlay "></div>
                    <div class="nav">
                        <ul class="list-style">
                            <li class="active"><a href="<?php echo e(url('/')); ?>">الرئيسية</a></li>
                            <li><a href="<?php echo e(route('estate.index')); ?>"><?php echo e(__('shared::estates.real_estates_ads')); ?></a></li>
                            <li><a href="<?php echo e(route('gallery')); ?>"><?php echo e(__('client::commons.gallery')); ?></a></li>
                            <li><a href="<?php echo e(route('pages.contact')); ?>"><?php echo e(__('staticpage::pages.contact_us')); ?></a></li>
                            <li><a href="<?php echo e(route('pages.about')); ?>"><?php echo e(__('staticpage::pages.about_us')); ?></a></li>
                            <?php if(auth()->guard('web')->check()): ?>
                            <li><a href="<?php echo e(route('maintenance.index')); ?>">مركز الصيانة</a></li>
                            <?php endif; ?>
                            <?php if(\Auth::guard()->check()): ?>
                                <?php echo $__env->make('client::layouts.partials._logged_board', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif(\Auth::guard('beneficiary')->check()): ?>
                                <?php echo $__env->make('client::layouts.partials._logged_board', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif(\Auth::guard('agency')->check()): ?>
                                <?php echo $__env->make('client::layouts.partials._logged_board', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif(\Auth::guard('admin')->check()): ?>
                                <?php echo $__env->make('client::layouts.partials._admin_logged_board', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <?php echo $__env->make('client::layouts.partials._login_board', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/layouts/partials/_navbar.blade.php ENDPATH**/ ?>