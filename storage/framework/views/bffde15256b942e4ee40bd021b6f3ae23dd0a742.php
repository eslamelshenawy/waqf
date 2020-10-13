<div style="display: <?php echo e(old('type') === 'person' ? 'block' : 'none'); ?>;" id="serviceDiv">
    <div class="form-row">

        <div class="col-md-12 mb-3">
            <label class="badge form-label"><?php echo e(__('client::users.services.service')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="electric" <?php echo e(old('services') == 'electric' ? 'checked' : ''); ?> class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.services.electric')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="plumber" <?php echo e(old('services') == 'plumber' ? 'checked' : ''); ?> class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.services.plumber')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="carpenter" <?php echo e(old('services') == 'carpenter' ? 'checked' : ''); ?> class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.services.carpenter')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="painter" <?php echo e(old('services') == 'painter' ? 'checked' : ''); ?> class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.services.painter')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="paving" <?php echo e(old('services') == 'paving' ? 'checked' : ''); ?> class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.services.paving')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="transfer_furniture" <?php echo e(old('services') == 'transfer_furniture' ? 'checked' : ''); ?> class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.services.transfer_furniture')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="uploading_and_downloading" <?php echo e(old('services') == 'uploading_and_downloading' ? 'checked' : ''); ?> class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.services.uploading_and_downloading')); ?></label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="cleaning" <?php echo e(old('services') == 'cleaning' ? 'checked' : ''); ?> class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.services.cleaning')); ?></label>
        </div>
        <div class="col-md-12 mb-1">
            <input type="radio" name="services[]" value="other"
                    class="form-check-inline radio radio-dark shadow-sm"
                    id="otherServiceRadio" onchange="chooseService(this)" />
            <label><?php echo e(__('client::users.other')); ?></label>
        </div><br>
        <div class="col-md-3 mb-1" style="display: none" id="otherServiceDiv">
            <input type="text" name="service_other" value="<?php echo e(old('service_other')); ?>" class="form-control shadow-sm"
                    id="otherServiceInput" placeholder="Other service" />
        </div>

    </div>

    <hr>
</div><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/users/agencies/partials/_service.blade.php ENDPATH**/ ?>