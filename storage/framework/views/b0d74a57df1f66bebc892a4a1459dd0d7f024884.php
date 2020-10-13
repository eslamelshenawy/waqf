<div class="tab-pane fade show active" id="edit" role="tabpanel" aria-labelledby="edit-tab">
    <!--==== Edit Area =====-->
    <div class="d-flex mb-5">
        <span class="m-auto"></span>




    </div>
    <form method="POST" action="<?php echo e(route('Accounting::invoices.store')); ?>" id="invoiceForm" name="invoice_form">
        <?php echo csrf_field(); ?>
 <?php $Invoice = app('\Modules\Accounting\Entities\Invoice'); ?>
 <?php
 $invoiceCount=$Invoice->get()->count();
 ?>
 
        <div class="row justify-content-between">
            <div class="col-md-10">

                <h4 class="font-weight-bold"><?php echo e(__('accounting::_.invoice_', ['something' => __('accounting::_.info')])); ?></h4>


                <div class="col-sm-4 form-group mb-3 pl-0">
                    <label for="invoiceNumber"><?php echo e(__('accounting::_.invoice_', ['something' => 'رقم'])); ?></label>
                    <input disabled type="text" name="order_number" value="<?php echo e(++$invoiceCount); ?>"  class="form-control <?php $__errorArgs = ['order_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="invoiceNumber"
                           placeholder="<?php echo e(__('accounting::_.invoice_', ['something' => 'رقم'])); ?>">
                    <?php $__errorArgs = ['order_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                        <span class="badge badge-danger"><?php echo e($message); ?></span>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-sm-4 form-group mb-3 pl-0">
                    <label for="invoiceCode"><?php echo e(__('accounting::_.invoice_', ['something' => 'كود'])); ?></label>
                    <input type="text" name="invoice_code" value="<?php echo e(old('invoice_code')); ?>" maxlength="8" class="form-control <?php $__errorArgs = ['invoice_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="invoiceCode"
                           placeholder="<?php echo e(__('accounting::_.invoice_', ['something' => 'كود'])); ?>">
                    <?php $__errorArgs = ['invoice_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                        <span class="badge badge-danger"><?php echo e($message); ?></span>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-sm-4 form-group mb-3 pl-0">
                    <div class="form-group mb-3">
                        <label for="order-datepicker"><?php echo e(__('accounting::_.invoice_', ['something' => 'تاريخ'])); ?></label>
                        <input id="order-datepicker" value="<?php echo e(old('order_at')); ?>" class="form-control text-right <?php $__errorArgs = ['order_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="yyyy-mm-dd" name="order_at">
                        <?php $__errorArgs = ['order_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <span class="badge badge-danger"><?php echo e($message); ?></span>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 form-group mb-3 pl-0">
                    <label for="notes"><?php echo e(__('accounting::_.notes')); ?></label>
                    <textarea class="form-control  <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="notes" id="notes"
                              placeholder="<?php echo e(__('accounting::_.notes')); ?>" value="<?php echo e(old('notes')); ?>" rows="4" ></textarea>
                    <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                        <span class="badge badge-danger"><?php echo e($message); ?></span>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>












































        </div>
        <div class="mt-3 mb-4 border-top"></div>
        <div class="row mb-5">
            <div class="col-md-6">
                <div style="display: none" id="fundDiv">
                    <h5 class="font-weight-bold"><?php echo e(__('accounting::_.fund')); ?></h5>
                    <div class="col-md-10 form-group mb-3 pl-0">
                        <select class="form-control <?php $__errorArgs = ['fund_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fund_id">
                            <option disabled selected><?php echo e(__('accounting::_.fund_', ['something' => __('shared::actions.select')])); ?></option>
                            <?php $__currentLoopData = \Modules\Accounting\Entities\Account::whereIn('id',[21,22])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($fund->id); ?>" <?php echo e(old('fund_id')== $fund->id ?  "selected" : ""); ?>><?php echo e($fund->name); ?> && <?php echo e($fund->balance); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php $__errorArgs = ['fund_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                        <span class="badge badge-danger"><?php echo e($message); ?></span>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div id="bankDiv" style="display: none;">
                    <h5 class="font-weight-bold">
                        <?php echo e(__('accounting::_.bank')); ?></h5>
                    <div class="col-md-10 form-group mb-3 pl-0">
                        <select class="form-control <?php $__errorArgs = ['bank_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bank_id">
                            <option disabled selected>
                                <?php echo e(__('accounting::_.bank_', ['something' => __('shared::actions.select')])); ?>

                            </option>
                            <?php $__currentLoopData = \Modules\Accounting\Entities\Account::whereIn('id',[25,26])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($bank->id); ?>" <?php echo e(old('bank_id')== $bank->id ?  "selected" : ""); ?>><?php echo e($bank->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php $__errorArgs = ['bank_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                        <span class="badge badge-danger"><?php echo e($message); ?></span>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

        </div>
        
        <div class="row">
            <div class="col-md-6" id="tenantDiv" >
                <h5 class="font-weight-bold"><?php echo e(__('accounting::_.bill_to')); ?></h5>
                <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">

                    <select class="form-control <?php $__errorArgs = ['tenant_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tenant_id">
                        <option selected disabled><?php echo e(__('accounting::_.tenant')); ?></option>
                        <?php $__currentLoopData = \App\Tenant::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tenant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tenant->id); ?>"<?php echo e(old('tenant_id',$tent)== $tenant->id ?  "selected" : ""); ?>><?php echo e($tenant->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php $__errorArgs = ['tenant_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div>
                    <span class="badge badge-danger"><?php echo e($message); ?></span>
                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">
                    <textarea class="form-control text-right" placeholder="Bill From Address" name="description_invoice" value="<?php echo e(old('description_invoice')); ?>"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <?php $account = app('\Modules\Accounting\Entities\Account'); ?>
            <label for="type"><?php echo e(__('accounting::_.typefund')); ?></label>
            <select class="form-control  <?php $__errorArgs = ['account_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="account_id" id="account_id" required>
                <option selected disabled><?php echo e(__('shared::actions.select')); ?></option>
                <?php $__currentLoopData = $account->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($c->id); ?>" <?php echo e(old('account_id') == $c->id ? 'selected' : ''); ?> ><?php echo e($c->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['account_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div>
                <span class="badge badge-danger"><?php echo e($message); ?></span>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    
    </hr>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover mb-3">
                    <thead class="bg-gray-300">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?php echo e(__('accounting::_.service_', ['something' => 'اسم'])); ?></th>
                        <th scope="col"><?php echo e(__('accounting::_.service_', ['something' => 'سعر'])); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <input name="service_name" type="text" class="form-control <?php $__errorArgs = ['service_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('service_name')); ?>"
                                   placeholder="<?php echo e(__('accounting::_.service_', ['something' => 'اسم'])); ?>" id="serviceName">
                                    <?php $__errorArgs = ['service_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div>
                                    <span class="badge badge-danger"><?php echo e($message); ?></span>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                        <td>
                            <input name="service_price" type="text" maxlength="5" class="form-control <?php $__errorArgs = ['service_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('service_price',$price)); ?>"
                                   placeholder="<?php echo e(__('accounting::_.service_', ['something' => 'سعر'])); ?>" id="servicePrice" onblur="if(this.value !== 0 || this.value !== null){updateTotal(this.value)}" >
                                 <?php $__errorArgs = ['service_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div>
                                <span class="badge badge-danger"><?php echo e($message); ?></span>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>




                    </tr>
                    </tbody>
                </table>

            </div>

            <div class="col-md-12">

                <div class="invoice-summary invoice-summary-input float-right">

                    <table class="table table-borderless">
                        <tr>
                            <td><?php echo e(__('accounting::_.amount')); ?></td>
                            <td colspan="2"><input type="text" id="amount" name="amount" disabled
                                                   class="form-control small-input mb-1 <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('service_price',$price)); ?>"></td>
                        </tr>












                    </table>

                </div>
            </div>

        </div>
        <input type="submit" value="Submit">

    </form>
    <!--==== / Edit Area =====-->
</div>

<?php $__env->startSection('scripting...'); ?>
<script>

    let total = 0;

    var determineDocumentType = function(val){
        if(val === 'cash'){
            document.getElementById('fundDiv').style.display = 'block';
            document.getElementById('paymentModeDiv').style.display = 'block';
            document.getElementById('bankDiv').style.display = 'none';
            document.getElementById('tenantDiv').style.display = 'block';

        }else if(val === 'credit'){
            document.getElementById('bankDiv').style.display = 'none';
            document.getElementById('bankDiv').value = null;
            document.getElementById('bankDiv').setAttribute('value', null);
            document.getElementById('fundDiv').style.display = 'none';
            document.getElementById('fundDiv').value = null;
            document.getElementById('fundDiv').setAttribute('value', null);
            document.getElementById('tenantDiv').value = null;
            document.getElementById('tenantDiv').style.display = 'block';
            document.getElementById('paymentModeDiv').style.display = 'none';
        }else{
            document.getElementById('bankDiv').style.display = 'none';
            document.getElementById('bankDiv').value = null;
            document.getElementById('bankDiv').setAttribute('value', null);
            document.getElementById('fundDiv').style.display = 'none';
            document.getElementById('fundDiv').value = null;
            document.getElementById('fundDiv').setAttribute('value', null);
            document.getElementById('tenantDiv').style.display = 'block';
            document.getElementById('paymentModeDiv').style.display = 'none';
            document.getElementById('paymentModeDiv').value = null;
            document.getElementById('')
        }
    };

    var determinePaymentMode = function(val){
        if(val === 'fund'){
            document.getElementById('fundDiv').style.display = 'block';
            document.getElementById('tenantDiv').style.display = 'block';
            document.getElementById('bankDiv').style.display = 'none';
            document.getElementById('bankDiv').removeAttribute('name');

        }else if(val === 'bank'){
            document.getElementById('bankDiv').style.display = 'block';
            document.getElementById('tenantDiv').style.display = 'block';
            document.getElementById('fundDiv').style.display = 'none';
        }else{
            document.getElementById('fundDiv').style.display = 'none';
            document.getElementById('fundDiv').value = null;
            document.getElementById('fundDiv').setAttribute('value', null);
            document.getElementById('bankDiv').style.display = 'none';
            document.getElementById('fundDiv').style.display = 'none';

            document.getElementById('tenantDiv').style.display = 'none';
        }
    };





    var tryToSaveInvoice = function(){
        var invoiceForm = document.getElementsByName('invoice_form');

        let documentType = document.getElementsByName('document_type');

        // if(documentType[0].checked === false && documentType[1].checked === false){
        //     return false;
        // }

        let serviceName = document.getElementById('serviceName');
        let servicePrice = document.getElementById('servicePrice');
        let serviceDescription = document.getElementById('serviceDescription');




        invoiceForm[0].submit();
    };



    var updateTotal = function(val){
        total = parseFloat(val);
        document.getElementById('amount').value = total;
    };

    var discountPaidAmount = function(val){
        let currentTotal = total;
        currentTotal = currentTotal - parseFloat(val);


        document.getElementById('amount').value = total;
        document.getElementById('remaining_amount').value = currentTotal;
    };




</script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting/Resources/views/invoices/partials/_edit.blade.php ENDPATH**/ ?>