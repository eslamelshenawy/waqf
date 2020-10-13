<div style="display: <?php echo e(old('type') === 'person' ? 'block' : 'none'); ?>;" id="serviceDiv">
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label><?php echo e(__('shared::users.service')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="electric"
                   <?php echo e(old('services') == 'electric' ? 'checked' : ''); ?>

                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::users.electric')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="plumber"
                   <?php echo e(old('services') == 'plumber' ? 'checked' : ''); ?>

                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::users.plumber')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]"
                   value="carpenter" <?php echo e(old('services') == 'carpenter' ? 'checked' : ''); ?>

                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::users.carpenter')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="painter"
                   <?php echo e(old('services') == 'painter' ? 'checked' : ''); ?>

                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::users.painter')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="paving"
                   <?php echo e(old('services') == 'paving' ? 'checked' : ''); ?>

                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::users.paving')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="transfer_furniture" <?php echo e(old('services') == 'transfer_furniture' ? 'checked' : ''); ?>

            class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::users.transfer_furniture')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="uploading_and_downloading"
                   <?php echo e(old('services') == 'uploading_and_downloading' ? 'checked' : ''); ?>

                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::users.uploading_and_downloading')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="cleaning"
                   <?php echo e(old('services') == 'cleaning' ? 'checked' : ''); ?>

                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::users.cleaning')); ?></label>
        </div>
        <div class="col-md-12 mb-1">
            <input type="radio" name="services[]" value="other"
                   class="form-check-inline"
                   id="otherServiceRadio" onchange="chooseService(this)" />
            <label>&nbsp;<?php echo e(__('shared::commons.other')); ?></label>
        </div><br>
        <div class="col-md-3 mb-1" style="display: none" id="otherServiceDiv">
            <input type="text" name="service_other" value="<?php echo e(old('service_other')); ?>"
                   class="form-control"
                   id="otherServiceInput" placeholder="<?php echo e(__('shared::commons.service_other')); ?>" />
        </div>

    </div>

    <hr>
</div><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/users/agencies/partials/_services_radios.blade.php ENDPATH**/ ?>