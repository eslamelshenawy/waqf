
        <!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/pickadate/classic.css">
        <link rel="stylesheet" href="<?php echo e(adminUrl()); ?>/styles/vendor/pickadate/classic.date.css">

        <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrapv4/css/bootstrap.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome-all.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/jquery.fancybox.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/rating.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" />

        <link rel="stylesheet" href="<?php echo e(mix('css/client.css')); ?>">

        <style>
            li.notification__log.log__in .new_notifications {
                display: flex;
                width: 17px;
                height: 17px;
                background: #dfa72b;
                border-radius: 50%;
                position: absolute;
                top: 40%;
                right: 15%;
            }

            .new_notifications span {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
            }

        </style>
        <?php echo $__env->yieldContent('styling...'); ?>

    </head>
    <body>
<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/layouts/header.blade.php ENDPATH**/ ?>