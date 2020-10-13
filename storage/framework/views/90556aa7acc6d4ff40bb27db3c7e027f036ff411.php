<?php $__env->startSection('content'); ?>

    <!-- ============ Body content start ============= -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">











                <div class="card">

                    <div class="tab-content" id="myTabContent">
                        <?php echo $__env->make('accounting::invoices.partials._show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('accounting::invoices.partials._edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Accounting\Resources/views/invoices/create.blade.php ENDPATH**/ ?>