
<?php

    $check_advance= \App\Advance::where('beneficiary_id',\Auth::guard('beneficiary')->user()->id)->where(['is_accepted'=>0,'is_done'=>0])->get();
    $check_advance1= \App\Advance::where('beneficiary_id',\Auth::guard('beneficiary')->user()->id)->where(['is_accepted'=>1,'is_done'=>1])->get();
    $check_advance2= \App\Advance::where('beneficiary_id',\Auth::guard('beneficiary')->user()->id)->where(['is_accepted'=>1,'is_done'=>0])->get();
    $check_advance3= \App\Advance::where('beneficiary_id',\Auth::guard('beneficiary')->user()->id)->where(['is_accepted'=>2,'is_done'=>0])->get();

?>

<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container">
            <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <section class="heading">
                <div class="container">
                    <div class="heading__body old-requests">
                        <h1>  <?php echo e(__('shared::actions.advance')); ?></h1>
                        <span class="line"></span>
                    </div>
                </div>
            </section>
            <?php
            $arr=array();
            ?>
            <?php $__currentLoopData = $Advance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $advance1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(@$advance1->is_accepted == 0 && $advance1->is_done == 0 ): ?>
                    <?php
                        $arr[$key]=1;
                    ?>
                <?php endif; ?>
                <?php if(  @$advance1->is_accepted == 1 &&   $advance1->is_done == 0 ): ?>
                    <?php
                        $arr[$key]=2;
                    ?>
                <?php endif; ?>



            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(!$arr): ?>

                    <div class="search-results_details" id="advance_added">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="search_info">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="search-results__action">
                                                <!-- Button trigger modal -->
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        طلب سلفه
                                                    </button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


   <?php $__currentLoopData = $Advance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advance1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="search-results_details">
       <div class="row">
           <div class="col-md-9">
               <div class="search_info">

                   <div class="row">
                       <div class="col-md-12">
                           <div class="search-results__action">

                               <?php if(@$advance1->is_accepted == 0 && $advance1->is_done == 0 ): ?>

                                   <div class="alert alert-warning" role="alert">
                                       لازال هناك طلب تحت الاجراء لايمكن تقديم طلب اخر
                                   </div>
                                   <?php elseif(  @$advance1->is_accepted == 1 &&   $advance1->is_done == 0 ): ?>
                                   <div class="alert alert-warning" role="alert">
                                       لازال هناك طلب تحت الاجراء لايمكن تقديم طلب اخر
                                   </div>
                               <?php elseif( @$advance1->is_accepted == 2 &&   $advance1->is_done == 0  ): ?>
                                   <div class="alert alert-warning" role="alert">
                                      تم الاغلاق للطلب
                                   </div>

                               <?php else: ?>
                                   <div class="alert alert-warning" role="alert">
                                       تم الاغلاق للطلب
                                   </div>
                               <?php endif; ?>

                           </div>
                       </div>
                   </div>
                   <div class="search_info__details">
                       <ul>
                           <li>رقم الطلب:<p  class="alert alert-primary" role="alert"># <?php echo e(@$advance1->number_advance); ?></p></li>

                       </ul>
                       <ul>
                           <?php if(@$advance1->is_accepted == 1 && $advance1->is_done == 0 ): ?>
                                <li>حالة الطلب :  <p  class="alert alert-success" role="alert">تم الموافقه على الطلب</p> </li>
                              <?php elseif(@$advance1->is_accepted == 1 && $advance1->is_done == 1): ?>
                                <li>حالة الطلب :  <p  class="alert alert-success" role="alert"> تمت تسوية السلفه</p> </li>                               
                               <?php elseif(@$advance1->is_accepted == 2): ?>
                               <li>حالة الطلب : <p  class="alert alert-danger" role="alert">تم رفض الطلب </p> </li>
                               <?php else: ?>
                               <li>حالة الطلب :  <p  class="alert alert-info" role="alert">معلق</p> </li>
                           <?php endif; ?>
                       </ul>
                       <?php if(@$advance1->is_accepted == 2): ?>
                       <ul>
                           <li>سبب الرفض :<p  class="alert alert-info" role="alert"> <?php echo e(@$advance1->admin_commit); ?></p></li>
                       </ul>
                       <?php endif; ?>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">



       <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">طلب السلفه</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>


       <div class="modal-body">

           <div class="form-row">
               <div class="col-md-6 mb-2">
                   <label for="">المبلغ المطلوب </label>
                   <input type="text" name="number_advance" value="" maxlength="9"id="number_advance" class="form-control ">
               </div>
               <div class="col-md-6 mb-2">
                   <label for="">سبب الطلب</label>
                   <textarea type="text" name="reason_advance" value="" id="reason_advance" class="form-control ">

                   </textarea>
               </div>
           </div>

               <div class="form-group ">
                   <label for="order_datepicker_">تاريخ سداد المديونيه </label>
                   <input id="order_datepicker_"
                          class="form-control text-right <?php $__errorArgs = ['date_pay_advance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          placeholder="yyyy-mm-dd" name="date_pay_advance">
                   <?php $__errorArgs = ['date_pay_advance'];
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
       <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary" id="send_request">Save </button>
       </div>
   </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripting...'); ?>
<script>
</script>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/users/advance.blade.php ENDPATH**/ ?>