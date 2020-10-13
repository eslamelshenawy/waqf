<?php $Bank = app('\Modules\Accounting\Entities\Bank'); ?>
<select id="bankId" class="field form-control" name="bank_id">
    <option disabled selected><?php echo e(__('shared::commons.select_bank')); ?></option>
    <?php $__currentLoopData = $Bank::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if( $bank->id == old('bank_id') ): ?>
            <option value="<?php echo e($bank->id); ?>" selected <?php echo e(isset($bank_id) ? ($bank_id == $bank->id ? 'selected' : '') : ''); ?>><?php echo e($bank->name); ?></option>
        <?php else: ?>
            <option value="<?php echo e($bank->id); ?>" <?php echo e(isset($bank_id) ? ($bank_id == $bank->id ? 'selected' : '') : ''); ?>><?php echo e($bank->name); ?></option>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/lists/_banks.blade.php ENDPATH**/ ?>