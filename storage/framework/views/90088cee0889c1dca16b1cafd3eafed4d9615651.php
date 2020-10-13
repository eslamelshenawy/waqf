<?php $__env->startSection('content'); ?>
   <?php $bank = app('\Modules\Accounting\Entities\Bank'); ?>
    <?php
        $balance= @$data->balances->credit - @$data->balances->debit
    ?>
<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container">
            <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <section class="heading">
                <div class="container">
                    <div class="heading__body old-requests">
                        <h1>  <?php echo e(__('shared::actions.statement_account')); ?></h1>
                        <span class="line"></span>
                    </div>
                </div>
            </section>

            <div class="search-results_details" id="advance_added">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search_info">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-results__action">

                                        <div class="table-responsive">
                                            <table class="display table table-striped table-bordered dataTable" id="alternative_pagination_table" style="width:100%">
                                                <caption>
                                                    
                                                </caption>
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">رقم السند </th>
                                                    <th scope="col">نوع الدفع</th>
                                                    <th scope="col">المبلغ المدفوع</th>
                                                    <th scope="col">تاريخ السند </th>
                                                    <th scope="col"> نوع الحساب </th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center">
                                             <?php $Voucher = app('\Modules\Accounting\Entities\Voucher'); ?>
                                            <?php $account = app('\Modules\Accounting\Entities\Account'); ?>
                                            <?php $Invoice = app('\Modules\Accounting\Entities\Invoice'); ?>
                                            <?php
                                            if($data->balances){
                                                $vouchers=$Voucher->where('number',$data->balances->moveId)->get();
                                                if($vouchers->IsEmpty() == true){
                                                $vouchers=$Invoice->where('order_number',$data->balances->moveId)->get();
                                                }

                                                $accounts=$Voucher->where('id',$data->balances->moveId)->get();
                                                 }else{
                                            $vouchers = null;
                                            }
                                            ?>

                                                <?php
                                                $sum=0;
                                                ?>
                                                <?php if($vouchers): ?>
                                                <?php $__currentLoopData = @$vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php
                                                            if($Voucher->where('number',$data->balances->moveId)->get()->IsEmpty() != true){
                                                               $accountname=$account->where('id',$voucher->account_idAttributable)->first();
                                                               }else{
                                                                   $accountname=$account->where('id',$voucher->account_id)->first();
                                                               }
                                                               
                                                                 $account=$account->where('id',$voucher->paymentable_id)->first();
                                                        ?>

                                                    <tr>
                                                        <th scope="row"><?php echo e(++$key); ?></th>
                                                        <td><?php echo e($voucher->number); ?></td>
                                                        <td><?php echo e($account->name); ?></td>
                                                        <td><?php echo e(@$voucher->paid_amount); ?></td>
                                                        <td><?php echo e($voucher->date); ?></td>
                                                        <td><?php echo e(@$accountname->name); ?></td>

                                                    </tr>
                                                    <?php
                                                    $sum +=@$voucher->paid_amount ;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                     <td scope="col"> الرصيد</td>
                                                   <td colspan="5" scope="col"> <?php echo e($sum); ?></td>
                                                </tr>
 <?php else: ?>
                                                    <!--لا توجد اى تعاملات-->

                                                    <?php endif; ?>
                                                </tbody>
                                            </table>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts...'); ?>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('scripting...'); ?>
<script>
  $('#alternative_pagination_table').DataTable({
            language: {
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            }
        });
</script>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/users/statement.blade.php ENDPATH**/ ?>