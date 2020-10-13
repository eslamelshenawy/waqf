<select name="job" class="form-control" id="job">
    <option selected disabled><?php echo e(__('admin::globals.select_job')); ?></option>
    <option value="government_employee" <?php echo e(isset($job) ? ($job == 'government_employee' ? 'selected' : '') : ''); ?>><?php echo e(__('admin::jobs.government_employee')); ?></option>
    <option value="private_sector_employee" <?php echo e(isset($job) ? ($job == 'private_sector_employee' ? 'selected' : '') : ''); ?>><?php echo e(__('admin::jobs.private_sector_employee')); ?></option>
    <option value="businessman" <?php echo e(isset($job) ? ($job == 'businessman' ? 'selected' : '') : ''); ?>><?php echo e(__('admin::jobs.businessman')); ?></option>
    <option value="free_business" <?php echo e(isset($job) ? ($job == 'free_business' ? 'selected' : '') : ''); ?>><?php echo e(__('admin::jobs.free_business')); ?></option>
    <option value="retired" <?php echo e(isset($job) ? ($job == 'retired' ? 'selected' : '') : ''); ?>><?php echo e(__('admin::jobs.retried')); ?></option>
    <option value="other" <?php echo e(isset($job) ? ($job == 'other' ? 'selected' : '') : ''); ?>><?php echo e(__('admin::jobs.other')); ?></option>
</select>

<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/lists/_jobs.blade.php ENDPATH**/ ?>