<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container">
            <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><?php echo e(__('shared::actions.manage') . ' ' . __(' قائمة الدخل')); ?></h4>
                            <div class="table-responsive">

                                <div id="rrtable">
                                    <table id="m_ordering_table" class=" table table-striped table-bordered">
                                        <tbody>
                                        <tr class="alignBottom" id="header_row">
                                            <th scope="col"><span class="lightgrayFont arial_11 noBold">الحساب </span>
                                            </th>



                                            <th scope="col"><span class="bold"></span>
                                                <div class="noBold arial_11">دائن</div>
                                            </th>
                                        </tr>

                                        </tbody>
                                        <tbody>
                                        <tr class="openTr pointer" id="parentTr">
                                            <td>
                                                <span class=" bold">ايرادات الوقف<span
                                                            class="dropDownArrowLightGray">
                                                    </span></span>
                                            </td>

                                            <td></td>
                                        </tr>
                                        <?php $Banks = app('\Modules\Accounting\Entities\BankBalance'); ?>
                                        <?php $FundBalance = app('\Modules\Accounting\Entities\FundBalance'); ?>
                                        <?php $Estate = app('\App\Estate'); ?>
                                        <?php $Accounts = app('\Modules\Accounting\Entities\Account'); ?>
                                        <?php $Journal = app('\Modules\Accounting\Entities\Journal'); ?>
                                        <?php
                                            // Revenueapartments
                                            $Revenueapartments =$Accounts->where('code',411)->first();
                                            $RevenueapartmentsMove= $Journal->where('journalable_id',$Revenueapartments->id)->get();
                                            $RevenueapartmentsSumMoveDebit=0;
                                            $RevenueapartmentsSumMoveCredit=0;
                                             foreach ($RevenueapartmentsMove as $assetsJournal){
                                                $RevenueapartmentsSumMoveDebit +=$assetsJournal->debit;
                                                $RevenueapartmentsSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Transferexpenses
                                            // Buildingrevenues
                                            $Buildingrevenues =$Accounts->where('code',413)->first();
                                            $BuildingrevenuesMove= $Journal->where('journalable_id',$Buildingrevenues->id)->get();
                                            $BuildingrevenuesSumMoveDebit=0;
                                            $BuildingrevenuesSumMoveCredit=0;
                                             foreach ($BuildingrevenuesMove as $assetsJournal){
                                                $BuildingrevenuesSumMoveDebit +=$assetsJournal->debit;
                                                $BuildingrevenuesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Transferexpenses
                                            // Landrevenue
                                            $Landrevenue =$Accounts->where('code',414)->first();
                                            $LandrevenueMove= $Journal->where('journalable_id',$Landrevenue->id)->get();
                                            $LandrevenueSumMoveDebit=0;
                                            $LandrevenueSumMoveCredit=0;
                                             foreach ($LandrevenueMove as $assetsJournal){
                                                $LandrevenueSumMoveDebit +=$assetsJournal->debit;
                                                $LandrevenueSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Transferexpenses
                                            // Revenuestores
                                            $Revenuestores =$Accounts->where('code',412)->first();
                                            $RevenuestoresMove= $Journal->where('journalable_id',$Revenuestores->id)->get();
                                            $RevenuestoresSumMoveDebit=0;
                                            $RevenuestoresSumMoveCredit=0;
                                             foreach ($RevenuestoresMove as $assetsJournal){
                                                $RevenuestoresSumMoveDebit +=$assetsJournal->debit;
                                                $RevenuestoresSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Revenuestores
                                             // Otherincome
                                            $Otherincome =$Accounts->where('code',42)->first();
                                            $OtherincomeMove= $Journal->where('journalable_id',$Otherincome->id)->get();
                                            $OtherincomeSumMoveDebit=0;
                                            $OtherincomeSumMoveCredit=0;
                                             foreach ($OtherincomeMove as $assetsJournal){
                                                $OtherincomeSumMoveDebit +=$assetsJournal->debit;
                                                $OtherincomeSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Otherincome
                                                  $sumincomeDebit1=0;
                                            $sumincomeDebit=0;
                                            $sumincomeCedit1=0;
                                            $sumincomeCedit=0;
                                            $incomemovesumDebit=0;
                                            $incomemovesumCredit=0;
                                            $arrayAssetId19=[];
                                          $income=$Accounts->whereIn('code',[411,412,413,414,42])->get();
                                               foreach ($income as $asset){
                                                array_push($arrayAssetId19,$asset->id);
                                                   $sumincomeDebit +=$asset->debit;
                                                   $sumincomeDebit1 +=$asset->debitFrist;
                                                   $sumincomeCedit1 +=$asset->creditFirst;
                                                   $sumincomeCedit +=$asset->credit;
                                            }
                                            $incomeJournals=$Journal->whereIn('journalable_id',$arrayAssetId19)->get();
                                            foreach ($incomeJournals as $assetsJournal){
                                                $incomemovesumCredit +=$assetsJournal->credit;
                                                $incomemovesumDebit +=$assetsJournal->debit;
                                            }

                                           $sumEndowmentexpensesDebit1=0;
                                            $sumEndowmentexpensesDebit=0;
                                            $sumEndowmentexpensesCedit1=0;
                                            $sumEndowmentexpensesCedit=0;
                                            $EndowmentexpensesmovesumDebit=0;
                                            $EndowmentexpensesmovesumCredit=0;
                                            $arrayAssetId9=[];
                                          $Endowmentexpenses=$Accounts->whereIn('code',[3111,3112,3121])->get();
                                               foreach ($Endowmentexpenses as $asset){
                                                array_push($arrayAssetId9,$asset->id);
                                                   $sumEndowmentexpensesDebit +=$asset->debit;
                                                   $sumEndowmentexpensesDebit1 +=$asset->debitFrist;
                                                   $sumEndowmentexpensesCedit1 +=$asset->creditFirst;
                                                   $sumEndowmentexpensesCedit +=$asset->credit;
                                            }
                                            $EndowmentexpensesJournals=$Journal->whereIn('journalable_id',$arrayAssetId9)->get();
                                            foreach ($EndowmentexpensesJournals as $assetsJournal){
                                                $EndowmentexpensesmovesumCredit +=$assetsJournal->credit;
                                                $EndowmentexpensesmovesumDebit +=$assetsJournal->debit;
                                            }

                                           $sumGeneraladmiexpensesDebit1=0;
                                            $sumGeneraladmiexpensesDebit=0;
                                            $sumGeneraladmiexpensesCedit1=0;
                                            $sumGeneraladmiexpensesCedit=0;
                                            $GeneraladmiexpensesmovesumDebit=0;
                                            $GeneraladmiexpensesmovesumCredit=0;
                                            $arrayAssetId15=[];
                                          $Generaladmiexpenses=$Accounts->whereIn('code',[3211,3212,3213,3214])->get();
                                               foreach ($Generaladmiexpenses as $asset){
                                                array_push($arrayAssetId15,$asset->id);
                                                   $sumGeneraladmiexpensesDebit +=$asset->debit;
                                                   $sumGeneraladmiexpensesDebit1 +=$asset->debitFrist;
                                                   $sumGeneraladmiexpensesCedit1 +=$asset->creditFirst;
                                                   $sumGeneraladmiexpensesCedit +=$asset->credit;
                                            }
                                            $GeneraladmiexpensesJournals=$Journal->whereIn('journalable_id',$arrayAssetId15)->get();
                                            foreach ($GeneraladmiexpensesJournals as $assetsJournal){
                                                $GeneraladmiexpensesmovesumCredit +=$assetsJournal->credit;
                                                $GeneraladmiexpensesmovesumDebit +=$assetsJournal->debit;
                                            }
                                                $sumAssetsdepreciationexpensesDebit1=0;
                                            $sumAssetsdepreciationexpensesDebit=0;
                                            $sumAssetsdepreciationexpensesCedit1=0;
                                            $sumAssetsdepreciationexpensesCedit=0;
                                            $AssetsdepreciationexpensesmovesumDebit=0;
                                            $AssetsdepreciationexpensesmovesumCredit=0;
                                            $arrayAssetId16=[];
                                          $Assetsdepreciationexpenses=$Accounts->whereIn('code',[3221,3222,3223,3224])->get();
                                               foreach ($Assetsdepreciationexpenses as $asset){
                                                array_push($arrayAssetId16,$asset->id);
                                                   $sumAssetsdepreciationexpensesDebit +=$asset->debit;
                                                   $sumAssetsdepreciationexpensesDebit1 +=$asset->debitFrist;
                                                   $sumAssetsdepreciationexpensesCedit1 +=$asset->creditFirst;
                                                   $sumAssetsdepreciationexpensesCedit +=$asset->credit;
                                            }
                                            $AssetsdepreciationexpensesJournals=$Journal->whereIn('journalable_id',$arrayAssetId16)->get();
                                            foreach ($AssetsdepreciationexpensesJournals as $assetsJournal){
                                                $AssetsdepreciationexpensesmovesumCredit +=$assetsJournal->credit;
                                                $AssetsdepreciationexpensesmovesumDebit +=$assetsJournal->debit;
                                            }
                                             $sumexpensesDebit1=0;
                                            $sumexpensesDebit=0;
                                            $sumexpensesCedit1=0;
                                            $sumexpensesCedit=0;
                                            $expensesmovesumDebit=0;
                                            $expensesmovesumCredit=0;
                                            $arrayAssetId14=[];
                                          $expenses=$Accounts->whereIn('code',[3111,3112,3121,3211,3212,3213,3214,3221,3222,3223,3224])->get();
                                               foreach ($expenses as $asset){
                                                array_push($arrayAssetId14,$asset->id);
                                                   $sumexpensesDebit +=$asset->debit;
                                                   $sumexpensesDebit1 +=$asset->debitFrist;
                                                   $sumexpensesCedit1 +=$asset->creditFirst;
                                                   $sumexpensesCedit +=$asset->credit;
                                            }
                                            $expensesJournals=$Journal->whereIn('journalable_id',$arrayAssetId14)->get();
                                            foreach ($expensesJournals as $assetsJournal){
                                                $expensesmovesumCredit +=$assetsJournal->credit;
                                                $expensesmovesumDebit +=$assetsJournal->debit;
                                            }
                                        ?>
                                        <tr>
                                            <td><span>ايراد الشقق </span>
                                            </td>
                                            <td><?php echo e(($RevenueapartmentsSumMoveCredit  - $RevenueapartmentsSumMoveDebit) >0 ? $RevenueapartmentsSumMoveCredit  - $RevenueapartmentsSumMoveDebit : ""); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>ايراد المبانى </span>
                                            </td>
                                            <td><?php echo e($BuildingrevenuesSumMoveCredit  - $BuildingrevenuesSumMoveDebit); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>ايراد الاراضى </span>
                                            </td>
                                            <td><?php echo e(($LandrevenueSumMoveCredit  - $LandrevenueSumMoveDebit) >0 ? $LandrevenueSumMoveCredit  - $LandrevenueSumMoveDebit : ""); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>ايراد المحلات </span>
                                            </td>
                                            <td scope="row"><?php echo e($RevenuestoresSumMoveCredit  - $RevenuestoresSumMoveDebit); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>ايرادات اخري </span>
                                            </td>

                                            <td scope="row"><?php echo e(($OtherincomeSumMoveCredit  - $OtherincomeSumMoveDebit) >0 ? $OtherincomeSumMoveCredit  - $OtherincomeSumMoveDebit : ""); ?></td>
                                        </tr>

                                        <tr>
                                            <td><span class=" bold"
                                                      style=" border-style: groove;"> اجمالي ايرادات </span>
                                            </td>


                                            <td scope="row"
                                                style="    border-style: solid;"><?php echo e(($incomemovesumCredit  - $incomemovesumDebit) >0 ? $incomemovesumCredit  - $incomemovesumDebit : ""); ?></td>

                                        </tr>
                                        <?php
                                                $totaldebitincome=$incomemovesumCredit  - $incomemovesumDebit;
                                                $totalcreditincome=$incomemovesumCredit  - $incomemovesumDebit;
                                                ?>
                                        <tr class="openTr pointer" id="parentTr">
                                            <td>
                                                <span class=" bold">يخصم منة<span
                                                            class="dropDownArrowLightGray">
                                                    </span></span>
                                            </td>

                                            <td></td>
                                        </tr>
                                        <?php
                                            $sumEndowmentexpensesdebit=($EndowmentexpensesmovesumDebit > 0) ? $EndowmentexpensesmovesumDebit : (-1* $EndowmentexpensesmovesumDebit);
                                            $sumEndowmentexpensescredit=($EndowmentexpensesmovesumCredit > 0) ? $EndowmentexpensesmovesumCredit : (-1* $EndowmentexpensesmovesumCredit);
                                        ?>

                                        <tr class="openTr pointer" id="parentTr">
                                            <td>
                                                <span class=" bold">مصروفات الوقف<span
                                                            class="dropDownArrowLightGray">
                                                    </span></span>
                                            </td>

                                            <td scope="row"><?php echo e($EndowmentexpensesmovesumDebit - $EndowmentexpensesmovesumCredit); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>مصروفات عموميه واداريه</span>
                                            </td>

                                            <td scope="row"><?php echo e($GeneraladmiexpensesmovesumDebit - $GeneraladmiexpensesmovesumCredit); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>مصروفات اهلاك الاصول  </span>
                                            </td>

                                            <td scope="row"><?php echo e(($AssetsdepreciationexpensesmovesumDebit -$AssetsdepreciationexpensesmovesumCredit) > 0 ? $AssetsdepreciationexpensesmovesumDebit -$AssetsdepreciationexpensesmovesumCredit : ""); ?></td>
                                        </tr>
                                        <?php
                                            $sumexpensesdebit=$sumexpensesDebit > 0 ? $sumexpensesDebit : (-1* $sumexpensesDebit);
                                            $sumexpensescredit=$sumexpensesCedit > 0 ? $sumexpensesCedit : (-1* $sumexpensesCedit);
                                        ?>

                                        <tr>
                                            <td><span class=" bold"
                                                      style=" border-style: groove;"> اجمالي المصروفات </span>
                                            </td>


                                            <td scope="row"
                                                style="    border-style: solid;"><?php echo e(($expensesmovesumDebit -$expensesmovesumCredit) > 0 ? $expensesmovesumDebit -$expensesmovesumCredit : ""); ?></td>
                                        </tr>
                                        <?php
                                            $totaldebitexpenses=$expensesmovesumDebit -$expensesmovesumCredit;
                                            $totalcreditexpenses=$expensesmovesumDebit -$expensesmovesumCredit;
                                        ?>
                                        <tr class="openTr pointer" id="parentTr">
                                            <td>
                                                <span class=" bold">الفائض القابل للتوزيع <span
                                                            class="dropDownArrowLightGray">
                                                    </span></span>
                                            </td>

                                            <td><?php echo e($totalcreditincome - $totalcreditexpenses); ?></td>
                                        </tr>

                                        </tbody>

                                    </table>
                                </div>

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

<?php $__env->startSection('styling...'); ?>
    <style>
        div.dataTables_wrapper div.dataTables_filter label {
            margin-right: 292px;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin-right: 530px;
        }

        .pagination .page-item.active .page-link {
            background-color: #663399 !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts...'); ?>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('scripting...'); ?>
    <script>
        $('#m_ordering_table').DataTable({
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

        // function deleteEstate(estate_id) {
        //     Swal.fire({
        //         title: 'هل انت متاكد من الالغاء',
        //         text: "لن تتمكن من التراجع عن هذا",
        //         icon: 'تحذير',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'نعم',
        //         cancelButtonText: 'لا'
        //     }).then((result) => {
        //         if (result.value) {
        //             Swal.fire(
        //                 'تم الالغاء',
        //                 'تم الغاء العقار',
        //                 'نجاح'
        //             );
        //             setTimeout(function () {
        //                 document.getElementById(`form-${estate_id}`).submit();
        //             }, 2000);
        //         }
        //     });
        //
        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/users/incomeStatement/index.blade.php ENDPATH**/ ?>