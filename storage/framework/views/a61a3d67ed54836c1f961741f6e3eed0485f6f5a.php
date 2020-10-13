<div style="display: <?php echo e(old('type') === 'agency' ? 'block' : 'none'); ?>;" id="servicesDiv">
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label class="form-label"><?php echo e(__('shared::users.services')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" <?php echo e(checkbox('services', 9, 'electric') == true ? 'checked' : ''); ?>

            value="electric" class="form-check-inline"  />
            <label>&nbsp;<?php echo e(__('shared::users.electric')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" <?php echo e(checkbox('services', 9, 'plumber') == true ? 'checked' : ''); ?>

            value="plumber" class="form-check-inline"  />
            <label>&nbsp;<?php echo e(__('shared::users.plumber')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" <?php echo e(checkbox('services', 9, 'carpenter') == true ? 'checked' : ''); ?>

            value="carpenter" class="form-check-inline" />
            <label>&nbsp;<?php echo e(__('shared::users.carpenter')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" <?php echo e(checkbox('services', 9, 'painter') == true ? 'checked' : ''); ?>

            value="painter" class="form-check-inline"  />
            <label>&nbsp;<?php echo e(__('shared::users.painter')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" <?php echo e(checkbox('services', 9, 'paving') == true ? 'checked' : ''); ?>

            value="paving" class="form-check-inline"  />
            <label>&nbsp;<?php echo e(__('shared::users.paving')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" <?php echo e(checkbox('services', 9, 'transfer_furniture') == true ? 'checked' : ''); ?>

            value="transfer_furniture" class="form-check-inline"  />
            <label>&nbsp;<?php echo e(__('shared::users.transfer_furniture')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" <?php echo e(checkbox('services', 9, 'uploading_and_downloading') == true ? 'checked' : ''); ?>

            value="uploading_and_downloading" class="form-check-inline" />
            <label>&nbsp;<?php echo e(__('shared::users.uploading_and_downloading')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" <?php echo e(checkbox('services', 9, 'cleaning') == true ? 'checked' : ''); ?>

            value="cleaning" class="form-check-inline"  />
            <label>&nbsp;<?php echo e(__('shared::users.cleaning')); ?></label>
        </div>
        <div class="col-md-12 mb-1">
            <input type="checkbox" name="services[]"
                   value="other" <?php echo e(checkbox('services', 9, 'other') == true ? 'checked' : ''); ?>

                   class="form-check-inline"
                   id="otherServiceCheck" onchange="chooseServices(this)" />
            <label>&nbsp;<?php echo e(__('shared::commons.other')); ?></label>
        </div>
        <div class="col-md-3 mb-1"  style="display: <?php echo e(checkbox('services', 9, 'other') == true ? 'block' : 'none'); ?>" id="otherServicesDiv">
            <input type="text" class="form-check-inline checkbox" name="service_other"
                   value="<?php echo e(old('service_other')); ?>"
                   id="otherServicesInput" placeholder="<?php echo e(__('shared::commons.service_other')); ?>" />
        </div>
    </div>
    <hr>
</div><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/users/agencies/partials/_services_checks.blade.php ENDPATH**/ ?>