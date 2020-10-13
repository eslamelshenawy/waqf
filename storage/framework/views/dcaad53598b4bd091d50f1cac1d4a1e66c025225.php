<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Balance</title>
    <link rel="stylesheet" href="css/scss/framworks/bootstrap.min.css" />
    <link rel="stylesheet" href="css/app-rtl.css" />
</head>
<!-- sheet styles -->
<style>
    .balance_sheet {
        display: flex;
        flex-flow: column;
        align-items: center;
    }
    .balance_sheet h3 {
        margin: 20px 0;
    }
    .table tbody tr:nth-of-type(odd) {
        background-color: #ddd;
    }
</style>


<body>
<div class="balance_sheet">

    <h3>الميزانية</h3>
    <table  class="table">
        <tbody>
        <tr >
            <th>الحساب
            </th>
            <th>
                مدين
            </th>
        </tr>

        </tbody>
        <tbody>
        <tr >
            <td>
                                                الأصول
            </td>
            <td></td>
        </tr>
        <tr >
            <td>
                                                الأصول الغير متداولة

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
        ?>
        <tr>
            <td>الأصول الثابتة بالصافى
            </td>
            
            <td ><?php echo e(($changesumDebit -$changesumCredit) >0 ? $changesumDebit -$changesumCredit : ""); ?></td>
        </tr>
        <tr>
            <td>مجموع الأصول غير متداولة
            </td>
            
            <td ><?php echo e($changesumDebit -$changesumCredit); ?></td>
        </tr>
        <?php
            $totalfixedassets=$changesumDebit -$changesumCredit;
        ?>
        <tr>
            <td>الأصول المتداولة
            </td>
            <td >---</td>
        </tr>
        <tr >
            <td>
                                                النقدية بالبنوك والصندوق

            </td>
            <td ><?php echo e($monyCashBankmovesumDebit -$monyCashBankmovesumCredit); ?></td>
        </tr>
        <tr>
            <td>مدينون  وارصدة مدينة اخرى
            </td>
            <td ><?php echo e($ReceivablesBalancesmovesumDebit  - $ReceivablesBalancesmovesumCredit); ?></td>
        </tr>
        <?php
            $totalCurrentassets=((($monyCashBankmovesumDebit + $ReceivablesBalancesmovesumDebit) - ($monyCashBankmovesumCredit  + $ReceivablesBalancesmovesumCredit )));
        ?>
        <tr>
            <td>مجموع الأصول المتداولة
            </td>
            
            <td ><?php echo e($totalCurrentassets); ?></td>
        </tr>
        <?php
            $totalAllassets=$totalfixedassets +  $totalCurrentassets;
        ?>
        <tr>
            <td> إجمالى الاصول
            </td>
            <td ><?php echo e($totalAllassets); ?></td>
        </tr>
        <tr >
            <td>
                                                الالزامات المتداوله

            </td>
            <td></td>
        </tr>
        <tr>
            <td>دائنون
            </td>
            <td ><?php echo e($CurrentliabilitiesmovesumCredit - $CurrentliabilitiesmovesumDebit); ?></td>
        </tr>
        <?php
            $totalCurrentliabilities=$CurrentliabilitiesmovesumCredit - $CurrentliabilitiesmovesumDebit  ;
        ?>
        <tr>
            <td>  مجموع الإلتزامات المتداولة
            </td>
            <td ><?php echo e($totalCurrentliabilities); ?></td>
        </tr>
        <tr>
            <td>  حقوق الملكية
            </td>
            <td ><?php echo e($AngelrightsmovesumCredit - $AngelrightsmovesumDebit); ?></td>
        </tr>
        <tr>
            <td>  راسمال الوقف
            </td>
            <td ><?php echo e($EndowmentcapitalSumMoveCredit  - $EndowmentcapitalSumMoveDebit); ?></td>
        </tr>
        <?php
            $totalEndowmentcapital=$EndowmentcapitalSumMoveCredit  - $EndowmentcapitalSumMoveDebit;
        ?>

        <tr>
            <td>  احتياطيات ومخصصات
            </td>
            <td ><?php echo e($ReservesprovisionsSumMoveCredit - $ReservesprovisionsSumMoveDebit); ?></td>
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
            <td>  الفائض القابل للتوزيع
            </td>
            <td ><?php echo e($totalcreditincome - $totalcreditexpenses); ?></td>
        </tr>
        <?php
            $totalDistributablesurplus=$totalcreditincome - $totalcreditexpenses  ;
            $total3=$totalReservesprovisions+$totalEndowmentcapital +$totalDistributablesurplus;
        ?>
        <tr>
            <td> مجموع حقوق الملكية والمستفيدين
            </td>
            
            <td ><?php echo e($total3); ?></td>
        </tr>
        <tr>
            <td> مجموع حقوق الملكية والالتزامات
            </td>
            <td ><?php echo e($totalCurrentliabilities + $total3); ?></td>
        </tr>


        </tbody>

    </table>
</div>
</body>
</html>


<?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/users/result.blade.php ENDPATH**/ ?>