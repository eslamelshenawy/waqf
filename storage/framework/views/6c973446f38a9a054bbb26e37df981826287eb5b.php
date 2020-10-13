<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container">            <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section class="heading">
                <div class="container">
                    <div class="heading__body old-requests"><h1>  <?php echo e(__('الميزانيه')); ?></h1>
                        <span class="line"></span></div>
                </div>
            </section>
            <div class="search-results_details" id="advance_added">
                <div class="row">
                    <div class="col-md-9">
                        <div class="search_info">                      
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-results__action">
                                        <!-- Button trigger modal -->
                                        <div class="form-group">                                           <?php if(@$balances == null): ?>
                                                <button type="button" class="btn btn-primary" id="orderButton"
                                                        style="display: block;" data-toggle="modal"
                                                        data-target="#exampleModal"> طلب الميزانيه
                                                </button>                                    <?php else: ?>                                                <?php if(@$balances->is_accepted != true): ?>
                                                    <div class="alert alert-warning" role="alert" id="alertOrder"> تم
                                                        تقديم الطلب وفى حالة موافقة الاداره سيظهر لك الملف
                                                    </div>                                               <?php else: ?>
                                                    <div class="alert alert-success" role="alert" id="alertOrder"> تم
                                                        موافقة الاداره سيظهر لك الملف
                                                    </div>                                               <?php endif; ?>                                           <?php endif; ?>
                                            <div class="alert alert-warning" role="alert" id="alertOrder"
                                                 style="display: none ;"> تم تقديم الطلب وفى حالة موافقة الاداره سيظهر
                                                لك الملف
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> 
            <?php if(@$balances != null): ?>
            
            <?php if(@$balances->is_accepted == true): ?>
                <div class="search-results_details">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="search_info">

                                
                                <?php echo $__env->make('client::users.result', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?> <?php endif; ?>
                </div>
    </section>
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">



       <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">طلب الميزانيه</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>


       <div class="modal-body">

           <div class="form-row">
               <input type="hidden" id="user_id" value="<?php echo e(Auth::guard('beneficiary')->user()->id); ?>">

               <div class="col-md-12">
                   <label for="">سبب الطلب</label>
                   <textarea type="text" name="reason_advance" value="" id="reason" class="form-control ">

                   </textarea>
               </div>
           </div>

       </div>
       <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary" id="submit">Save </button>
       </div>
   </div>
</div>
</div>
    
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/users/balance.blade.php ENDPATH**/ ?>