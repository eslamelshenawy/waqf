<?php $__env->startSection('content'); ?>
<?php $Voucher = app('\Modules\Accounting\Entities\Voucher'); ?>
<?php
$count = $Voucher->where('document_type','Payment')->count();
?>

    <section class="tenants">
        <div class="container" id="tenantContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4>إنشاء سند صرف</h4><br></div>
                            <hr>

                            <form class="needs-validation" novalidate method="POST"
                                  action="<?php echo e(route('Accounting::vouchers.payments.store')); ?>" autocomplete="off"
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
                                                <option selected disabled> أختر نوع سند الصرف</option>
                                               <option value="سند داخلى" <?php echo e(old('voucher_type') == "سند داخلى" ? "selected" : ""); ?>>سند صرف داخلى</option>
<option value="سند خارجى" <?php echo e(old('voucher_type') == "سند خارجى" ? "selected" : ""); ?>>سند صرف خارجى</option>

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


                                <div style="display: <?php echo e(old('voucher_type') == "سند داخلى" ? 'block' : 'none'); ?> " id="voucher_in">

                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="">رقم السند</label>
                                            <input type="text" name="number_voucher_in" value="<?php echo e(++$count); ?>"
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
                                                       class="form-control text-right <?php $__errorArgs = ['date_voucher_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       placeholder="yyyy-mm-dd" name="date_voucher_in" value="<?php echo e(old('date_voucher_in')); ?>">
                                                <?php $__errorArgs = ['date_voucher_in'];
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
                                            اسم المستلم
                                        </label>
                                        <select class="Name_user form-control select2  <?php $__errorArgs = ['user_id_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style=" width: 50%;"
                                                name="user_id_in">
                                             <?php if(old("user_id_in")): ?>
                                            <?php $__currentLoopData = \App\Beneficiary::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficiary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($beneficiary->id); ?>"
                                                         <?php echo e(old("user_id_in")  ==  $beneficiary->id  ? "selected" : ""); ?>><?php echo e($beneficiary->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                         <?php $__errorArgs = ['user_id_in'];
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
                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            الحساب الخاص بالمستلم
                                        </label>
                                        <select class=" form-control select2   <?php $__errorArgs = ['account_idAttributable_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style=" width: 50%;"
                                                name="account_idAttributable_in">
                                            <option ></option>
                                            <?php $__currentLoopData = \Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($account->id); ?>" <?php echo e(old('account_idAttributable_in') == $account->id ? 'selected' : ''); ?>><?php echo e($account->name); ?> && <?php echo e($account->code); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                         <?php $__errorArgs = ['account_idAttributable_in'];
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

                                    <div class="col-md-6" id="paymentModeDiv">
                                        <label class="d-block text-12 text-muted"><?php echo e(__('accounting::_.payment_mode')); ?></label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" class="form-control <?php $__errorArgs = ['payment_mode_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="payment_mode_in"
                                                       value="Fund" id="paymentModeFund"
                                                       onchange="determinePaymentMode(this.value)" <?php echo e(old('payment_mode_in') == "Fund" ? "checked" : ""); ?>>
                                                <span><?php echo e(__('accounting::_.fund')); ?></span>
                                                <span class="checkmark"></span>
                                                 <?php $__errorArgs = ['payment_mode_in'];
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
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio"
                                                       class="form-control <?php $__errorArgs = ['paymentModeBank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       name="payment_mode_in" value="Bank" id="paymentModeBank"
                                                       onchange="determinePaymentMode(this.value)" <?php echo e(old('payment_mode_in') == "Bank" ? "checked" : ""); ?>>
                                                <span><?php echo e(__('accounting::_.bank')); ?></span>
                                                <span class="checkmark"></span>
                                                 <?php $__errorArgs = ['payment_mode_in'];
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
                                            <div style="display: <?php echo e(old('payment_mode_in') == 'Fund' ? 'block' : 'none'); ?>" id="fundDiv">
                                                <h5 class="font-weight-bold"><?php echo e(__('accounting::_.fund_', ['something' => __('shared::actions.select')])); ?></h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                
                                                    <select class="form-control <?php $__errorArgs = ['fund_id_in'];
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
                                                            <option value="<?php echo e($fund->id); ?>" <?php echo e(old('fund_id_in') == $fund->id ? 'selected' : ''); ?>

                                                                    balance="<?php echo e($fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))); ?>"><?php echo e($fund->name); ?> &&
                                                                الرصيد <?php echo e($fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))); ?>  </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <?php $__errorArgs = ['fund_id_in'];
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
                                            <div id="bankDiv" style="display: <?php echo e(old('payment_mode_in') == 'Bank' ? 'block' : 'none'); ?>">
                                                <h5 class="font-weight-bold">
                                                    <?php echo e(__('accounting::_.bank')); ?></h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <select class="form-control <?php $__errorArgs = ['bank_id_in'];
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
                                                            <option value="<?php echo e($bank->id); ?>" <?php echo e(old('fund_id_in') == $bank->id ? 'selected' : ''); ?>

                                                                    balance_in_bank="<?php echo e($bank->debit - ($bank->credit >0 ? $bank->credit : (-1* $bank->credit))); ?>"><?php echo e($bank->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <?php $__errorArgs = ['bank_id_in'];
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
                                    <div class="col-md-6 mb-2" id="checke_num" style="display: <?php echo e(old('payment_mode_in') == 'Bank' ? 'block' : 'none'); ?>">
                                        <label for="checke_num">رقم الشيك/ الحواله </label>
                                        <input type="text" name="checke_num_in" maxlength="25" value="<?php echo e(old('checke_num_in')); ?>" class="form-control <?php $__errorArgs = ['checke_num_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="checke_num"/>
                                        <?php $__errorArgs = ['checke_num_in'];
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

                                    <div class="col-sm-4 form-group mb-3 pl-0" style="display: <?php echo e(old('payment_mode_in') == 'Bank' ? 'block' : 'none'); ?>" id="date_Due">
                                        <div class="form-group mb-3">
                                            <label for="order-datepicker2">تاريخ استحقاق الشيك</label>
                                            <input id="order-datepicker2"
                                                   class="form-control  <?php $__errorArgs = ['date_Due_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   placeholder="yyyy-mm-dd" name="date_Due_in" value="<?php echo e(old('date_Due_in')); ?>">
                                            <?php $__errorArgs = ['date_Due_in'];
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

                                    <div class="col-md-12" id="amounts" style="display:<?php echo e(old('payment_mode_in') == 'Fund' || old('payment_mode_in') == 'Bank' ? 'block' :  'none'); ?>">

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
                                                    <td><?php echo e(__('accounting::_.paid_amount')); ?></td>
                                                    <div class="alert alert-warning" role="alert" id="danger_number_in" style="display:none;" >
                                                        المبلغ المدفوع اكبر من المبلغ المتاح
                                                    </div>
                                                    <td><input type="text" id="paid_amount_in" name="paid_amount_in"
                                                               class="form-control small-input mb-1 <?php $__errorArgs = ['paid_amount_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               value=""
                                                               onblur="if(this.value !== 0 || this.value !== null ){discountPaidAmount(this.value)}">
                                                                 <?php $__errorArgs = ['paid_amount_in'];
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
                                                <tr>
                                                    <td><?php echo e(__('accounting::_.remaining_amount')); ?></td>
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
                                        <label for="user_give">مسئول الصرف </label>
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
                                            <label for="amount">بيان الصرف</label>
                                            <textarea type="text" name="description_in"  class="form-control <?php $__errorArgs = ['description_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                      id="description"><?php echo e(old('description_in')); ?></textarea>
                                            <?php $__errorArgs = ['description_in'];
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

                                <div style="display: <?php echo e(old('voucher_type') == "سند خارجى" ? 'block' : 'none'); ?>" id="voucher_out">

                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="">رقم السند</label>
                                            <input type="text" name="number_voucher_out" value="<?php echo e(++$count); ?>"
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
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       placeholder="yyyy-mm-dd" name="date_voucher_out" value="<?php echo e(old('date_voucher_out')); ?>">
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
                                            اسم المستلم
                                        </label>
                                        <select class="Name_user_out form-control select2 <?php $__errorArgs = ['user_id_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style=" width: 50%;"
                                                name="user_id_out">
                                            <?php if(old("user_id_out")): ?>
                                                 <?php $__currentLoopData = \App\Beneficiary::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficiary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($beneficiary->id); ?>"
                                                         <?php echo e(old("user_id_out")  ==  $beneficiary->id  ? "selected" : ""); ?>><?php echo e($beneficiary->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php $__errorArgs = ['user_id_out'];
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
                                                
                                                 <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                            &plus; add
                                        </button>
                                        <div class="form-group col-md-12">
                                            <label for="user_id">
                                                الحساب الخاص بالمستلم
                                            </label>
                                            <select class=" form-control select2 <?php $__errorArgs = ['account_idAttributable_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style=" width: 50%;"
                                                    name="account_idAttributable_out">
                                                <?php $__currentLoopData = \Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($account->id); ?>" <?php echo e(old('account_idAttributable_out') == $account->id ? 'selected' : ''); ?>><?php echo e($account->name); ?> && <?php echo e($account->code); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                             <?php $__errorArgs = ['account_idAttributable_out'];
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

                                    <div class="col-md-6" id="paymentModeDiv">
                                        <label class="d-block text-12 text-muted"><?php echo e(__('accounting::_.payment_mode')); ?></label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" class="form-control <?php $__errorArgs = ['payment_mode_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"" name="payment_mode_out"
                                                       value="Fund" id="paymentModeFund"
                                                       onchange="determinePaymentMode_out(this.value)" <?php echo e(old('payment_mode_out') == 'Fund' ? 'checked' : ''); ?>>
                                                <span><?php echo e(__('accounting::_.fund')); ?></span>
                                                <span class="checkmark"></span>
                                            
                                                <?php $__errorArgs = ['payment_mode_out'];
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
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio"
                                                       class="form-control <?php $__errorArgs = ['payment_mode_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>""
                                                       name="payment_mode_out" value="Bank" id="paymentModeBank"
                                                       onchange="determinePaymentMode_out(this.value)" <?php echo e(old('payment_mode_out') == 'Bank' ? 'checked' : ''); ?>>
                                                <span><?php echo e(__('accounting::_.bank')); ?></span>
                                                <span class="checkmark"></span>
                                                <?php $__errorArgs = ['payment_mode_out'];
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
                                            <div style="display: <?php echo e(old('payment_mode_out') == 'Fund' ? 'block' : 'none'); ?>" id="fundDiv_out">
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
                                                            <option value="<?php echo e($fund->id); ?>" <?php echo e(old('fund_id_out') == $fund->id ? 'selected' : ''); ?>

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
                                            <div id="bankDiv_out" style="display: <?php echo e(old('payment_mode_out') == 'Bank' ? 'block' : 'none'); ?>">
                                                <h5 class="font-weight-bold">
                                                    <?php echo e(__('accounting::_.bank')); ?></h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <select class="form-control <?php $__errorArgs = ['bank_id_out'];
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
                                                            <option value="<?php echo e($bank->id); ?>" <?php echo e(old('bank_id_out') == $bank->id ? 'selected' : ''); ?>

                                                                    balance_bank="<?php echo e($bank->debit - ($bank->credit >0 ? $bank->credit : (-1* $bank->credit))); ?>"><?php echo e($bank->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <?php $__errorArgs = ['bank_id_out'];
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
                                    <div class="col-md-6 mb-2" id="checke_num_out" style="display: <?php echo e(old('payment_mode_out') == 'Bank' ? 'block' : 'none'); ?>">
                                        <label for="checke_num_out">رقم الشيك/ الحواله </label>
                                        <input type="text" name="checke_num_out" value="<?php echo e(old('checke_num_out')); ?>" maxlength="24"class="form-control <?php $__errorArgs = ['checke_num_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="checke_num_out"/>
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

                                    <div class="col-sm-4 form-group mb-3 pl-0" style="display: <?php echo e(old('payment_mode_out') == 'Bank' ? 'block' : 'none'); ?>" id="date_Due_out">
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
                                                   placeholder="yyyy-mm-dd" name="date_Due_out" value="<?php echo e(old('date_Due_out')); ?>">
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

                                    <div class="col-md-12" id="amounts_out" style="display: <?php echo e(old('payment_mode_out') == 'Fund' || old('payment_mode_out') == 'Bank' ? 'block' :  'none'); ?>">

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
                                                    <td><?php echo e(__('accounting::_.paid_amount')); ?></td>
                                                    <div class="alert alert-warning" role="alert" id="danger_number_out" style="display:none;" >
                                                        المبلغ المدفوع اكبر من المبلغ المتاح
                                                    </div>
                                                    <td><input type="text" id="paid_amount_out" name="paid_amount_out"
                                                               class="form-control small-input mb-1 <?php $__errorArgs = ['paid_amount_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               value=""
                                                               onblur="if(this.value !== 0 || this.value !== null ){discountPaidAmount(this.value)}">
                                                               <?php $__errorArgs = ['paid_amount_out'];
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
                                                <tr>
                                                    <td><?php echo e(__('accounting::_.remaining_amount')); ?></td>
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
                                        <label for="user_give">مسئول الصرف </label>
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
                                            <label for="amount">بيان الصرف</label>
                                            <textarea type="text" name="description_out" class="form-control <?php $__errorArgs = ['description_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                      id="description"><?php echo e(old('description_out')); ?></textarea>
                                            <?php $__errorArgs = ['description_out'];
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
                            <input type="text" name="mobile_voucher" value="" id="mobile_voucher" maxlength="10"
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
                                <option value="">اخنر نوع المستلم </option>
                                <option value="مورد"> مورد</option>
                                <option value="خدمات"> خدمات </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="identityNumber"><?php echo e(__('shared::commons.identity_number')); ?></label>
                        <input type="text"  maxlength="10"
                               class="field form-control <?php $__errorArgs = ['identity_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="identity_number"
                               value="<?php echo e(old('identity_number')); ?>" id="identityNumber"
                               placeholder="<?php echo e(__('shared::commons.identity_number')); ?>" maxlength="10">
                        <?php $__errorArgs = ['identity_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <span class="badge badge-danger"><?php echo e($errors->first('identity_number')); ?></span>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Start City Number -->
                    <div class="col-md-6 mb-6">
                        <?php $city = app('\App\City'); ?>
                        <label for="identity_number"><?php echo e(__('shared::commons.city')); ?></label>
                        <select class="form-control" name="city" id="city">
                            <?php $__currentLoopData = $city->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($c->name_en); ?>" <?php echo e(old('city') == $c->name_en  ? 'selected' : ''); ?>><?php echo e($c->name_ar); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['city'];
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
                    <!-- End City Number -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label><?php echo e(__('shared::commons.type')); ?></label>
                        </div>
                        <div class="col-md-6">
                            <input type="radio" name="type" value="person" id="type"
                            class="form-check-inline float-left mr-2 mt-1 agency-type" id="person" />
                            <label class="badge badge-outline-primary p-2"><?php echo e(__('shared::users.person')); ?></label>
                        </div>
                        <div class="col-md-6">
                            <input type="radio" name="type" value="agency" id="type"
                            class="form-check-inline float-left mr-2 mt-1 agency-type" id="agency" />
                            <label class="badge badge-outline-primary p-2"><?php echo e(__('shared::users.agency')); ?></label>
                        </div>
                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <span class="badge badge-danger"><?php echo e($errors->first('type')); ?></span>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
            document.getElementById("paid_amount_in").value ="";
            document.getElementById("paid_amount_out").value ="";
            $('#paid_amount_in').on('change', function () {
                var paid_amount=$(this).val();
                var amount=$('#amount').val();
                // alert(Number(paid_amount) > Number(amount));
                if(Number(paid_amount) > Number(amount) ){
                    document.getElementById("paid_amount_in").value =" ";
                    document.getElementById('danger_number_in').style.display = 'block';
                }else{
                    if(Number(paid_amount) == 0){
                                            document.getElementById("paid_amount_in").value =" ";
                    }
                    document.getElementById('danger_number_in').style.display = 'none';
                }
            });     
            
            $('#paid_amount_out').on('change', function () {
                var paid_amount=$(this).val();
                var amount=$('#amount').val();
                alert(Number(paid_amount) > Number(amount));
                if(Number(paid_amount) > Number(amount) ){
                    document.getElementById("paid_amount_out").value =" ";
                    document.getElementById('danger_number_out').style.display = 'block';
                }else{
                     if(Number(paid_amount) == 0){
                      document.getElementById("paid_amount_out").value =" ";
                    }
                    document.getElementById('danger_number_out').style.display = 'none';
                }
            });

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
            currentTotal = currentTotal - parseFloat(val);
            currentTotal_out = currentTotal_out - parseFloat(val);


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

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting/Resources/views/vouchers/payments/create.blade.php ENDPATH**/ ?>