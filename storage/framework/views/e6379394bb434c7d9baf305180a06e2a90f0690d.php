<?php $estates = app('\App\Estate'); ?>
<?php if($estates->count() > 0): ?>
<select name="building" class="form-control" id="building">
    <option selected disabled><?php echo e(__('shared::estates.select_building')); ?></option>
    <?php $__currentLoopData = $estates->where(['estate_type' => 'building', 'is_active' => true])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $building): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($building->id); ?>"
                <?php echo e(old('$building_id') == $building->id || (isset($selected_id) && $selected_id == $building->id) ? 'selected' : ''); ?>><?php echo e($building->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php else: ?>
    <input class="form-control mb-2" disabled placeholder="<?php echo e(__('shared::messages.no_building_available')); ?>">
    <i class="fas fa-plus-circle" style="color: #639"></i>&nbsp;
    <a href="<?php echo e(route('Admin::buildings.create')); ?>" style="color: #639;"><?php echo e(__('shared::estates.add_building')); ?></a>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/lists/_buildings.blade.php ENDPATH**/ ?>