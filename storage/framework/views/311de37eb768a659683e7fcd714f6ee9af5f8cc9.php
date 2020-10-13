<div class="clearfix"></div>
<div class="file-field">
    <div class="btn btn-primary btn-sm float-left">
        <span><?php if(isset($title)): ?> <?php echo e($title); ?> <?php else: ?> 'Upload your image' <?php endif; ?></span>
        <input type="file" id="uploader" name="<?php echo e($field); ?>" <?php echo e(isset($multi) ? 'multiple' : ''); ?>>
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate" name="<?php echo e($field); ?>" type="text" style="display: none">
    </div>
</div>
<div class="clearfix"></div>



<?php $__env->startSection('styling...'); ?>
    <style>
        .btn-primary  {
            background-color: #639 !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripting...'); ?>
    <script>
        // document.getElementById('uploader').setAttribute();
    </script>
<?php $__env->stopSection(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Shared/Resources/views/includes/_uploader_.blade.php ENDPATH**/ ?>