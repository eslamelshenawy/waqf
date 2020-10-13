<!-- Start City -->
<input list="cities" name="city" id="city" class="field form-control"
       placeholder="<?php echo e(__('shared::commons.city')); ?>" value="<?php echo e(old('city')); ?>">
<datalist id="cities">
    <?php $__currentLoopData = \App\City::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($city->name_en); ?>" <?php echo e(old('city') == $city->name_en ? 'selected' : ''); ?>><?php echo e($city->{'name' . '_' . app()->getLocale()}); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</datalist>
<!-- End City -->
<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Shared/Resources/views/lists/_cities.blade.php ENDPATH**/ ?>