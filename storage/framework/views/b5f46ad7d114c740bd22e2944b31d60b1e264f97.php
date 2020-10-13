<select class="form-control" name="job">
    <option selected disabled><?php echo e(__('shared::actions.select') . ' ' . __('shared::commons.jobs')); ?></option>
    <?php for($i=0; $i<count($jobs=include app_path('Constants/jobs.php')); $i++): ?>
        <option value="<?php echo e($jobs[$i][0]); ?>"><?php echo e($jobs[$i][1][app()->getLocale()]); ?></option>
    <?php endfor; ?>
</select><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Shared/Resources/views/lists/_jobs.blade.php ENDPATH**/ ?>