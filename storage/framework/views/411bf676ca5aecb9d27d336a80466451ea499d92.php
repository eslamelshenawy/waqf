<?php $__env->startSection('content'); ?>

    <section class="tenants">
        <div class="container" id="tenantContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4>إنشاء سند قبض</h4><br></div>
                            <hr>

                            <form class="needs-validation" novalidate method="POST"
                                  action="<?php echo e(route('Accounting::vouchers.receipts.store')); ?>" autocomplete="off"
                                  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12" id="voucher">
                                        <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">
                                            <select class="form-control <?php $__errorArgs = ['voucher_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="voucher_type" name="voucher_type">
                                                <option selected disabled> أختر نوع سند القبض</option>
                                                <option value="سند داخلى">سند قبض داخلى</option>
                                                <option value="سند خارجى">سند قبض خارجى</option>
                                            </select>
                                        </div>
                                        <?php $__errorArgs = ['voucher_type'];
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


                                <div style="display: none;" id="voucher_in">

                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="">رقم السند</label>
                                            <input type="text" name="number_voucher_in" value="<?php echo e(mt_rand(1000,9999)); ?>"
                                                   readonly
                                                   class="form-control <?php $__errorArgs = ['number_voucher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['number_voucher'];
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
                                                <label for="order-datepicker">التاريخ</label>
                                                <input id="order-datepicker"
                                                       class="form-control text-right <?php $__errorArgs = ['date_voucher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       placeholder="yyyy-mm-dd" name="date_voucher_in">
                                                <?php $__errorArgs = ['date_voucher'];
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


                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            اسم المودع
                                        </label>
                                        <select class="Name_user form-control select2" style=" width: 50%;"
                                                name="user_id_in">

                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            الحساب الخاص بالمستلم
                                        </label>
                                        <select class=" form-control select2" style=" width: 50%;"
                                                name="account_idAttributable_in">
                                            <?php $__currentLoopData = \Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> && <?php echo e($account->code); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>

                                    <div class="col-md-6" id="paymentModeDiv">
                                        <label class="d-block text-12 text-muted"><?php echo e(__('accounting::_.receipt_type')); ?></label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" class="form-control" name="payment_mode_in"
                                                       value="Fund" id="paymentModeFund"
                                                       onchange="determinePaymentMode(this.value)">
                                                <span><?php echo e(__('accounting::_.fund')); ?></span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio"
                                                       class="form-control <?php $__errorArgs = ['payment_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       name="payment_mode_in" value="Bank" id="paymentModeBank"
                                                       onchange="determinePaymentMode(this.value)">
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

                                    <hr>
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
unset($__errorArgs, $__bag); ?>"
                                                            name="fund_id_in" id="fund_id">
                                                        <option disabled
                                                                selected><?php echo e(__('accounting::_.fund_', ['something' => __('shared::actions.select')])); ?></option>
                                                        <?php $__currentLoopData = \Modules\Accounting\Entities\Account::whereIn('id',[21,22])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($fund->id); ?>"
                                                                    balance="<?php echo e($fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))); ?>"><?php echo e($fund->name); ?> &&
                                                                الرصيد <?php echo e($fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))); ?>  </option>
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
unset($__errorArgs, $__bag); ?>"
                                                            name="bank_id_in" id="bank_id_in">
                                                        <option disabled selected>
                                                            <?php echo e(__('accounting::_.bank_', ['something' => __('shared::actions.select')])); ?>

                                                        </option>
                                                        <?php $__currentLoopData = \Modules\Accounting\Entities\Account::whereIn('id',[25,26])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($bank->id); ?>"
                                                                    balance_in_bank="<?php echo e($bank->debit - ($bank->credit >0 ? $bank->credit : (-1* $bank->credit))); ?>"><?php echo e($bank->name); ?></option>
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
                                    <div class="col-md-6 mb-2" id="checke_num" style="display: none;">
                                        <label for="checke_num">رقم الشيك/ الحواله </label>
                                        <input type="text" name="checke_num_in" class="form-control" id="checke_num"/>
                                        <?php $__errorArgs = ['checke_num'];
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

                                    <div class="col-sm-4 form-group mb-3 pl-0" style="display: none;" id="date_Due">
                                        <div class="form-group mb-3">
                                            <label for="order-datepicker2">تاريخ استحقاق الشيك</label>
                                            <input id="order-datepicker2"
                                                   class="form-control text-right <?php $__errorArgs = ['date_Due'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   placeholder="yyyy-mm-dd" name="date_Due_in">
                                            <?php $__errorArgs = ['date_Due'];
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

                                    <div class="col-md-12" id="amounts" style="display: none;">

                                        <div class="invoice-summary invoice-summary-input float-right">

                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>الرصيد</td>
                                                    <td colspan="2">
                                                        <input type="text" id="amount" name="amount_in"
                                                               class="form-control small-input mb-1 <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td> المبلغ المستلم</td>
                                                    <td><input type="text" id="paid_amount" name="paid_amount_in"
                                                               class="form-control small-input mb-1 <?php $__errorArgs = ['paid_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               value="0"
                                                               onblur="if(this.value !== 0 || this.value !== null ){discountPaidAmount(this.value)}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo e(__('accounting::_.after_amount')); ?></td>
                                                    <td><input type="text"
                                                               id="remaining_amount" name="remaining_amount_in"
                                                               class="form-control small-input mb-1 <?php $__errorArgs = ['remaining_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               value="0" readonly></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-2">
                                        <label for="user_give">مسئول القبض </label>
                                        <input type="text" name="user_give" class="form-control"
                                               value="<?php echo e(Auth::user()->name); ?>" id="user_give" disabled/>
                                        <?php $__errorArgs = ['user_give'];
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

                                    <div class="form-row">
                                        <div class="col-md-6 mb-2">
                                            <label for="amount">بيان القبض</label>
                                            <textarea type="text" name="description_in" class="form-control"
                                                      id="description"></textarea>
                                            <?php $__errorArgs = ['description'];
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

                                <div style="display: none;" id="voucher_out">

                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="">رقم السند</label>
                                            <input type="text" name="number_voucher_out" value="<?php echo e(mt_rand(1000,9999)); ?>"
                                                   readonly
                                                   class="form-control <?php $__errorArgs = ['number_voucher_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['number_voucher_out'];
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
                                                <label for="order-datepicker1">التاريخ</label>
                                                <input id="order-datepicker1"
                                                       class="form-control text-right <?php $__errorArgs = ['date_voucher_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       placeholder="yyyy-mm-dd" name="date_voucher_out">
                                                <?php $__errorArgs = ['date_voucher_out'];
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


                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            اسم المودع
                                        </label>
                                        <select class="Name_tenant_out form-control select2" style=" width: 50%;"
                                                name="user_id_out">

                                        </select>
                                        <!-- Button trigger modal -->





                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            الحساب الخاص بالمستلم
                                        </label>
                                        <select class=" form-control select2" style=" width: 50%;"
                                                name="account_idAttributable_out">
                                            <?php $__currentLoopData = \Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> && <?php echo e($account->code); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>

                                    <div class="col-md-6" id="paymentModeDiv">
                                        <label class="d-block text-12 text-muted"><?php echo e(__('accounting::_.receipt_type')); ?></label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" class="form-control" name="payment_mode_out"
                                                       value="Fund" id="paymentModeFund"
                                                       onchange="determinePaymentMode_out(this.value)">
                                                <span><?php echo e(__('accounting::_.fund')); ?></span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio"
                                                       class="form-control <?php $__errorArgs = ['payment_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       name="payment_mode_out" value="Bank" id="paymentModeBank"
                                                       onchange="determinePaymentMode_out(this.value)">
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

                                    <hr>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <div style="display: none" id="fundDiv_out">
                                                <h5 class="font-weight-bold"><?php echo e(__('accounting::_.fund')); ?></h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <select class="form-control <?php $__errorArgs = ['fund_id_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="fund_id_out" id="fund_id_out">
                                                        <option disabled
                                                                selected><?php echo e(__('accounting::_.fund_', ['something' => __('shared::actions.select')])); ?></option>
                                                        <?php $__currentLoopData = \Modules\Accounting\Entities\Account::whereIn('id',[21,22])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($fund->id); ?>"
                                                                    balance="<?php echo e($fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))); ?>"><?php echo e($fund->name); ?> &&
                                                                الرصيد <?php echo e($fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))); ?>  </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <?php $__errorArgs = ['fund_id_out'];
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
                                            <div id="bankDiv_out" style="display: none;">
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
unset($__errorArgs, $__bag); ?>"
                                                            name="bank_id_out" id="bank_id_out">
                                                        <option disabled selected>
                                                            <?php echo e(__('accounting::_.bank_', ['something' => __('shared::actions.select')])); ?>

                                                        </option>
                                                        <?php $__currentLoopData = \Modules\Accounting\Entities\Account::whereIn('id',[25,26])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($bank->id); ?>"
                                                                    balance_bank="<?php echo e($bank->debit - ($bank->credit >0 ? $bank->credit : (-1* $bank->credit))); ?>"><?php echo e($bank->name); ?></option>
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
                                    <div class="col-md-6 mb-2" id="checke_num_out" style="display: none;">
                                        <label for="checke_num_out">رقم الشيك/ الحواله </label>
                                        <input type="text" name="checke_num_out" class="form-control" id="checke_num_out"/>
                                        <?php $__errorArgs = ['checke_num_out'];
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

                                    <div class="col-sm-4 form-group mb-3 pl-0" style="display: none;" id="date_Due_out">
                                        <div class="form-group mb-3">
                                            <label for="order-datepicker3">تاريخ استحقاق الشيك</label>
                                            <input id="order-datepicker3"
                                                   class="form-control text-right <?php $__errorArgs = ['date_Due_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   placeholder="yyyy-mm-dd" name="date_Due_out">
                                            <?php $__errorArgs = ['date_Due_out'];
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

                                    <div class="col-md-12" id="amounts_out" style="display: none;">

                                        <div class="invoice-summary invoice-summary-input float-right">

                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>الرصيد</td>
                                                    <td colspan="2">
                                                        <input type="text" id="amount_out" name="amount_out"
                                                               class="form-control small-input mb-1 <?php $__errorArgs = ['amount_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ المستلم  </td>
                                                    <td><input type="text" id="paid_amount" name="paid_amount_out"
                                                               class="form-control small-input mb-1 <?php $__errorArgs = ['paid_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               value="0"
                                                               onblur="if(this.value !== 0 || this.value !== null ){discountPaidAmount(this.value)}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo e(__('accounting::_.after_amount')); ?></td>
                                                    <td><input type="text"
                                                               id="remaining_amount_out" name="remaining_amount_out"
                                                               class="form-control small-input mb-1 <?php $__errorArgs = ['remaining_amount_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               value="0" readonly></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-2">
                                        <label for="user_give">مسئول القبض </label>
                                        <input type="text" name="user_give" class="form-control"
                                               value="<?php echo e(Auth::user()->name); ?>" id="user_give" disabled/>
                                        <?php $__errorArgs = ['user_give'];
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

                                    <div class="form-row">
                                        <div class="col-md-6 mb-2">
                                            <label for="amount">بيان القبض</label>
                                            <textarea type="text" name="description_out" class="form-control"
                                                      id="description"></textarea>
                                            <?php $__errorArgs = ['description'];
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

                                <button type="submit" id="once_submit" class="btn btn-raised btn-raised-primary btn-rounded m-1 mt-3">
                                    Create
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة مستلم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="">الاسم</label>
                            <input type="text" name="name_voucher" value="" id="name_voucher"
                                   class="form-control <?php $__errorArgs = ['name_voucher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                            <?php $__errorArgs = ['name_voucher'];
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
                        <div class="col-md-6 mb-2">
                            <label for="">الايميل</label>
                            <input type="text" name="email_voucher" value="" id="email_voucher"
                                   class="form-control <?php $__errorArgs = ['email_voucher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                            <?php $__errorArgs = ['email_voucher'];
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
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="">رقم الجوال</label>
                            <input type="number" name="mobile_voucher" value="" id="mobile_voucher"
                                   class="form-control <?php $__errorArgs = ['mobile_voucher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                            <?php $__errorArgs = ['mobile_voucher'];
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
                        <div class="col-md-6 mb-2">
                            <label for="">نوع المستلم </label>
                            <select type="text" name="voucher_user_type" id="voucher_user_type">
                                <option value="">اخنر نوع الموبيل </option>
                                <option value="مورد"> مورد</option>
                                <option value="خدمات"> خدمات </option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit_data">Save</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripting...'); ?>

    <script>

        $(document).ready(function () {
            $('#fund_id').on('change', function () {
                var option = $('option:selected', this).attr('balance');
                document.getElementById("amount").value = option;
                var total = option;
            });
            $('#bank_id_in').on('change', function () {
                var option = $('option:selected', this).attr('balance_in_bank');
                document.getElementById("amount").value = option;
                var total = option;
            });
            $('#fund_id_out').on('change', function () {
                var option = $('option:selected', this).attr('balance');
                document.getElementById("amount_out").value = option;
                var total = option;
            });
            $('#bank_id_out').on('change', function () {
                var option = $('option:selected', this).attr('balance_bank');
                document.getElementById("amount_out").value = option;
                var total = option;
            });
            $('#voucher_type').on('change', function () {
                if (this.value == "سند داخلى") {
                    document.getElementById('voucher_in').style.display = 'block';
                    document.getElementById('voucher_out').style.display = 'none';
                } else {
                    document.getElementById('voucher_out').style.display = 'block';
                    document.getElementById('voucher_in').style.display = 'none';
                }
            });
        });


        var determinePaymentMode = function (val) {
            if (val === 'Fund') {
                document.getElementById('fundDiv').style.display = 'block';
                document.getElementById('amounts').style.display = 'block';
                document.getElementById('bankDiv').style.display = 'none';
                document.getElementById('checke_num').style.display = 'none';
                document.getElementById('date_Due').style.display = 'none';

            } else if (val === 'Bank') {
                document.getElementById('bankDiv').style.display = 'block';
                document.getElementById('checke_num').style.display = 'block';
                document.getElementById('date_Due').style.display = 'block';
                document.getElementById('fundDiv').style.display = 'none';
                document.getElementById('amounts').style.display = 'block';
            } else {
                document.getElementById('fundDiv').style.display = 'none';
                document.getElementById('fundDiv').value = null;
                document.getElementById('fundDiv').setAttribute('value', null);
                document.getElementById('bankDiv').style.display = 'none';
                document.getElementById('fundDiv').style.display = 'none';
            }
        };
        var determinePaymentMode_out = function (val) {
            if (val === 'Fund') {
                document.getElementById('fundDiv_out').style.display = 'block';
                document.getElementById('amounts_out').style.display = 'block';
                document.getElementById('bankDiv_out').style.display = 'none';
                document.getElementById('checke_num_out').style.display = 'none';
                document.getElementById('date_Due_out').style.display = 'none';

            } else if (val === 'Bank') {
                document.getElementById('bankDiv_out').style.display = 'block';
                document.getElementById('checke_num_out').style.display = 'block';
                document.getElementById('date_Due_out').style.display = 'block';
                document.getElementById('fundDiv_out').style.display = 'none';
                document.getElementById('amounts_out').style.display = 'block';
            } else {
                document.getElementById('fundDiv_out').style.display = 'none';
                document.getElementById('fundDiv_out').value = null;
                document.getElementById('fundDiv_out').setAttribute('value', null);
                document.getElementById('bankDiv_out').style.display = 'none';
                document.getElementById('fundDiv_out').style.display = 'none';
            }
        };


        var discountPaidAmount = function (val) {
            let currentTotal = document.getElementById("amount").value;
            let currentTotal_out = document.getElementById("amount_out").value;
            currentTotal =  Number(currentTotal) + Number(parseFloat(val)) ;
            currentTotal_out = Number(currentTotal_out) + Number(parseFloat(val));


            document.getElementById('amount_out').value;
            document.getElementById('remaining_amount').value = currentTotal;
            document.getElementById('remaining_amount_out').value = currentTotal_out;
        };

        $(document).ready(function () {
            $("#order-datepicker1").pickadate();
            $("#order-datepicker2").pickadate();
            $("#order-datepicker3").pickadate();
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Accounting\Resources/views/vouchers/receipts/create.blade.php ENDPATH**/ ?>