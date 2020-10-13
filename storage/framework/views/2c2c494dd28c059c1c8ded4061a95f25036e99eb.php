<?php $Notifications = app('\App\Notification'); ?>
<?php
    $count = $Notifications->whereIn('type', ['App\Notifications\TenantNotification','App\Notifications\AdminNotification','App\Notifications\BeneficiariesNotification','App\Notifications\BeneficiariesNotification'])->where('read_at',"!=",null)->get()->count();
?>
        <!DOCTYPE html>
<html lang="en" dir="<?php echo e(app()->getLocale() == 'en' ? 'ltr' : 'rtl'); ?>">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link id="gull-theme" rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/classic.css">
    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/pickadate/snow.css">
    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/pickadate/classic.date.css">
    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="/vendor/bootstrapv4/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles\vendor\quill.snow.css" />
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php echo $__env->yieldPushContent('styles...'); ?>
    <?php echo $__env->yieldContent('styling...'); ?>
</head>
<body class="text-left">







<div class="app-admin-wrap layout-sidebar-large clearfix">
    <div class="main-header">
        <div class="logo">
            <img src="<?php echo e(adminUrl()); ?>/images/logo.png" alt="">
        </div>
        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div style="margin: auto"></div>
        <div class="header-part-right">
            <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
            <?php echo $__env->make('admin::layouts.partials._notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="<?php echo e(adminUrl()); ?>/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i> <?php echo e(auth()->user()->email); ?>

                        </div>
                        <a class="dropdown-item"><?php echo e(__('admin::dashboard.account_settings')); ?></a>
                        <form method="POST" action="<?php echo e(Route('logout')); ?>" id="adminLogoutForm">
                            <?php echo csrf_field(); ?>
                            <a href="#" class="dropdown-item"
                               onclick="document.getElementById('adminLogoutForm').submit()">Sign out</a>
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
                    <a class="nav-item-hold" href="<?php echo e(route('Admin::root')); ?>">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text"><?php echo e(__('admin::dashboard.it')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create administrators','read administrators','update administrators','delete administrators'])): ?>
                    <li class="nav-item" data-item="privileges">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-King-2"></i>
                            <span class="nav-text"><?php echo e(__('admin::dashboard.administrators.it')); ?> <br>
                            <?php echo e(__('admin::dashboard.and')); ?>

                                <?php echo e(__('admin::dashboard.privileges.it')); ?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create subscribers','read subscribers','update subscribers','delete subscribers'])|| auth()->user()->hasAnyPermission(['create tenants','read tenants','update tenants','delete tenants'])|| auth()->user()->hasAnyPermission(['create beneficiaries','read beneficiaries','update beneficiaries','delete beneficiaries'])|| auth()->user()->hasAnyPermission(['create agencies','read agencies','update agencies','delete agencies'])): ?>
                    <li class="nav-item" data-item="users">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Lock-User"></i>
                            <span class="nav-text"><?php echo e(__('admin::dashboard.users')); ?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create buildings','read buildings','update buildings','delete buildings'])||auth()->user()->hasAnyPermission(['create shops','read shops','update shops','delete shops'])|| auth()->user()->hasAnyPermission(['create lands','read lands','update lands','delete lands'])|| auth()->user()->hasAnyPermission(['create apartments','read apartments','update apartments','delete apartments'])): ?>

                    <li class="nav-item" data-item="estates">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Lock-User"></i>
                            <span class="nav-text"><?php echo e(__('admin::dashboard.real_estates')); ?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create estateorders','read estateorders','update estateorders','delete estateorders'])||auth()->user()->hasAnyPermission(['create shops','read shops','update shops','delete shops'])|| auth()->user()->hasAnyPermission(['create lands','read lands','update lands','delete lands'])|| auth()->user()->hasAnyPermission(['create apartments','read apartments','update apartments','delete apartments'])): ?>

                    <li class="nav-item" data-item="Reservations">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Lock-User"></i>
                            <span class="nav-text"><?php echo e(__('admin::dashboard.Reservations')); ?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create advances','read advances','update advances','delete advances'])): ?>

                    <li class="nav-item" data-item="advances">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Lock-User"></i>
                            <span class="nav-text"><?php echo e(__('admin::dashboard.advances')); ?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create orderinformations','read orderinformations','update orderinformations','delete orderinformations'])|| auth()->user()->hasAnyPermission(['create orderbalances','read orderbalances','update orderbalances','delete orderbalances'])): ?>

                    <li class="nav-item"  data-item="balanceSheet">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Lock-User"></i>
                            <span class="nav-text"><?php echo e(__('طلبات المستفيدين')); ?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasanyrole(['super-admin', 'accountant'])|| auth()->user()->hasAnyPermission(['create accountings','read accountings','update accountings','delete accountings'])): ?>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="<?php echo e(url('/accounting')); ?>">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="nav-text"><?php echo e(__('admin::dashboard.accounting')); ?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read settings')): ?>
                    <li class="nav-item" data-item="settings">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Gear"></i>
                            <span class="nav-text"><?php echo e(__('admin::dashboard.settings.it')); ?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
            <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create administrators','read administrators','update administrators','delete administrators'])): ?>
                <ul class="childNav" data-parent="privileges">
                    <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create administrators','read administrators','update administrators','delete administrators'])): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('Admin::administrators.index')); ?>" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name"><?php echo e(__('admin::dashboard.administrators.it')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create administrators','read administrators','update administrators','delete administrators'])): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('Admin::permissions.index')); ?>">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name"><?php echo e(__('admin::dashboard.permissions.it')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create administrators','read administrators','update administrators','delete administrators'])): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('Admin::roles.index')); ?>">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name"><?php echo e(__('admin::dashboard.roles.it')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
            <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create subscribers','read subscribers','update subscribers','delete subscribers'])|| auth()->user()->hasAnyPermission(['create tenants','read tenants','update tenants','delete tenants'])|| auth()->user()->hasAnyPermission(['create beneficiaries','read beneficiaries','update beneficiaries','delete beneficiaries'])|| auth()->user()->hasAnyPermission(['create agencies','read agencies','update agencies','delete agencies'])): ?>
                <ul class="childNav" data-parent="users">
                    <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create subscribers','read subscribers','update subscribers','delete subscribers'])): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('Admin::subscribers.index')); ?>" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name"><?php echo e(__('admin::dashboard.subscribers.it')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasRole('super-admin') ||  auth()->user()->hasAnyPermission(['create tenants','read tenants','update tenants','delete tenants'])): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('Admin::tenants.index')); ?>" class="open">
                                <i class="nav-icon i-Clock-3"></i>
                                <span class="item-name"><?php echo e(__('admin::dashboard.tenants')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create beneficiaries','read beneficiaries','update beneficiaries','delete beneficiaries'])): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('Admin::beneficiaries.index')); ?>">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name"><?php echo e(__('admin::dashboard.beneficiaries')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasRole('super-admin') ||  auth()->user()->hasAnyPermission(['create agencies','read agencies','update agencies','delete agencies'])): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('Admin::agencies.index')); ?>">
                                <i class="nav-icon i-Clock-4"></i>
                                <span class="item-name"><?php echo e(__('admin::dashboard.agencies')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create buildings','read buildings','update buildings','delete buildings']) || auth()->user()->hasAnyPermission(['create shops','read shops','update shops','delete shops']) || auth()->user()->hasAnyPermission(['create lands','read lands','update lands','delete lands']) || auth()->user()->hasAnyPermission(['create apartments','read apartments','update apartments','delete apartments'])): ?>
            <ul class="childNav" data-parent="estates">
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->can('read buildings')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::buildings.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('admin::dashboard.buildings')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create apartments','read apartments','update apartments','delete apartments'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::apartments.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('admin::dashboard.apartments')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasAnyPermission(['create shops','read shops','update shops','delete shops'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::shops.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('admin::dashboard.shops')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create lands','read lands','update lands','delete lands'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::lands.index')); ?>">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name"><?php echo e(__('admin::dashboard.lands')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>

            <ul class="childNav" data-parent="Reservations">
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create estateorders','read estateorders','update estateorders','delete estateorders'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::Reservations.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('admin::dashboard.Reservations')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

          <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create advances','read advances','update advances','delete advances'])): ?>
            <ul class="childNav" data-parent="advances">
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::advances.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('admin::dashboard.advances')); ?></span>
                        </a>
                    </li>
            </ul>
        <?php endif; ?>
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create orderinformations','read orderinformations','update orderinformations','delete orderinformations'])|| auth()->user()->hasAnyPermission(['create orderbalances','read orderbalances','update orderbalances','delete orderbalances'])): ?>
            <ul class="childNav" data-parent="balanceSheet">
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::ordersBalance.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('طلبات الميزانيه')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::ordersInformation.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('طلبات الحصول على المعلومات')); ?></span>
                        </a>
                    </li>
            </ul>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create settings','read settings','update settings','delete settings'])
|| auth()->user()->hasAnyPermission(['create pages','read pages','update pages','delete pages'])): ?>
            <ul class="childNav" data-parent="settings">
                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create settings','read settings','update settings','delete settings'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::setting.index')); ?>" class="open">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name"><?php echo e(__('admin::dashboard.settings.it')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>








                <?php if(auth()->user()->hasRole('super-admin') || auth()->user()->hasAnyPermission(['create pages','read pages','update pages','delete pages'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('Admin::pages.index')); ?>" class="open">
                            <i class="nav-icon far fa-file"></i>
                            <span class="item-name"><?php echo e(__('admin::dashboard.static_pages')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
        </div>
        <div class="sidebar-overlay"></div>
    </div>
    <div class="main-content-wrap sidenav-open d-flex flex-column">
    <?php echo $__env->make('admin::layouts.partials._breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div >
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('admin::layouts.partials._copyright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/perfect-scrollbar.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/datatables.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/pickadate/picker.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/pickadate/picker.date.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/pickadate/picker.time.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/echarts.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/es5/echart.options.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/es5/dashboard.v1.script.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/tagging.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/tagging.script.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/es5/script.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/es5/sidebar.large.script.min.js"></script>















<script src="/vendor/bootstrapv4/js/bootstrap.bundle.js"></script>
<script src="/vendor/bootstrapv4/js/bootstrap.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/quill.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/vue.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/axios.min.js"></script>

<script src="/js/all.min.js"></script>
<script src="/js/axios.min.js"></script>
<?php echo $__env->yieldPushContent('scripts...'); ?>
<script src="/js/utils.js"></script>
<?php echo $__env->yieldContent('scripting...'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.4/jstree.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ67H5QBLVTdO2pnmEmC2THDx95rWyC1g&libraries=places&callback=initAutocomplete" async defer></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/start/jquery-ui.css">

<script>


    $(document).ready(function () {
        $('.advanced_id').click(function () {
            var data_val = $(this).attr("daId");
            $("#advancedId").val(data_val);
            // alert(data_val);
        });

        $('.readNoti').click(function () {
            var dataId = $(this).attr("dataId");
            // alert(advancedId);
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url('read/notification')); ?>",
                method: 'POST',
                data: {
                    data_id: dataId,
                    _token: token
                },
                success: function (data) {
                    // location.reload();
                }

            });
        });
    $('#send_comment').click(function () {
        var admin_commit = $('#admin_commit').val();
        var advancedId = $('#advancedId').val();
        var data_id = $('.commitAdd').attr("dataId");
                // alert(advancedId);
        var token = '<?php echo e(csrf_token()); ?>';
        $.ajax({
            url: "<?php echo e(url('/en/dashboard/advance/store/comment')); ?>",
            method: 'POST',
            data: {
                admin_commit: admin_commit,
                data_id: advancedId,
                _token: token
            },
            success: function (data) {
                console.log(data);
                alertify.success(data.success);
                setTimeout(function(){
                    location.reload();
                },300);
            }

        });
    });
    $('#send_date').click(function () {
        var date_advance = $('#date_advance').val();
        var data_id = $('.advanced_date').attr("data_id");
        // alert(data_id);

        var token = '<?php echo e(csrf_token()); ?>';
        $.ajax({
            url: "<?php echo e(url('/en/dashboard/advance/store/date')); ?>",
            method: 'POST',
            data: {
                date_advance: date_advance,
                data_id: data_id,
                _token: token
            },
            success: function (data) {
                console.log(data);
                alertify.success(data.success);
                setTimeout(function(){
                    location.reload();
                },300);
            }

        });
    });
        $('#date_advance').datepicker({
            minDate: 0,
        });
        $('#commit_add').click(function () {
            var data_val = $(this).attr("data_val");
            $("textarea#admin_commit").val(data_val);
        });
            $('.date_pay').bind('click keyup ', function(event) {
            var data_id = $(this).attr("data_id");
            $('#test'+data_id).datepicker({
                minDate: 0,
                onSelect: function(dateText, inst) {
                    var date_advance =
                        inst.selectedYear       +"-"+
                        (inst.selectedMonth+1) +"-"+
                        inst.selectedDay;
                    $('#date_edit_pay'+data_id).html(dateText);
                    $('#date_edit_pay'+data_id).append('<div style="height:0px; overflow:hidden">' + '<input class="datepicker-input" id="test'+data_id+'"  type="text"/>' + '</div>');
                    var token = '<?php echo e(csrf_token()); ?>';
                    $.ajax({
                        url: "<?php echo e(url('/en/dashboard/advance/store/change')); ?>",
                        method: 'POST',
                        data: {
                            data_id: data_id,
                            date_advance: date_advance,
                            _token: token
                        },
                        success: function (data) {
                            console.log(data.errors);
                            alertify.success(data.success);
                        }
                    });
                }
            });
            $('#test'+data_id).datepicker().focus();
        });

        $(document).delegate('.date_pay', 'click', function () {
            var data_id = $(this).attr("data_id");
            $('#test'+data_id).datepicker({
                minDate: 0,
                onSelect: function(dateText, inst) {
                    // alert(dateText);
                    $('.date_pay').html(dateText);
                    $('.date_pay').append('<div style="height:0px; overflow:hidden">' + '<input class="datepicker-input" id="test'+data_id+'"  type="text"/>' + '</div>');
                }
            });
            $('#test'+data_id).datepicker().focus();
        });

    });

    window.onload = async function () {
        let loading = setTimeout(function (e) {
            document.getElementById('app').style.display = 'none';
            document.getElementById('spinner').style.display = 'block';
            // document.getElementById('spinner').style.height = '400px';
            document.getElementById('spinner').style.marginBottom = '100';
        });
        await setTimeout(function (e) {
            clearTimeout(loading);
            document.getElementById('app').style.display = 'block';
            document.getElementById('spinner').remove();
        }, 999);
    };
    let syncing = function(){
        axios.post('<?php echo e(route("Admin::syncing")); ?>')
            .then((response) => {
                location.reload();
            })
    }


    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map_edit'), {
            center: {
                lat: 30.0595581,
                lng:  31.2233591 ,
            },
            zoom: 7,
            mapTypeId: 'roadmap'
        });
        var input = document.getElementById('searchMapInput');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });
        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            /* If the place has a geometry, then present it on a map. */
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setIcon(({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);
            /* Location details */
            $('#lat').val(marker.getPosition().lat());
            $('#lng').val(marker.getPosition().lng());
            document.getElementById('location-snap').innerHTML = place.formatted_address;
            document.getElementById('lat').innerHTML = place.geometry.location.lat();
            document.getElementById('lng').innerHTML = place.geometry.location.lng();
        });
        // Create the search box and link it to the UI element.
        var marker = new google.maps.Marker({
            position: {
                lat: 30.0595581,
                lng:  31.2233591 ,
            },
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP
        });
        google.maps.event.addListener(map, 'click', function(event) {
            if (marker) {
                marker.setMap(null);
                var myLatLng = event.latLng;
            }
            marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });
            var geocoder;
            //
            var reverseGeocoder = new google.maps.Geocoder();
            var currentPosition = new google.maps.LatLng(marker.getPosition().lat(), marker.getPosition().lng());

            reverseGeocoder.geocode({'latLng': currentPosition}, function(results, status) {
                console.log(results[0].formatted_address ,'7777777777777');
                $('#searchMapInput').val(results[0].formatted_address);

            });

            // console.log(event.latLng);
            $('#lat').val(marker.getPosition().lat());
            $('#lng').val(marker.getPosition().lng());
            console.log(marker.getPosition().lat());
            console.log(marker.getPosition().lng());
        })
        google.maps.event.addListener(map, 'zoom_changed', function() {
            $('#zoom').val(map.getZoom())
        });
        $("#jstree").on('changed.jstree', function(e, data) {
            var lat = parseFloat($('#' + data.selected).attr('lat'));
            var lng = parseFloat($('#' + data.selected).attr('lng'));
            var zoom = parseInt($('#' + data.selected).attr('zoom'));
            $('#lat').val(lat);
            $('#lng').val(lng);
            $('#zoom').val(zoom);
            console.log(lat1);
            marker.setPosition({
                lat: lat1,
                lng: lng1
            });
            map.setCenter(new google.maps.LatLng(lat1, lng1));
            map.setZoom(zoom);
        })
    }
    $("#jstree").on('changed.jstree', function(e, data) {
        $('#location').select2('val', data.selected);
        $('#get_group').text($('#' + data.selected).attr('data-title'));
        $('#get_location').attr('lat', $('#' + data.selected).attr('lat'));
        $('#get_location').attr('lng', $('#' + data.selected).attr('lng'));
        $('#get_location').attr('zoom', $('#' + data.selected).attr('zoom'));
        var id = data.selected;
        $('#parent_id').val(id);
        $('#location_id').val(id);
        $('#del_loc').val(id);
        //marker.setPosition(place.geometry.location);
    }).jstree({
        'core': {
            "themes": {
                "dots": false,
                "icons": false
            }
        },
        'plugins': ['types', 'contextmenu', 'wholerow', 'ui']
    });
    var id = "<?php echo e(old('location_id')); ?>";
    // $('#jstree').jstree(true).select_node(id);
    $('#location').on('change', function() {
        var id = $(this).val();
        var old = $(this).attr('old');
        $('#jstree').jstree(true).deselect_node(old);
        $('#jstree').jstree(true).select_node(id);
        $(this).attr('old', id);
    });

</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/layouts/master.blade.php ENDPATH**/ ?>