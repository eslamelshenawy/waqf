<?php $__env->startSection('content'); ?>

<section class="roles-and-permissions">
    <div class="container">
        <?php echo $__env->make('accounting::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">

                    <h4 class="card-title mb-3">Manage Receipt Voucher</h4>

                    <div class="table-responsive">
                            <table class="display table table-striped table-bordered dataTable" id="alternative_pagination_table" style="width:100%">
                            <caption>
                                
                            </caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">رقم السند </th>
                                        <th scope="col">النوع</th>
                                        <th scope="col">المبلغ المستلم </th>
                                        <th scope="col">تاريخ السند </th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $fund=\Modules\Accounting\Entities\Fund::with('account')->find($voucher->paymentable_id);
                                    ?>
                                    <tr>
                                                <th scope="row"><?php echo e(++$key); ?></th>
                                                <td><?php echo e($voucher->number); ?></td>
                                                <td><?php echo e($voucher->document_type); ?></td>
                                                <td><?php echo e($voucher->paid_amount); ?></td>
                                                <td><?php echo e($voucher->date); ?></td>
                                                <td>
                                                    <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update vouchers')): ?>
                                                        <a href="<?php echo e(route('Accounting::vouchers.receipts.edit', $voucher->id)); ?>" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('create vouchers')): ?>
                            <a class="btn btn-raised btn-raised-primary btn-rounded m-1" href="<?php echo e(route('Accounting::vouchers.receipts.create')); ?>">&plus; add</a>
                        <?php endif; ?>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripting...'); ?>
    <script>


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting/Resources/views/vouchers/receipts/index.blade.php ENDPATH**/ ?>