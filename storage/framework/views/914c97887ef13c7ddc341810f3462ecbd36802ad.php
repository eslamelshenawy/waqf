<?php echo $__env->make('shared::includes._md_', [], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container" id="app">
            <?php echo $__env->make('accounting::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(\Session::has('success')): ?>
                <div class="alert alert-success">
                    <ul>
                        <li><?php echo \Session::get('success'); ?></li>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="needs-validation" novalidate method="POST"
                      action="<?php echo e(url('en/accounting/accounts/create/journal')); ?>"
                      autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php
                $id =\Modules\Accounting\Entities\Journal::count();
               
                ?>
                    <div class="col-md-12">
                        <div class="card mb-8">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!-- Editable table -->
                                    <div class="card">
                                        <div class="card-body">
                                            <!--Grid column-->
                                            <div class="col-md-12">
                                                <label for="number"
                                                       class=""><?php echo e(__('accounting::_.journal_', ['something' => __('accounting::_.number')])); ?></label>

                                                <input type="number" id="number" name="number" class="form-control <?php $__errorArgs = ['user_id_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(++$id); ?>" disabled
                                                >
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
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-md-12">
                                                <label for="date" class=""><?php echo e(__('shared::commons.date_at')); ?></label>

                                                <input type="date" id="date_at" name="date_at" value="<?php echo e(old('date_at')); ?>"
                                                       class="form-control <?php $__errorArgs = ['date_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                        <?php $__errorArgs = ['date_at'];
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
                                            <!--Grid column-->
                                            <!--Grid column-->
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                                <label for="message"><?php echo e(__('shared::commons.details.it')); ?></label>

                                                <textarea type="text" id="message" name="message" rows="2"
                                                          class="form-control md-textarea <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('message')); ?></textarea>
                                            <?php $__errorArgs = ['message'];
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

                                            <div class="col-md-12">
                                            <div id="table" class="table-editable">
                                                <table id="tableB" class="table table-bordered table-responsive-md table-striped text-center">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center"><?php echo e(__('accounting::_.account')); ?></th>
                                                        <th class="text-center"><?php echo e(__('accounting::_.debit')); ?></th>
                                                        <th class="text-center"><?php echo e(__('accounting::_.credit')); ?></th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tableBody">
                                                    <tr>
                                                        <td class="pt-3-half" contenteditable="false">#</td>
                                                        <td class="pt-3-half" contenteditable="false">
                                                            <select class="custom-select custom-select-sm <?php $__errorArgs = ['account_id[0]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="account_id" name="account_id[0]">
                                                                <?php $__currentLoopData = \Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($account->id); ?>" <?php echo e(old('account_id[0]' == $account->id ? "selected" : "")); ?>><?php echo e($account->name); ?> && <?php echo e($account->code); ?></option>
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
                                                        </td>
                                                        <td class="pt-3-half" contenteditable="true">
                                                            <input id="debit" name="debit[0]" value="<?php echo e(old('debit[0]' ,0)); ?>" class="<?php $__errorArgs = ['debit[0]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   type="number"/>
 <?php $__errorArgs = ['debit[0]'];
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
                                                        <td class="pt-3-half " contenteditable="true">
                                                            <input id="credit"  name="credit[0]" value="<?php echo e(old('credit[0]' , 0)); ?>"  class="<?php $__errorArgs = ['credit[0]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number"/>
                                                             <?php $__errorArgs = ['credit[0]'];
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
                                                            <p class="<?php $__errorArgs = ['messageError'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="display: <?php $__errorArgs = ['messageError'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> block <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> none; ">
                                                                <div class="alert alert-danger <?php $__errorArgs = ['messageError'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" role="alert">
                                                                 يجب ان يكون القيد متزن 
                                                                 </div></p>
                                                         <?php $__errorArgs = ['messageError'];
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
                                                    
                                                    <?php if(old('account_id[1]')): ?>
                                                    
                                                    <tr>
                                                        <td contenteditable="false" class="pt-3-half">#</td>
                                                        <td contenteditable="false" class="pt-3-half">
                                                            <select class="custom-select custom-select-sm" name="account_id[1]"
                                                                                                              id="account_id">
                                                                <?php $__currentLoopData = \Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($account->id); ?>" <?php echo e(old('account_id[1]' == $account->id ? "selected" : "")); ?>><?php echo e($account->name); ?> && <?php echo e($account->code); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select></td>
                                                        <td contenteditable="true" class="pt-3-half"><input type="number" name="debit[1]" id="debit"></td>
                                                        <td contenteditable="true" class="pt-3-half"><input type="number" name="credit[1]" id="credit"></td>
                                                        <td><span class="table-remove"><button type="button"
                                                                                               class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light delete-row">إلغاء</button></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php endif; ?>
                                                    
                                                     <?php if(old('account_id[2]')): ?>
                                                    
                                                    <tr>
                                                        <td contenteditable="false" class="pt-3-half">#</td>
                                                        <td contenteditable="false" class="pt-3-half">
                                                            <select class="custom-select custom-select-sm" name="account_id[2]"
                                                                                                              id="account_id">
                                                                <?php $__currentLoopData = \Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($account->id); ?>" <?php echo e(old('account_id[0]' == $account->id ? "selected" : "")); ?>><?php echo e($account->name); ?> && <?php echo e($account->code); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select></td>
                                                        <td contenteditable="true" class="pt-3-half"><input type="number" name="debit[2]" id="debit"></td>
                                                        <td contenteditable="true" class="pt-3-half"><input type="number" name="credit[2]" id="credit"></td>
                                                        <td><span class="table-remove"><button type="button"
                                                                                               class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light delete-row">إلغاء</button></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php endif; ?>
                                                    
                                                    
                                                    
                                                    </tbody>
                                                </table>
                                                <span class="table-add float-left mb-3 mr-2">
                                                <a href="#!" class="text-success"  id="appendColumn"><i
                                                            class="fas fa-plus fa-2x" aria-hidden="true"></i></a>
                                            </span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Editable table -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <button class="btn btn-raised btn-raised-primary btn-sm" type="submit"
                                id="addAccount">Save <i class="fas fa-save ml-1"></i>
                        </button>
                    </div>

                    <!--Grid column-->
                </form>

        </div>
    </section>


    
    
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles...'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts...'); ?>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('styling...'); ?>
    <style>
        .pt-3-half {
            padding-top: 1.4rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripting...'); ?>
    

    <script>
        $(document).ready(function () {
            var i=0;
            $('#appendColumn').click(function () {
                i++;
                $('#tableB > tbody:last-child').append('<tr><td contenteditable="false" class="pt-3-half">#</td><td contenteditable="false" class="pt-3-half">' +
                    '<select class="custom-select custom-select-sm" name="account_id['+i+']" id="account_id">' +
                    '<?php $__currentLoopData = \Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>' +
                     '</select></td> <td contenteditable="true" class="pt-3-half">' +
                    '<input type="number" name="debit['+i+']" id="debit"></td> <td contenteditable="true" class="pt-3-half"><input type="number" name="credit['+i+']" id="credit"></td>' +
                    ' <td><span class="table-remove">' +
                    '<button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light delete-row">'
                    + 'إلغاء' +
                    '</button></span></td></tr>');

             });
            // Find and remove selected table rows
            $(document).delegate('.delete-row', 'click', function () {
                alert('fdfd');
                $(this).closest('tr').remove();
            });

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            

            

            

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting/Resources/views/journals/create.blade.php ENDPATH**/ ?>