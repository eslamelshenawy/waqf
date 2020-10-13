<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale() == 'en' ? 'en' : 'ar'); ?>" dir="<?php echo e(app()->getLocale() == 'en' ? 'ltr' : 'rtl'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link id="gull-theme" rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/pickadate/classic.css">
    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/pickadate/classic.date.css">

    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/datatables.min.css">

    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/all.min.css" />

    <?php echo $__env->yieldPushContent('styles...'); ?>
    <?php echo $__env->yieldContent('styling...'); ?>

</head>

<body class="text-left">

<div id="mainWindow" style="z-index: 99999999999999999999; position: sticky">

</div>

<div class="main-content-wrap sidenav-open d-flex flex-column" id="spinner" style="display: none">
    <div class="card-body">
        <center>
            <div class="loader-bubble loader-bubble-primary m-5" style="font-size: 10px;"></div>
        </center>
    </div>
</div>

<div class="app-admin-wrap layout-sidebar-large clearfix">
    <div class="main-header">
        <div class="logo">
            <a href="<?php echo e(route('Admin::root')); ?>"><img src="<?php echo e(adminUrl()); ?>/images/logo.png" alt=""></a>
        </div>

        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div style="margin: auto"></div>
        <?php $Notifications = app('\App\Notification'); ?>
        <?php
            $count = $Notifications->whereIn('type', ['App\Notifications\TenantNotification','App\Notifications\AdminNotification','App\Notifications\BeneficiariesNotification','App\Notifications\BeneficiariesNotification'])->get()->count();
        ?>

        <div class="header-part-right">
            <!-- Full screen toggle -->
            <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
            <!-- Notificaiton -->
            <div class="dropdown">
                <div class="badge-top-container" id="dropdownNotification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-primary"><?php echo e($count); ?></span>
                    <i class="i-Bell text-muted header-icon"></i>
                </div>
                <!-- Notification dropdown -->
                <div class="dropdown-menu rtl-ps-none dropdown-menu-right notification-dropdown" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                    <?php $__currentLoopData = $Notifications->orderBy('id', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

            <!-- User avatar dropdown -->
            <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="<?php echo e(adminUrl()); ?>/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i> <?php echo e(auth()->user()->email); ?>

                        </div>
                        <a class="dropdown-item"><?php echo e(__('shared::commons.account_settings')); ?></a>
                        <a href="<?php echo e(route('Admin::root')); ?>" class="dropdown-item"><?php echo e(__('shared::commons.go_to_admin_dashboard')); ?></a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" id="accountingLogoutForm" name="accounting_logout_form">
                            <?php echo csrf_field(); ?>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="accounting_logout_form.submit()">
                                <?php echo e(__('shared::commons.sign_up')); ?>

                            </a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="side-content-wrap">
        <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">

            <ul class="navigation-left">
                <li class="nav-item active" data-item="">
                    <a class="nav-item-hold" href="<?php echo e(route('Accounting::index')); ?>">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text"><?php echo e(__('accounting::_.general')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>










                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create accounts','read accounts','update accounts','delete accounts'])|| auth()->user()->hasAnyPermission(['create orderbalances','read orderbalances','update orderbalances','delete orderbalances'])): ?>

                <li class="nav-item" data-item="accounts">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Financial"></i>
                        <span class="nav-text"><?php echo e(__('accounting::_.general_accounts')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create vouchers','read vouchers','update vouchers','delete vouchers'])|| auth()->user()->hasAnyPermission(['create orderbalances','read orderbalances','update orderbalances','delete orderbalances'])): ?>

                <li class="nav-item" data-item="vouchers">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Receipt"></i>
                        <span class="nav-text"><?php echo e(__('accounting::_.vouchers')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create receivables','read receivables','update receivables','delete receivables'])|| auth()->user()->hasAnyPermission(['create orderbalances','read orderbalances','update orderbalances','delete orderbalances'])): ?>

                <li class="nav-item" data-item="receivable">
                    <a class="nav-item-hold" href="">
                        <i class="nav-icon i-Lock-User"></i>
                        <span class="nav-text"><?php echo e(__('accounting::_.receivables')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create invoices','read invoices','update invoices','delete invoices'])|| auth()->user()->hasAnyPermission(['create orderbalances','read orderbalances','update orderbalances','delete orderbalances'])): ?>

                <li class="nav-item" >
                    <a class="nav-item-hold" href="<?php echo e(route('Accounting::invoices.index')); ?>">
                        <i class="nav-icon i-File-Horizontal-Text"></i>
                        <span class="nav-text"><?php echo e(__('accounting::_.invoices')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create reports','read reports','update reports','delete reports'])|| auth()->user()->hasAnyPermission(['create orderbalances','read orderbalances','update orderbalances','delete orderbalances'])): ?>

                <li class="nav-item" data-item="Reports">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Receipt-3"></i>
                        <span class="nav-text"><?php echo e(__('accounting::_.reports')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <?php endif; ?>


                <li class="nav-item">
                    <a class="nav-item-hold" href="">
                        <i class="nav-icon i-Gear"></i>
                        <span class="nav-text"><?php echo e(__('accounting::_.configuration')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>


            </ul>

        </div>

        <!-- Accounts -->
        <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">

            <!-- Start Accounts -->
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">

                <!-- Column 1 -->
                <ul class="childNav" data-parent="fund">
                    <li class="nav-item">
                        <a href="<?php echo e(route('Accounting::fund.index','type=spot')); ?>" class="open">
                            <i class="nav-icon fas fa-money-check"></i>
                            <span class="item-name"><?php echo e(__('accounting::_.fund')); ?></span>
                        </a>
                        <a href="<?php echo e(route('Accounting::fund.index','type=bank')); ?>" class="open">
                            <i class="nav-icon fas fa-money-check"></i>
                            <span class="item-name"><?php echo e(__('accounting::_.bank')); ?></span>
                        </a>
                    </li>
                </ul>
                <!-- End Accounts -->

                <!-- Column 1 -->
                <ul class="childNav" data-parent="accounts">
                    <li class="nav-item">
                        <a href="<?php echo e(route('Accounting::accounts.general')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('accounting::_.accounts')); ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('Accounting::accounts.journals.index')); ?>">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name"><?php echo e(__('accounting::_.journals')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('en/accounting/accounts/trialBalance')); ?>">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name"><?php echo e(__('ميزان المرجعه')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('en/accounting/accounts/accountStatement')); ?>">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name"><?php echo e(__('كشف الحساب')); ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::incomeStatement.index')); ?>">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name"><?php echo e(__('قائمة الدخل')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::balanceSheet.index')); ?>">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name"><?php echo e(__('الميزانيه')); ?></span>
                        </a>
                    </li>

                </ul>
                <!-- End Accounts -->


                <!-- Column 1 -->
                <ul class="childNav" data-parent="vouchers">
                    <li class="nav-item">
                        <a href="<?php echo e(route('Accounting::vouchers.payments.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('accounting::_.payment_vouchers')); ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('Accounting::vouchers.receipts.index')); ?>">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name"><?php echo e(__('accounting::_.receipt_vouchers')); ?></span>
                        </a>
                    </li>








                </ul>
                <!-- End Accounts -->

            <!-- Column 2 -->
            <ul class="childNav" data-parent="receivable">
                <li class="nav-item">
                    <a href="<?php echo e(url('accounting/receivable/tenant')); ?>" class="open">
                        <i class="nav-icon i-Clock-3"></i>
                        <span class="item-name"><?php echo e(__('accounting::_.tenants')); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('accounting/receivable/beneficiary')); ?>" class="open">
                        <i class="nav-icon i-Clock-3"></i>
                        <span class="item-name"><?php echo e(__('accounting::_.beneficiaries')); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('accounting/receivable/agency')); ?>" class="open">
                        <i class="nav-icon i-Clock-3"></i>
                        <span class="item-name"><?php echo e(__('accounting::_.agencies')); ?></span>
                    </a>
                </li>

            </ul>
            <!---->
            <!-- Column 2 -->
            <ul class="childNav" data-parent="Reports">
                <li class="nav-item">
                    <a href="<?php echo e(url('accounting/reports/expenses')); ?>" class="open">
                        <i class="nav-icon i-Clock-3"></i>
                        <span class="item-name"><?php echo e(__('accounting::_.reports_expenses')); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('accounting/reports/received')); ?>" class="open">
                        <i class="nav-icon i-Clock-3"></i>
                        <span class="item-name"><?php echo e(__('accounting::_.reports_received')); ?></span>
                    </a>
                </li>

            </ul>
            <!---->


        </div>
        <!-- SUB - End users and privilages -->

        <div class="sidebar-overlay"></div>
    </div>
    <div class="main-content-wrap sidenav-open d-flex flex-column">

    <?php echo $__env->make('admin::layouts.partials._breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--=============== Left side End ================-->
<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting222222/Resources/views/layouts/header.blade.php ENDPATH**/ ?>