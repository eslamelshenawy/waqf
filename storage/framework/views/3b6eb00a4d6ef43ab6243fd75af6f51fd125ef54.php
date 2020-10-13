<?php $__env->startSection('content'); ?>
    <section class="roles-and-permissions">
        <div class="container">
            <?php echo $__env->make('admin::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><?php echo e(' ' . __(' الميزانيه')); ?></h4>
                            <div class="table-responsive">

                                <div id="rrtable">
                                    <table id="ordering_table" class="table table-striped table-bordered">
                                        <tbody>
                                        <tr class="alignBottom" id="header_row">
                                            <th scope="col"><span class="lightgrayFont arial_11 noBold">الحساب </span>
                                            </th>
                                            <th scope="col"><span class="bold"></span>
                                                <div class="noBold arial_11">مدين</div>
                                            </th>
                                            
                                            
                                            
                                        </tr>

                                        </tbody>
                                        <tbody>
                                        <tr class="openTr pointer" id="parentTr">
                                            <td>
                                                <span class=" bold">الأصول<span
                                                            class="dropDownArrowLightGray">
                                                    </span></span>
                                            </td>
                                            
                                            <td></td>
                                        </tr>
                                        <tr class="openTr pointer" id="parentTr">
                                            <td>
                                                <span class=" bold">الأصول الغير متداولة<span
                                                            class="dropDownArrowLightGray">
                                                    </span></span>
                                            </td>
                                            
                                            <td></td>
                                        </tr>
                                        <?php $Accounts = app('\Modules\Accounting\Entities\Account'); ?>
                                        <?php $Journal = app('\Modules\Accounting\Entities\Journal'); ?>

                                        <?php
                                            $sumFADebit1=0;
                                                                                       $sumFADebit=0;
                                                                                       $sumFACedit1=0;
                                                                                       $sumFACedit=0;
                                                                                       $changesumDebit=0;
                                                                                       $changesumCredit=0;
                                                                                       $arrayAssetId1=[];
                                                                                       $fixedAssets=$Accounts->whereIn('code',[111,112,113])->get();
                                                                                          foreach ($fixedAssets as $asset){
                                                                                           array_push($arrayAssetId1,$asset->id);
                                                                                              $sumFADebit +=$asset->debit;
                                                                                              $sumFADebit1 +=$asset->debitFrist;
                                                                                              $sumFACedit1 +=$asset->creditFirst;
                                                                                              $sumFACedit +=$asset->credit;
                                                                                       }
                                                                                       $fixedAssetsJournals=$Journal->whereIn('journalable_id',$arrayAssetId1)->get();
                                                                                       foreach ($fixedAssetsJournals as $assetsJournal){
                                                                                           $changesumCredit +=$assetsJournal->credit;
                                                                                           $changesumDebit +=$assetsJournal->debit;
                                                                                       }
                                             $summonyCashBankDebit1=0;
                                            $summonyCashBankDebit=0;
                                            $summonyCashBankCedit1=0;
                                            $summonyCashBankCedit=0;
                                            $monyCashBankmovesumDebit=0;
                                            $monyCashBankmovesumCredit=0;
                                            $arrayAssetId20=[];
                                            $monyCashBank=$Accounts->whereIn('code',[12111,12112,12113,12121,12122])->get();
                                               foreach ($monyCashBank as $asset){
                                                array_push($arrayAssetId20,$asset->id);
                                                   $summonyCashBankDebit +=$asset->debit;
                                                   $summonyCashBankDebit1 +=$asset->debitFrist;
                                                   $summonyCashBankCedit1 +=$asset->creditFirst;
                                                   $summonyCashBankCedit +=$asset->credit;
                                            }

                                            $monyCashBankJournals=$Journal->whereIn('journalable_id',$arrayAssetId20)->get();
                                            foreach ($monyCashBankJournals as $assetsJournal){
                                                $monyCashBankmovesumCredit +=$assetsJournal->credit;
                                                $monyCashBankmovesumDebit +=$assetsJournal->debit;
                                            }

                                                  // Checksunder collection
                                            $Checks =$Accounts->where('code',141)->first();
                                            $ChecksMove= $Journal->where('journalable_id',$Checks->id)->get();
                                            $ChecksSumMoveDebit=0;
                                            $ChecksSumMoveCredit=0;
                                             foreach ($ChecksMove as $assetsJournal){
                                                $ChecksSumMoveDebit +=$assetsJournal->debit;
                                                $ChecksSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Checks
                                              $sumCurrentliabilitiesDebit1=0;
                                            $sumCurrentliabilitiesDebit=0;
                                            $sumCurrentliabilitiesCedit1=0;
                                            $sumCurrentliabilitiesCedit=0;
                                            $CurrentliabilitiesmovesumDebit=0;
                                            $CurrentliabilitiesmovesumCredit=0;
                                            $arrayAssetId17=[];
                                          $Currentliabilities=$Accounts->whereIn('code',[221,222])->get();
                                               foreach ($Currentliabilities as $asset){
                                                array_push($arrayAssetId17,$asset->id);
                                                   $sumCurrentliabilitiesDebit +=$asset->debit;
                                                   $sumCurrentliabilitiesDebit1 +=$asset->debitFrist;
                                                   $sumCurrentliabilitiesCedit1 +=$asset->creditFirst;
                                                   $sumCurrentliabilitiesCedit +=$asset->credit;
                                            }
                                            $CurrentliabilitiesJournals=$Journal->whereIn('journalable_id',$arrayAssetId17)->get();
                                            foreach ($CurrentliabilitiesJournals as $assetsJournal){
                                                $CurrentliabilitiesmovesumCredit +=$assetsJournal->credit;
                                                $CurrentliabilitiesmovesumDebit +=$assetsJournal->debit;
                                            }
                                            $sumAngelrightsDebit1=0;
                                            $sumAngelrightsDebit=0;
                                            $sumAngelrightsCedit1=0;
                                            $sumAngelrightsCedit=0;
                                            $AngelrightsmovesumDebit=0;
                                            $AngelrightsmovesumCredit=0;
                                            $arrayAssetId11=[];
                                          $Angelrights=$Accounts->whereIn('code',[211,212,2131,2132])->get();
                                               foreach ($Angelrights as $asset){
                                                array_push($arrayAssetId11,$asset->id);
                                                   $sumAngelrightsDebit +=$asset->debit;
                                                   $sumAngelrightsDebit1 +=$asset->debitFrist;
                                                   $sumAngelrightsCedit1 +=$asset->creditFirst;
                                                   $sumAngelrightsCedit +=$asset->credit;
                                            }
                                            $AngelrightsJournals=$Journal->whereIn('journalable_id',$arrayAssetId11)->get();
                                            foreach ($AngelrightsJournals as $assetsJournal){
                                                $AngelrightsmovesumCredit +=$assetsJournal->credit;
                                                $AngelrightsmovesumDebit +=$assetsJournal->debit;
                                            }

                                            $ReceivablesBalancesDebit1=0;
                                            $ReceivablesBalancesDebit=0;
                                            $ReceivablesBalancesCedit1=0;
                                            $ReceivablesBalancesCedit=0;
                                            $ReceivablesBalancesmovesumDebit=0;
                                            $ReceivablesBalancesmovesumCredit=0;
                                            $arrayAssetId11=[];
                                          $ReceivablesBalances=$Accounts->whereIn('code',[131,1321,1322,1331,141,1421,1431,13231])->get();
                                               foreach ($ReceivablesBalances as $asset){
                                                array_push($arrayAssetId11,$asset->id);
                                                   $ReceivablesBalancesDebit +=$asset->debit;
                                                   $ReceivablesBalancesDebit1 +=$asset->debitFrist;
                                                   $ReceivablesBalancesCedit1 +=$asset->creditFirst;
                                                   $ReceivablesBalancesCedit +=$asset->credit;
                                            }
                                            $ReceivablesBalancesJournals=$Journal->whereIn('journalable_id',$arrayAssetId11)->get();
                                            foreach ($ReceivablesBalancesJournals as $assetsJournal){
                                                $ReceivablesBalancesmovesumCredit +=$assetsJournal->credit;
                                                $ReceivablesBalancesmovesumDebit +=$assetsJournal->debit;
                                            }
                                            $sumincomeDebit1=0;
                                            $sumincomeDebit=0;
                                            $sumincomeCedit1=0;
                                            $sumincomeCedit=0;
                                            $incomemovesumDebit=0;
                                            $incomemovesumCredit=0;
                                            $arrayAssetId19=[];
                                          $income=$Accounts->whereIn('code',[411,412,42])->get();
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
                                              // Endowmentcapital
                                            $Endowmentcapital =$Accounts->where('code',211)->first();
                                            $EndowmentcapitalMove= $Journal->where('journalable_id',$Endowmentcapital->id)->get();
                                            $EndowmentcapitalSumMoveDebit=0;
                                            $EndowmentcapitalSumMoveCredit=0;
                                             foreach ($EndowmentcapitalMove as $assetsJournal){
                                                $EndowmentcapitalSumMoveDebit +=$assetsJournal->debit;
                                                $EndowmentcapitalSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Endowmentcapital
                                               // Reservesprovisions
                                            $Reservesprovisions =$Accounts->where('code',212)->first();
                                            $ReservesprovisionsMove= $Journal->where('journalable_id',$Reservesprovisions->id)->get();
                                            $ReservesprovisionsSumMoveDebit=0;
                                            $ReservesprovisionsSumMoveCredit=0;
                                             foreach ($ReservesprovisionsMove as $assetsJournal){
                                                $ReservesprovisionsSumMoveDebit +=$assetsJournal->debit;
                                                $ReservesprovisionsSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Reservesprovisions
                                              $sumDistributablesurplusDebit1=0;
                                            $sumDistributablesurplusDebit=0;
                                            $sumDistributablesurplusCedit1=0;
                                            $sumDistributablesurplusCedit=0;
                                            $DistributablesurplusmovesumDebit=0;
                                            $DistributablesurplusmovesumCredit=0;
                                            $arrayAssetId13=[];
                                          $Distributablesurplus=$Accounts->whereIn('code',[2131,2132])->get();
                                               foreach ($Distributablesurplus as $asset){
                                                array_push($arrayAssetId13,$asset->id);
                                                   $sumDistributablesurplusDebit +=$asset->debit;
                                                   $sumDistributablesurplusDebit1 +=$asset->debitFrist;
                                                   $sumDistributablesurplusCedit1 +=$asset->creditFirst;
                                                   $sumDistributablesurplusCedit +=$asset->credit;
                                            }
                                            $DistributablesurplusJournals=$Journal->whereIn('journalable_id',$arrayAssetId13)->get();
                                            foreach ($DistributablesurplusJournals as $assetsJournal){
                                                $DistributablesurplusmovesumCredit +=$assetsJournal->credit;
                                                $DistributablesurplusmovesumDebit +=$assetsJournal->debit;
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
                                            $total45454=$AssetsdepreciationexpensesmovesumDebit -$AssetsdepreciationexpensesmovesumCredit;
                                        ?>
                                        <tr>
                                            <td><span>الأصول الثابتة بالصافى</span>
                                            </td>
                                            
                                            <td scope="row"><?php echo e((($changesumDebit -$changesumCredit)-$total45454) >0 ? (($changesumDebit -$changesumCredit)-$total45454) : ""); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>مجموع الأصول غير متداولة</span>
                                            </td>
                                            
                                            <td scope="row"><?php echo e($changesumDebit -$changesumCredit); ?></td>
                                        </tr>
                                        <?php
                                            $totalfixedassets=$changesumDebit -$changesumCredit -$total45454;
                                        ?>
                                        <tr>
                                            <td><span class=" bold"
                                                      style=" border-style: groove;">الأصول المتداولة</span>
                                            </td>
                                            <td style="    border-style: solid;">---</td>
                                        </tr>
                                        <tr class="openTr pointer" id="parentTr">
                                            <td>
                                                <span class=" bold">النقدية بالبنوك والصندوق <span
                                                            class="dropDownArrowLightGray">
                                                    </span></span>
                                            </td>
                                            <td scope="row"><?php echo e($monyCashBankmovesumDebit -$monyCashBankmovesumCredit); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>مدينون  وارصدة مدينة اخرى</span>
                                            </td>
                                            <td scope="row"><?php echo e($ReceivablesBalancesmovesumDebit  - $ReceivablesBalancesmovesumCredit); ?></td>
                                        </tr>
                                        <?php
                                        $totalCurrentassets=((($monyCashBankmovesumDebit + $ReceivablesBalancesmovesumDebit) - ($monyCashBankmovesumCredit  + $ReceivablesBalancesmovesumCredit )));
                                        ?>
                                        <tr>
                                            <td><span class=" bold" style=" border-style: groove;">مجموع الأصول المتداولة</span>
                                            </td>
                                            
                                            <td style="    border-style: solid;"><?php echo e($totalCurrentassets); ?></td>
                                        </tr>
                                        <?php
                                            $totalAllassets=$totalfixedassets +  $totalCurrentassets;
                                        ?>
                                        <tr>
                                            <td><span class=" bold"
                                                      style=" border-style: groove;"> إجمالى الاصول </span>
                                            </td>
                                            <td style="    border-style: solid;"><?php echo e($totalAllassets); ?></td>
                                        </tr>
                                        <tr class="openTr pointer" id="parentTr">
                                            <td>
                                                <span class=" bold">الالزامات المتداوله<span
                                                            class="dropDownArrowLightGray">
                                                    </span></span>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><span>دائنون</span>
                                            </td>
                                            <td scope="row"><?php echo e($CurrentliabilitiesmovesumCredit - $CurrentliabilitiesmovesumDebit); ?></td>
                                        </tr>
                                        <?php
                                            $totalCurrentliabilities=$CurrentliabilitiesmovesumCredit - $CurrentliabilitiesmovesumDebit  ;
                                        ?>
                                        <tr>
                                            <td><span>  مجموع الإلتزامات المتداولة</span>
                                            </td>
                                            <td scope="row"><?php echo e($totalCurrentliabilities); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>  حقوق الملكية</span>
                                            </td>
                                            <td scope="row"><?php echo e($AngelrightsmovesumCredit - $AngelrightsmovesumDebit); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span>  راسمال الوقف</span>
                                            </td>
                                            <td scope="row"><?php echo e($EndowmentcapitalSumMoveCredit  - $EndowmentcapitalSumMoveDebit); ?></td>
                                        </tr>
                                        <?php
                                            $totalEndowmentcapital=$EndowmentcapitalSumMoveCredit  - $EndowmentcapitalSumMoveDebit;
                                        ?>

                                        <tr>
                                            <td><span>  احتياطيات ومخصصات</span>
                                            </td>
                                            <td scope="row"><?php echo e($ReservesprovisionsSumMoveCredit - $ReservesprovisionsSumMoveDebit); ?></td>
                                        </tr>
                                        <?php
                                            $totalReservesprovisions=$ReservesprovisionsSumMoveCredit - $ReservesprovisionsSumMoveDebit ;
                                        ?>
                                        <?php
                                            $totaldebitincome=$incomemovesumCredit  - $incomemovesumDebit;
                                            $totalcreditincome=$incomemovesumCredit  - $incomemovesumDebit;
                                        ?>
                                        <?php
                                            $sumexpensesdebit=$expensesmovesumDebit > 0 ? $expensesmovesumDebit : (-1* $expensesmovesumDebit);
                                            $sumexpensescredit=$expensesmovesumCredit > 0 ? $expensesmovesumCredit : (-1* $expensesmovesumCredit);
                                        ?>

                                        <?php
                                            $totaldebitexpenses=$sumexpensesdebit -$sumexpensescredit;
                                            $totalcreditexpenses=$sumexpensesdebit -$sumexpensescredit;
                                        ?>
                                        <tr>
                                            <td><span>  الفائض القابل للتوزيع</span>
                                            </td>
                                            <td scope="row"><?php echo e($totalcreditincome - $totalcreditexpenses); ?></td>
                                        </tr>
                                        <?php
                                            $totalDistributablesurplus=$totalcreditincome - $totalcreditexpenses  ;
                                            $total3=$totalReservesprovisions+$totalEndowmentcapital +$totalDistributablesurplus;
                                        ?>
                                        <tr>
                                            <td><span class=" bold" style=" border-style: groove;"> مجموع حقوق الملكية والمستفيدين </span>
                                            </td>
                                            
                                            <td style="    border-style: solid;"><?php echo e($total3); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class=" bold" style=" border-style: groove;"> مجموع حقوق الملكية والالتزامات </span>
                                            </td>
                                            <td style="    border-style: solid;"><?php echo e($totalCurrentliabilities + $total3); ?></td>
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
        $('#ordering_table').DataTable({
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

<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/users/balanceSheet/index.blade.php ENDPATH**/ ?>