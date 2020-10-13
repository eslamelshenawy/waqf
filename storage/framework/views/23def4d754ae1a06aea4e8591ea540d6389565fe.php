<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container">
            <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <section class="heading">
                <div class="container">
                    <div class="heading__body old-requests">
                        <h1>  <?php echo e(__('الميزانيه')); ?></h1>
                        <span class="line"></span>
                    </div>
                </div>
            </section>

       <div class="search-results_details" id="advance_added">
           <div class="row">
               <div class="col-md-9">
                   <div class="search_info">
                       <?php $balances = app('\App\orderBalance'); ?>
                       <div class="row">
                           <div class="col-md-12">
                               <div class="search-results__action">
                                   <!-- Button trigger modal -->
                                       <div class="form-group">
                                           <?php if($balances->get()->isEmpty()): ?>
                                           <button type="button" class="btn btn-primary" id="orderButton" style="display: block;" data-toggle="modal" data-target="#exampleModal">
                                               طلب الميزانيه
                                           </button>
                                    <?php else: ?>
                                               <?php if(!$balances->where('is_accepted',true)->get()->isNotEmpty()): ?>

                                               <div class="alert alert-warning" role="alert" id="alertOrder" >
                                               تم تقديم الطلب وفى حالة موافقة الاداره سيظهر لك الملف
                                           </div>
                                               <?php else: ?>
                                                   <div class="alert alert-success" role="alert" id="alertOrder" >
                                                       تم  موافقة الاداره سيظهر لك الملف
                                                   </div>
                                               <?php endif; ?>
                                           <?php endif; ?>
                                               <div class="alert alert-warning" role="alert" id="alertOrder" style="display: none ;">
                                                   تم تقديم الطلب وفى حالة موافقة الاداره سيظهر لك الملف
                                               </div>

                                       </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
            <?php if($balances->where('is_accepted',true)->get()->isNotEmpty()): ?>
   <div class="search-results_details">
       <div class="row">
           <div class="col-md-9">
               <div class="search_info">

                                   <iframe src="<?php echo e(url('pdf/BalanceSheet.pdf')); ?>" width="100%" height="600"></iframe>


               </div>
           </div>
       </div>
   </div>
                <?php endif; ?>
</div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripting...'); ?>
<script>
</script>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/users/balance.blade.php ENDPATH**/ ?>