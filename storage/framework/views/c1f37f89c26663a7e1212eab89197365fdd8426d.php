<section class="search__box">
    <div class="container">
        <form action="<?php echo e(route('search')); ?>" method="GET">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="form-group select-form form-box--big">
                        <select name="service" onchange="this.form.submit()">

                            <option value="all" <?php echo e(old('service') == 'all' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.all')); ?></option>
                            <option value="electric" <?php echo e(old('service') == 'electric' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.services.electric')); ?></option>
                            <option value="carpenter" <?php echo e(old('service') == 'carpenter' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.services.carpenter')); ?></option>
                            <option value="uploading_and_downloading" <?php echo e(old('service') == 'uploading_and_downloading' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.services.uploading_and_downloading')); ?></option>
                            <option value="transfer_furniture" <?php echo e(old('service') == 'transfer_furniture' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.services.transfer_furniture')); ?></option>
                            <option value="paving" <?php echo e(old('service') == 'paving' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.services.paving')); ?></option>
                            <option value="other" <?php echo e(old('service') == 'other' ? 'selected' : ''); ?>><?php echo e(__('shared::commons.services.other')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <div class="form-group form-box--big">
                        <input type="hidden" name="_" value="x90132" />
                        <input type="search" placeholder="ابحث عن" name="q" value="<?php echo e(old('q')); ?>">
                        <button type="submit">بحث</button>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/layouts/partials/_search_box_maintenance.blade.php ENDPATH**/ ?>