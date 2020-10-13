<?php $__env->startSection('content'); ?>

    <!-- ============ Body content start ============= -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                
                
                

                
                
                
                

                
                <div class="card">

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                            <!--==== Edit Area =====-->
                            <div class="d-flex mb-5">
                                <span class="m-auto"></span>

                                <!--<button class="btn btn-raised btn-raised-primary btn-rounded-3 m-1" type="button" id="invoiceFormSaveBtn" onclick="tryToSaveInvoice()">-->
                                <!--    <i class="fas fa-save"></i> &nbsp;&nbsp;<?php echo e(__('shared::actions.save')); ?>-->
                                <!--</button>-->
                            </div>
                            <form method="POST" action="<?php echo e(route('Accounting::invoices.update', $invoice->id)); ?>" id="invoiceForm" name="invoice_form">
                                <?php echo csrf_field(); ?>

                                <div class="row justify-content-between">
                                    <div class="col-md-10">

                                        <h4 class="font-weight-bold"><?php echo e(__('accounting::_.invoice_', ['something' => __('accounting::_.info')])); ?></h4>


















                                        <div class="col-sm-4 form-group mb-3 pl-0">
                                            <label for="invoiceNumber"><?php echo e(__('accounting::_.invoice_', ['something' => 'رقم'])); ?></label>
                                            <input disabled type="text" name="order_number"  value="<?php echo e($invoice->order_number); ?>" class="form-control <?php $__errorArgs = ['order_number'];
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
                                            <input type="text" name="invoice_code"  value="<?php echo e($invoice->invoice_code); ?>" maxlength="8" class="form-control <?php $__errorArgs = ['invoice_code'];
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
                                                <input id="order-datepicker"value="<?php echo e($invoice->order_at); ?>"  class="form-control text-right <?php $__errorArgs = ['order_at'];
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
                                            <textarea class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="notes" id="notes"
                                                      placeholder="<?php echo e(__('accounting::_.notes')); ?>" rows="4" ><?php echo e($invoice->notes); ?></textarea>
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























                                    <div class="col-md-6" id="paymentModeDiv" style="display:none;">
                                        <label class="d-block text-12 text-muted"><?php echo e(__('accounting::_.payment_mode')); ?></label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" class="form-control" name="payment_mode" value="fund" <?php echo e($invoice->payment_mode == 'fund' ? 'checked' : ''); ?> id="paymentModeFund" onchange="determinePaymentMode(this.value)">
                                                <span><?php echo e(__('accounting::_.fund')); ?></span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio" class="form-control <?php $__errorArgs = ['payment_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="payment_mode" value="bank" <?php echo e($invoice->payment_mode == 'bank' ? 'checked' : ''); ?> id="paymentModeBank" onchange="determinePaymentMode(this.value)">
                                                <span><?php echo e(__('accounting::_.bank')); ?></span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <?php $__errorArgs = ['payment_mode'];
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
                                                        <option value="<?php echo e($fund->id); ?>" <?php echo e($invoice->account_id == $fund->id ? 'selected' : ''); ?>><?php echo e($fund->name); ?></option>
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
                                                        <option value="<?php echo e($bank->id); ?>" <?php echo e($invoice->account_id == $bank->id ? 'selected' : ''); ?>><?php echo e($bank->name); ?></option>
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
                                                    <option value="<?php echo e($tenant->id); ?>" <?php echo e($invoice->tenant_id == $tenant->id ? 'selected' : ''); ?>><?php echo e($tenant->name); ?></option>
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
                                            <textarea class="form-control text-right" placeholder="Bill From Address" name="description_invoice"> </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <?php $account = app('\Modules\Accounting\Entities\Account'); ?>
                                    <label for="type"><?php echo e(__('accounting::_.typefund')); ?></label>
                                    <select class="form-control <?php $__errorArgs = ['service_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="account_id" id="account_id" required>
                                        <option selected disabled><?php echo e(__('shared::actions.select')); ?></option>
                                        <?php $__currentLoopData = $account->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>" <?php echo e($invoice->account_id == $c->id ? 'selected' : ''); ?> ><?php echo e($c->name); ?>

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
                                            <?php $invoiceDetail = app('\Modules\Accounting\Entities\InvoiceDetail'); ?>
                                            <?php
                                            $invoiceDetails=$invoiceDetail->where('invoice_id',$invoice->id)->first();
                                            ?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <input name="service_name" type="text" value="<?php echo e($invoiceDetails->service_name); ?>" class="form-control <?php $__errorArgs = ['service_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
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
                                                    <input name="service_price" maxlength="5" type="text" class="form-control <?php $__errorArgs = ['service_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($invoiceDetails->service_price); ?>"
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




























                                </div>
                                <input type="submit" value="Submit">

                            </form>
                            <!--==== / Edit Area =====-->
                        </div>

                        <?php $__env->startSection('scripting...'); ?>
                            <script>
                                if ($('#documentTypeCredit').is(':checked')) {
                                    document.getElementById('tenantDiv').style.display = 'block';
                                }
                                if ($('#documentTypeCash').is(':checked')) {
                                    document.getElementById('paymentModeDiv').style.display = 'block';
                                    document.getElementById('tenantDiv').style.display = 'block';
                                }
                                if ($('#paymentModeFund').is(':checked')) {
                                    document.getElementById('fundDiv').style.display = 'block';
                                }
                                if ($('#paymentModeBank').is(':checked')) {
                                    document.getElementById('bankDiv').style.display = 'block';
                                }

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

                                        document.getElementById('tenantDiv').style.display = 'block';
                                    }
                                };





                                var tryToSaveInvoice = function(){
                                    var invoiceForm = document.getElementsByName('invoice_form');

                                    let documentType = document.getElementsByName('document_type');

                                    if(documentType[0].checked === false && documentType[1].checked === false){
                                        return false;
                                    }

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


                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- ============ Body content End ============= -->



<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripting...'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting/Resources/views/invoices/edit.blade.php ENDPATH**/ ?>