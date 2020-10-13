
<select id="bankId" class="field form-control" name="bank_id">
    <option disabled selected><?php echo e(__('shared::actions.select') . ' ' .  __('shared::commons.banks')); ?></option>
<?php $__currentLoopData = \Modules\Accounting\Entities\Bank::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if( $bank->id == old('bank_id') ): ?>
            <option value="<?php echo e($bank->id); ?>" selected><?php echo e($bank->name); ?></option>
        <?php else: ?>
            <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->name); ?></option>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH C:\xampp\htdocs\waqf\Modules/Shared\Resources/views/lists/_banks.blade.php ENDPATH**/ ?>