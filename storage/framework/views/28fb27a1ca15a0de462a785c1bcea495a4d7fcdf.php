<?php $__env->startSection('content'); ?>
    <?php $bank = app('\Modules\Accounting\Entities\Bank'); ?>
    <?php
        $balance= @$data->balances->debit - @$data->balances->credit ;
        
    ?>
    <section class="roles-and-permissions">
        <div class="container" id="app">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="modal-body">
                            <div class="accordion" id="accordionExample">
                                <?php if(@$type == "tenant"): ?>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#rent" aria-expanded="false"
                                                        aria-controls="rent">
                                                    الإيجارات
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="rent" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table id="multicolumn_ordering_tabl"
                                                           class="table table-striped table-bordered"
                                                           style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><?php echo e(__('الاسم ')); ?></th>
                                                            <th scope="col"><?php echo e(__('السعر')); ?></th>
                                                            <th scope="col"><?php echo e(__('المدينه')); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $data->estateOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $estateOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $city = app('\App\City'); ?>
                                                            <?php
                                                                $details= $estateOrder->with('madeBy')->first();
                                                                 $city_name= $city->where('id',$details->madeBy->city_id)->select("name_ar")->first();
                                                                 if(@$data->balances != null){
                                                                     $balance=  $data->balances->debit - $data->balances->credit ;
                                                                 }
                                                            ?>
                                                            

                                                            <tr>
                                                                <td scope="row"><?php echo e(++$key); ?></td>
                                                                <td scope="row"><?php echo e(@$details->madeBy->name); ?></td>
                                                                <td scope="row"><?php echo e($estateOrder->amount); ?></td>
                                                                <td scope="row"><?php echo e($city_name->name_ar); ?></td>

                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#balance" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                الرصيد
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="balance" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-2">
                                                    <label for="">دائن </label>
                                                    <p class="alert alert-primary" role="alert"
                                                       v-text="credit"><?php echo e(@$data->balances->credit ? @$data->balances->credit : 0); ?></p>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="">مدين</label>
                                                    <p class="alert alert-primary" role="alert"
                                                       v-text="debit"><?php echo e(@$data->balances->debit ? @$data->balances->debit : 0); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-2">
                                                    <label for=""> الرصيد </label>
                                                    <p class="alert alert-primary" role="alert"
                                                       v-text="balance"><?php echo e($balance > 0 ? $balance :  $balance."مدين"); ?></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo2">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#moveMake" aria-expanded="false"
                                                    aria-controls="moveMake">
                                               التفاصيل
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="moveMake" class="collapse" aria-labelledby="headingTwo2"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php $Voucher = app('\Modules\Accounting\Entities\Voucher'); ?>
                                            <?php $account = app('\Modules\Accounting\Entities\Account'); ?>
                                            <?php $Invoice = app('\Modules\Accounting\Entities\Invoice'); ?>
                                            <?php
                                        
                                            if($data->balances){
                                             $vouchers=$Voucher->where('number',$data->balances->moveId)->get();
                                             
                                                if(@$type == "tenant"){
                                            
                                                $Invoicies=$Invoice->where('order_number',$data->balances->invoiceNum)->get();
                                               $vouchers= $vouchers->toBase()->merge($Invoicies);
                                                }

                                                $accounts=$Voucher->where('id',$data->balances->moveId)->get();
                                            }else{
                                            $vouchers = null;
                                            }
                                               
                                            ?>
                                                
                                            <div class="table-responsive">
                                                <table id="multicolumn_ordering"
                                                       class="table table-striped table-bordered"
                                                       style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col"><?php echo e(__('الحساب المدين')); ?></th>
                                                        <th scope="col"><?php echo e(__('البيان')); ?></th>
                                                        <th scope="col"><?php echo e(__('التاريخ')); ?></th>
                                                        <th scope="col"><?php echo e(__('المبلغ')); ?></th>
                                                        <th scope="col"><?php echo e(__('الحساب الدائن')); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <?php if($vouchers): ?>
                                                    <?php $__currentLoopData = @$vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        
                                                             if($voucher->account_idAttributable != null){
                                                               $accountname=$account->where('id',$voucher->account_idAttributable)->first();
                                                               }else{
                                                               
                                                                   $accountname=$account->where('id',$voucher->account_id)->first();
                                                               }
                                                             $account=$account->where('id',$voucher->paymentable_id)->first();
                                                        ?>

                                                        <tr>
                                                            <td scope="row"><?php echo e($account->name); ?>

                                                            <!--    <?php if($Voucher->where('number',$data->balances->moveId)->get()->IsEmpty() != true): ?>-->
                                                            <!--    <?php echo e(@$voucher->document_type == "Payment" ? "سند صرف" :"سند قبض "); ?>-->
                                                            <!--    <?php else: ?>-->
                                                            <!--    <?php echo e(@$voucher->document_type == "credit" ? "فاتورة ايجار": ""); ?>-->

                                                            <!--<?php endif; ?>-->
                                                            </td>
                                                            <td scope="row"><?php echo e(@$voucher->description); ?><?php echo e(@$voucher->notes); ?></td>
                                                            <td scope="row"><?php echo e(@$voucher->date); ?><?php echo e(@$voucher->order_at); ?></td>
                                                            <td scope="row">
                                                                
                                                                <?php echo e(@$voucher->amount != 0 ? @$voucher->amount : @$voucher->paid_amount); ?>

                                                               
                                                                </td>
                                                            <td scope="row"><?php echo e(@$accountname->name); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <?php else: ?>
                                                    <!--لا توجد اى تعاملات-->

                                                    <?php endif; ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                    <?php if($type == "agency"): ?>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                            data-toggle="collapse" data-target="#maintenanceOrders"
                                                            aria-expanded="false" aria-controls="maintenanceOrders">
                                                        طلبات الصيانه
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="maintenanceOrders" class="collapse" aria-labelledby="headingTwo"
                                                 data-parent="#accordionExample">
                                                <div class="card-body">

                                                    <div class="table-responsive">
                                                        <table id="multicolumn_ordering99"
                                                               class="table table-striped table-bordered"
                                                               style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col"><?php echo e(__('اسم وكيل الصيانه ')); ?></th>
                                                                <th scope="col"><?php echo e(__('هاتف الوكيل')); ?></th>
                                                                <th scope="col"><?php echo e(__('الاسم للعقار')); ?></th>
                                                                <th scope="col"><?php echo e(__('الاسم المستاجر')); ?></th>
                                                                <th scope="col"><?php echo e(__('المدينه')); ?></th>
                                                                <th scope="col"><?php echo e(__('الوصف')); ?></th>
                                                                <th scope="col"><?php echo e(__('حالة الطلب')); ?></th>
                                                                <th scope="col"><?php echo e(__('تاريخ الذهاب للمستاجر')); ?></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if($data->maintenanceOrders): ?>
                                                                
                                                            <?php $__currentLoopData = $data->maintenanceOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $maintenanceOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $city = app('\App\City'); ?>
                                                                <?php $Tenant = app('\App\Tenant'); ?>
                                                                <?php
                                                                    $details= $maintenanceOrder->with('madeBy','agency','estate')->first();
                                                                     $city_name= $city->where('id',$maintenanceOrder->city_id)->select("name_ar")->first();
                                                                     $tenet_name=$Tenant->where('id',$maintenanceOrder->tenant_id)->first();

                                                                ?>
                                                                <tr>
                                                                    <td scope="row"><?php echo e(++$key); ?></td>
                                                                    <td scope="row"><?php echo e($details->agency->name); ?></td>
                                                                    <td scope="row"><?php echo e($details->agency->mobile); ?></td>
                                                                    <td scope="row"><?php echo e($details->estate->name); ?></td>
                                                                    <td scope="row"> <a href="<?php echo e(route('Admin::tenants.show', $tenet_name->id)); ?>"><?php echo e($tenet_name->name); ?></a></td>
                                                                    <td scope="row"><?php echo e($city_name->name_ar); ?></td>
                                                                    <td scope="row"><?php echo e($maintenanceOrder->description); ?></td>
 <td scope="row">
                                                                        <?php if($maintenanceOrder->is_accepted == "1" && $maintenanceOrder->is_done == "0"): ?>
                                                                            تمت الموافقه على الطلب
                                                                        <?php endif; ?>
                                                                        
                                                                        <?php if($maintenanceOrder->is_accepted == "0" && $maintenanceOrder->is_done == "0"): ?>
                                                                            الطلب معلق
                                                                        <?php endif; ?>
                                                                        <?php if(($maintenanceOrder->is_accepted == "1" && $maintenanceOrder->is_done == "1")): ?>

                                                                            تمت إنتهاء الصيانه
                                                                            <?php endif; ?>
                                                                       <?php if($maintenanceOrder->is_accepted == "2"): ?>
                                                                            تم رفض الطلب
                                                                    <?php endif; ?>
                                                                    </td>
                                                                    <td scope="row"><?php echo e($maintenanceOrder->ended_at != null ? $maintenanceOrder->ended_at : "---"); ?></td>

                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                            
                                                            
                                                            <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php if($type == "tenant"): ?>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#maintenanceOrders"
                                                        aria-expanded="false" aria-controls="maintenanceOrders">
                                                    طلبات الصيانه
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="maintenanceOrders" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table id="multicolumn_ordering"
                                                           class="table table-striped table-bordered"
                                                           style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><?php echo e(__('اسم وكيل الصيانه ')); ?></th>
                                                            <th scope="col"><?php echo e(__('هاتف الوكيل')); ?></th>
                                                            <th scope="col"><?php echo e(__('الاسم للعقار')); ?></th>
                                                            <th scope="col"><?php echo e(__('المدينه')); ?></th>
                                                            <th scope="col"><?php echo e(__('الوصف')); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $data->maintenanceOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $maintenanceOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $city = app('\App\City'); ?>
                                                            <?php
                                                                $details= $maintenanceOrder->with('madeBy','agency','estate')->first();
                                                                 $city_name= $city->where('id',$maintenanceOrder->city_id)->select("name_ar")->first()

                                                            ?>
                                                            <tr>
                                                                <td scope="row"><?php echo e(++$key); ?></td>
                                                                <td scope="row"><?php echo e($details->agency->name); ?></td>
                                                                <td scope="row"><?php echo e($details->agency->mobile); ?></td>
                                                                <td scope="row"><?php echo e($details->estate->name); ?></td>
                                                                <td scope="row"><?php echo e($city_name->name_ar); ?></td>
                                                                <td scope="row"><?php echo e($maintenanceOrder->description); ?></td>

                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($type == "tenant"): ?>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#estateOrders"
                                                        aria-expanded="false" aria-controls="estateOrders">
                                                    طلبات الايجارات
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="estateOrders" class="collapse" aria-labelledby="headingThree"
                                             data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table id="multicolumn_ordering2"
                                                           class="table table-striped table-bordered"
                                                           style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><?php echo e(__('الاسم ')); ?></th>
                                                            <th scope="col"><?php echo e(__('السعر')); ?></th>
                                                            <th scope="col"><?php echo e(__('المدينه')); ?></th>
                                                            <!--<th scope="col"><?php echo e(__('مدة الايجار')); ?></th>-->
                                                            <th scope="col"><?php echo e(__('تاريخ الانتهاء')); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php $__currentLoopData = $data->rents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $rent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $city = app('\App\City'); ?>
                                                            <?php
                                                                $details= $rent->with('tenant','estate','estateOrders')->first();
                                                                 $city_name= $city->where('id',$details->estate->city_id)->select("name_ar")->first();
                                                                
                                                            ?>
                                                            <tr>
                                                                <td scope="row"><?php echo e(++$key); ?></td>
                                                                <td scope="row">
                                                                     <?php if($details->estate != null): ?>
                                                                    <?php echo e($details->estate->name); ?>

                                                                    <?php endif; ?>
                                                                    </td>
                                                                <td scope="row">
                                                                    <?php if($details->estateOrders != null): ?>
                                                                    <?php echo e($details->estateOrders->amount); ?>

                                                                    <?php endif; ?>
                                                                    </td>
                                                                <td scope="row"><?php echo e($city_name->name_ar); ?></td>
                                                                <!--<td scope="row"><?php if($details->estateOrders != null): ?><?php echo e($details->estateOrders->rent_period); ?><?php endif; ?></td>-->
                                                                <td scope="row"><?php if($details->estateOrders != null): ?><?php echo e($details->estateOrders->ended_at); ?> <?php endif; ?></td>

                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles...'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts...'); ?>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


<?php $__env->stopPush(); ?>

<?php $__env->startSection('styling...'); ?>
    <style>
        .page-item.active .page-link {
            background-color: #639;
            border-color: #639;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts...'); ?>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('scripting...'); ?>
    <script>
        $('#multicolumn_ordering_tabl').DataTable({
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
        $('#multicolumn_ordering99').DataTable({
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
        $('#multicolumn_ordering').DataTable({
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
        $('#multicolumn_ordering2').DataTable({
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


        function deleteEstate(estate_id) {
            Swal.fire({
                title: 'هل انت متاكد من الالغاء',
                text: "لن تتمكن من التراجع عن هذا",
                icon: 'تحذير',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'تم الالغاء',
                        'تم الغاء العقار',
                        'نجاح'
                    );
                    setTimeout(function () {
                        document.getElementById(`form-${estate_id}`).submit();
                    }, 2000);

                }
            });


        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting/Resources/views/Receivables/partials/_show.blade.php ENDPATH**/ ?>