<?php for($i=0; $i<count($status=include app_path('Constants/marital_status.php')); $i++): ?>
<div class="form-check">
    <input
            onchange="func(this.value)"
            class="form-check-input"
            type="radio"
            name="marital_status"
            value="<?php echo e($status[$i][0]); ?>"
            <?php echo e($status[$i][0] == 'single' ? 'checked' : ''); ?>

    />
    <label class="form-check-label" for="<?php echo e($status[$i][0] . 'Status'); ?>">
        <?php echo e($status[$i][1][app()->getLocale()]); ?>

    </label>
</div>
<?php endfor; ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Shared\Resources/views/lists/_martial_status.blade.php ENDPATH**/ ?>