<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><?php echo e(__('accounting::_.account_', ['something' => 'جديد'])); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <input type="text" id="codeAccount"  class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form3">
                        <?php echo e(__('accounting::_.account_', ['something' => 'كود'])); ?>

                    </label>
                </div>

                <div class="md-form mb-4">
                    <input type="text" id="nameAccount"  class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        <?php echo e(__('accounting::_.account_', ['something' => 'اسم'])); ?>

                    </label>
                </div>
                <div class="md-form mb-4">
                    <input type="number" id="debitAccount" value="0" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        <?php echo e(__('accounting::_.account_', ['something' => 'مدين '])); ?>

                    </label>
                </div>
                <div class="md-form mb-4">
                    <input type="number" id="creditAccount" value="0"  class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        <?php echo e(__('accounting::_.account_', ['something' => 'دائن '])); ?>

                    </label>
                </div>

                <div class="md-form mb-4">
                    <select class="form-control" id="typeAccount" >
                        <option selected ><?php echo e(__('accounting::_.select_account_type')); ?></option>
                        <option value="رئيسى">   <?php echo e(__('accounting::_.main')); ?></option>
                        <option value="رئيسى1">   <?php echo e(__('accounting::_.main1')); ?></option>
                        <option value="رئيسى2">   <?php echo e(__('accounting::_.main2')); ?></option>
                        <option value="رئيسى3">   <?php echo e(__('accounting::_.main3')); ?></option>
                        <option value="فرعى">   <?php echo e(__('accounting::_.Subdivision')); ?></option>
                    </select>
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        <?php echo e(__('accounting::_.account_', ['something' => 'نوع'])); ?>

                    </label>
                </div>
                <?php $accounting = app('\Modules\Accounting\Entities\Account'); ?>
                <div class="md-form mb-4" id="dataMains" style="display:none;">
                    <select class="custom-select" size="5" id="dataMain" >
                        <option selected></option>
                    <?php $__currentLoopData = $accounting->where('type','رئيسى')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="md-form mb-4" id="dataMain4" style="display:none;">
                    <select class="custom-select" size="5" id="dataMain1" >
                        <option selected></option>
                    <?php $__currentLoopData = $accounting->where('type','رئيسى1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data1->id); ?>"><?php echo e($data1->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="md-form mb-4" id="dataMain3" style="display:none;">
                    <select class="custom-select" size="5" id="dataMain2">
                        <option selected></option>
                    <?php $__currentLoopData = $accounting->where('type','رئيسى2')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data2->id); ?>"><?php echo e($data2->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="md-form mb-4" id="dataSubdivision1" style="display:none;">
                    <select class="custom-select" size="5"id="dataSubdivision" >
                        <option selected></option>
                    <?php $__currentLoopData = $accounting->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data3->id); ?>"><?php echo e($data3->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="md-form mb-4">
                    <select class="form-control" id="typeMenu" >
                        <option selected ><?php echo e(__(' الترحيل الى  ')); ?></option>
                        <option value="قائمة دخل">   <?php echo e(__('قائمة الدخل ')); ?></option>
                        <option value="ميزانيه">   <?php echo e(__('الميزانيه')); ?></option>
                    </select>
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        <?php echo e(__('الترحيل الى')); ?>

                    </label>
                </div>
                <div class="md-form mb-4">
                    <select class="form-control" id="typeAccountMenu" >
                        <option selected ><?php echo e(__(' نوع الترحيل للقوائم')); ?></option>
                        <option value="مدين">   <?php echo e(__('مدين')); ?></option>
                        <option value="دائن">   <?php echo e(__('دائن')); ?></option>
                    </select>
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        <?php echo e(__('نوع الترحيل')); ?>

                    </label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-raised btn-raised-primary btn-sm" type="button" id="addaccount">Save <i class="fas fa-save ml-1"></i></button>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\waqf\Modules/Accounting\Resources/views/accounts/partials/_new.blade.php ENDPATH**/ ?>