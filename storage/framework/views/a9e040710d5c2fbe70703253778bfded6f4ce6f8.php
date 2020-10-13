<?php $__env->startSection('content'); ?>
    <section >
        <div class="container" >
            <?php echo $__env->make('accounting::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php echo $__env->make('accounting::accounts.partials._new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="table-responsive">
                                <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">الكود </th>
                                        <th class="text-center">الحساب</th>
                                        <th class="text-center" colspan="2">رصيد اول المده </th>
                                        <th class="text-center" colspan="2">لحركه</th>
                                        <th class="text-center" colspan="2">رصيد اخر المده</th>
                                    </tr>
                                    </thead>
                                    <?php $Accounts = app('\Modules\Accounting\Entities\Account'); ?>
                                    <?php $Journal = app('\Modules\Accounting\Entities\Journal'); ?>
                                    <?php
                                        $sumdebit=0;
                                        $sumcredit=0;
                                        $sumAssetsDebit=0;
                                        $sumassetsJournalsDebit=0;
                                        $sumAssetsDebitFist=0;
                                        $sumAssetsCreditFisrt=0;
                                        $sumAssetsCredit=0;
                                        $sumassetsJournalsCredit=0;
                                        $arrayAssetId=[];
                                            $assets=$Accounts->whereIn('code',[111,112,113,114,12111,12112,12113,12121,12122,141,1421,1431,131,1321,1322,1331,13231])->get();
                                            $monyCashBank=$Accounts->whereIn('code',[12111,12112,12113,12121,12122])->get();
                                            $assetsCustomers=$Accounts->whereIn('code',[131,1321,1322,1331])->get();
                                            $assetsdebits=$Accounts->whereIn('code',[141,1421,1431])->get();
                                            $Opponents=$Accounts->whereIn('code',[211,212,2131,2132,221,222,231,232,233,234])->get();
                                            $expenses=$Accounts->whereIn('code',[31,3111,3112,3121,3211,3212,3213,3214,3215,3221,3222,3223,3224])->get();
                                            $revenues=$Accounts->whereIn('code',[42,413,412,411])->get();
                                            foreach ($assets as $asset){
                                                array_push($arrayAssetId,$asset->id);
                                                   $sumAssetsDebit +=$asset->debit;
                                                   $sumAssetsDebitFist +=$asset->debitFrist;
                                                   $sumAssetsCreditFisrt +=$asset->creditFirst;
                                                   $sumAssetsCredit +=$asset->credit;
                                            }
                                            $assetsJournals=$Journal->whereIn('journalable_id',$arrayAssetId)->get();
                                            foreach ($assetsJournals as $assetsJournal){
                                                $sumassetsJournalsCredit +=$assetsJournal->credit;
                                                $sumassetsJournalsDebit +=$assetsJournal->debit;
                                            }
                                            // lands
                                            $land =$Accounts->where('code',111)->first();
                                            $landMove= $Journal->where('journalable_id',$land->id)->get();
                                            $landSumMoveDebit=0;
                                            $landSumMoveCredit=0;
                                             foreach ($landMove as $assetsJournal){
                                                $landSumMoveDebit +=$assetsJournal->debit;
                                                $landSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end lands
                                            // building
                                            $building =$Accounts->where('code',112)->first();
                                            $buildingMove= $Journal->where('journalable_id',$building->id)->get();
                                            $buildingSumMoveDebit=0;
                                            $buildingSumMoveCredit=0;
                                             foreach ($buildingMove as $assetsJournal){
                                                $buildingSumMoveDebit +=$assetsJournal->debit;
                                                $buildingSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end building
                                            // Machinery and equipment
                                            $Machinery =$Accounts->where('code',113)->first();
                                            $MachineryMove= $Journal->where('journalable_id',$Machinery->id)->get();
                                            $MachinerySumMoveDebit=0;
                                            $MachinerySumMoveCredit=0;
                                             foreach ($MachineryMove as $assetsJournal){
                                                $MachinerySumMoveDebit +=$assetsJournal->debit;
                                                $MachinerySumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Machinery and equipment
                                            // stock
                                            $stock =$Accounts->where('code',114)->first();
                                            $stockMove= $Journal->where('journalable_id',$stock->id)->get();
                                            $stockSumMoveDebit=0;
                                            $stockSumMoveCredit=0;
                                             foreach ($stockMove as $assetsJournal){
                                                $stockSumMoveDebit +=$assetsJournal->debit;
                                                $stockSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end stock
                                            // box1
                                            $box1 =$Accounts->where('code',12111)->first();
                                            $box1Move= $Journal->where('journalable_id',$box1->id)->get();
                                            $box1SumMoveDebit=0;
                                            $box1SumMoveCredit=0;
                                             foreach ($box1Move as $assetsJournal){
                                                $box1SumMoveDebit +=$assetsJournal->debit;
                                                $box1SumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end box1
                                            // box2
                                            $box2 =$Accounts->where('code',12112)->first();
                                            $box2Move= $Journal->where('journalable_id',$box2->id)->get();
                                            $box2SumMoveDebit=0;
                                            $box2SumMoveCredit=0;
                                             foreach ($box2Move as $assetsJournal){
                                                $box2SumMoveDebit +=$assetsJournal->debit;
                                                $box2SumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end box2
                                            // boxcheck
                                            $boxcheck =$Accounts->where('code',12113)->first();
                                            $boxcheckMove= $Journal->where('journalable_id',$boxcheck->id)->get();
                                            $boxcheckSumMoveDebit=0;
                                            $boxcheckSumMoveCredit=0;
                                             foreach ($boxcheckMove as $assetsJournal){
                                                $boxcheckSumMoveDebit +=$assetsJournal->debit;
                                                $boxcheckSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end boxcheck
                                            // bank1
                                            $bank1 =$Accounts->where('code',12121)->first();
                                            $bank1Move= $Journal->where('journalable_id',$bank1->id)->get();
                                            $bank1SumMoveDebit=0;
                                            $bank1SumMoveCredit=0;
                                             foreach ($bank1Move as $assetsJournal){
                                                $bank1SumMoveDebit += ($assetsJournal->debit > 0 ? $assetsJournal->debit : (-1*$assetsJournal->debit) );
                                                $bank1SumMoveCredit += ($assetsJournal->credit > 0 ? $assetsJournal->credit : (-1*$assetsJournal->credit) );
                                            }
                                             //end bank1
                                            // bank2
                                            $bank2 =$Accounts->where('code',12122)->first();
                                            $bank2Move= $Journal->where('journalable_id',$bank2->id)->get();
                                            $bank2SumMoveDebit=0;
                                            $bank2SumMoveCredit=0;
                                             foreach ($bank2Move as $assetsJournal){
                                                $bank2SumMoveDebit +=$assetsJournal->debit;
                                                $bank2SumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end bank2
                                            // customers
                                            $customers =$Accounts->where('code',131)->first();
                                            $customersMove= $Journal->where('journalable_id',$customers->id)->get();
                                            $customersSumMoveDebit=0;
                                            $customersSumMoveCredit=0;
                                             foreach ($customersMove as $assetsJournal){
                                                $customersSumMoveDebit +=$assetsJournal->debit;
                                                $customersSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end customers
                                            // promise
                                            $promise =$Accounts->where('code',1321)->first();
                                            $promiseMove= $Journal->where('journalable_id',$promise->id)->get();
                                            $promiseSumMoveDebit=0;
                                            $promiseSumMoveCredit=0;
                                             foreach ($promiseMove as $assetsJournal){
                                                $promiseSumMoveDebit +=$assetsJournal->debit;
                                                $promiseSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end promise
                                            // advance
                                            $advance =$Accounts->where('code',1322)->first();
                                            $advanceMove= $Journal->where('journalable_id',$advance->id)->get();
                                            $advanceSumMoveDebit=0;
                                            $advanceSumMoveCredit=0;
                                             foreach ($advanceMove as $assetsJournal){
                                                $advanceSumMoveDebit +=$assetsJournal->debit;
                                                $advanceSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end advance
                                            // Insurances
                                            $Insurances =$Accounts->where('code',1331)->first();
                                            $InsurancesMove= $Journal->where('journalable_id',$Insurances->id)->get();
                                            $InsurancesSumMoveDebit=0;
                                            $InsurancesSumMoveCredit=0;
                                             foreach ($InsurancesMove as $assetsJournal){
                                                $InsurancesSumMoveDebit +=$assetsJournal->debit;
                                                $InsurancesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Insurances
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
                                            // Accrued revenue
                                            $Accrued =$Accounts->where('code',1421)->first();
                                            $AccruedMove= $Journal->where('journalable_id',$Accrued->id)->get();
                                            $AccruedSumMoveDebit=0;
                                            $AccruedSumMoveCredit=0;
                                             foreach ($AccruedMove as $assetsJournal){
                                                $AccruedSumMoveDebit +=$assetsJournal->debit;
                                                $AccruedSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Accrued
                                            // Advancedexpenses
                                            $Advancedexpenses =$Accounts->where('code',1431)->first();
                                            $AdvancedexpensesMove= $Journal->where('journalable_id',$Advancedexpenses->id)->get();
                                            $AdvancedexpensesSumMoveDebit=0;
                                            $AdvancedexpensesSumMoveCredit=0;
                                             foreach ($AdvancedexpensesMove as $assetsJournal){
                                                $AdvancedexpensesSumMoveDebit +=$assetsJournal->debit;
                                                $AdvancedexpensesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Accrued
                                            // BeneficiaryAdvance
                                            $BeneficiaryAdvanceexpenses =$Accounts->where('code',13231)->first();
                                            $BeneficiaryAdvanceexpensesMove= $Journal->where('journalable_id',$BeneficiaryAdvanceexpenses->id)->get();
                                            $BeneficiaryAdvanceexpensesSumMoveDebit=0;
                                            $BeneficiaryAdvanceexpensesSumMoveCredit=0;
                                             foreach ($BeneficiaryAdvanceexpensesMove as $assetsJournal){
                                                $BeneficiaryAdvanceexpensesSumMoveDebit +=$assetsJournal->debit;
                                                $BeneficiaryAdvanceexpensesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end BeneficiaryAdvanceexpenses
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
                                            // beneficial1
                                            $beneficial1 =$Accounts->where('code',2131)->first();
                                            $beneficial1Move= $Journal->where('journalable_id',$beneficial1->id)->get();
                                            $beneficial1SumMoveDebit=0;
                                            $beneficial1SumMoveCredit=0;
                                             foreach ($beneficial1Move as $assetsJournal){
                                                $beneficial1SumMoveDebit +=$assetsJournal->debit;
                                                $beneficial1SumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end beneficial1
                                            // beneficial2
                                            $beneficial2 =$Accounts->where('code',2132)->first();
                                            $beneficial2Move= $Journal->where('journalable_id',$beneficial2->id)->get();
                                            $beneficial2SumMoveDebit=0;
                                            $beneficial2SumMoveCredit=0;
                                             foreach ($beneficial2Move as $assetsJournal){
                                                $beneficial2SumMoveDebit +=$assetsJournal->debit;
                                                $beneficial2SumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end beneficial2
                                            // Deservedengagements
                                            $deservedengagements =$Accounts->where('code',221)->first();
                                            $deservedengagementsMove= $Journal->where('journalable_id',$deservedengagements->id)->get();
                                            $deservedengagementsSumMoveDebit=0;
                                            $deservedengagementsSumMoveCredit=0;
                                             foreach ($deservedengagementsMove as $assetsJournal){
                                                $deservedengagementsSumMoveDebit +=$assetsJournal->debit;
                                                $deservedengagementsSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end deservedengagementsSumMoveCredit
                                            // miscellaneouscreditors
                                            $miscellaneouscreditors =$Accounts->where('code',222)->first();
                                            $miscellaneouscreditorsMove= $Journal->where('journalable_id',$miscellaneouscreditors->id)->get();
                                            $miscellaneouscreditorsSumMoveDebit=0;
                                            $miscellaneouscreditorsSumMoveCredit=0;
                                             foreach ($miscellaneouscreditorsMove as $assetsJournal){
                                                $miscellaneouscreditorsSumMoveDebit +=$assetsJournal->debit;
                                                $miscellaneouscreditorsSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end miscellaneouscreditors
                                            // Buildingcomplex
                                            $Buildingcomplex =$Accounts->where('code',231)->first();
                                            $BuildingcomplexMove= $Journal->where('journalable_id',$Buildingcomplex->id)->get();
                                            $BuildingcomplexSumMoveDebit=0;
                                            $BuildingcomplexSumMoveCredit=0;
                                             foreach ($BuildingcomplexMove as $assetsJournal){
                                                $BuildingcomplexSumMoveDebit +=$assetsJournal->debit;
                                                $BuildingcomplexSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Buildingcomplex
                                            // Assembly
                                            $Assembly =$Accounts->where('code',232)->first();
                                            $AssemblyMove= $Journal->where('journalable_id',$Assembly->id)->get();
                                            $AssemblySumMoveDebit=0;
                                            $AssemblySumMoveCredit=0;
                                             foreach ($AssemblyMove as $assetsJournal){
                                                $AssemblySumMoveDebit +=$assetsJournal->debit;
                                                $AssemblySumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Assembly
                                            // Hardwarecomplex
                                            $Hardwarecomplex =$Accounts->where('code',233)->first();
                                            $HardwarecomplexMove= $Journal->where('journalable_id',$Hardwarecomplex->id)->get();
                                            $HardwarecomplexSumMoveDebit=0;
                                            $HardwarecomplexSumMoveCredit=0;
                                             foreach ($HardwarecomplexMove as $assetsJournal){
                                                $HardwarecomplexSumMoveDebit +=$assetsJournal->debit;
                                                $HardwarecomplexSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Hardwarecomplex
                                            // Furniturecomplex
                                            $Furniturecomplex =$Accounts->where('code',234)->first();
                                            $FurniturecomplexMove= $Journal->where('journalable_id',$Furniturecomplex->id)->get();
                                            $FurniturecomplexSumMoveDebit=0;
                                            $FurniturecomplexSumMoveCredit=0;
                                             foreach ($FurniturecomplexMove as $assetsJournal){
                                                $FurniturecomplexSumMoveDebit +=$assetsJournal->debit;
                                                $FurniturecomplexSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Furniturecomplex
                                            // maintenance1
                                            $maintenance1 =$Accounts->where('code',3111)->first();
                                            $maintenance1Move= $Journal->where('journalable_id',$maintenance1->id)->get();
                                            $maintenance1SumMoveDebit=0;
                                            $maintenance1SumMoveCredit=0;
                                             foreach ($maintenance1Move as $assetsJournal){
                                                $maintenance1SumMoveDebit +=$assetsJournal->debit;
                                                $maintenance1SumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end maintenance1
                                            // maintenance2
                                            $maintenance2 =$Accounts->where('code',3112)->first();
                                            $maintenance2Move= $Journal->where('journalable_id',$maintenance2->id)->get();
                                            $maintenance2SumMoveDebit=0;
                                            $maintenance2SumMoveCredit=0;
                                             foreach ($maintenance2Move as $assetsJournal){
                                                $maintenance2SumMoveDebit +=$assetsJournal->debit;
                                                $maintenance2SumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end maintenance2
                                            // genre
                                            $genre =$Accounts->where('code',3121)->first();
                                            $genreMove= $Journal->where('journalable_id',$genre->id)->get();
                                            $genreSumMoveDebit=0;
                                            $genreSumMoveCredit=0;
                                             foreach ($genreMove as $assetsJournal){
                                                $genreSumMoveDebit +=$assetsJournal->debit;
                                                $genreSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end genre
                                            // Wages and salaries
                                            $salaries =$Accounts->where('code',3211)->first();
                                            $salariesMove= $Journal->where('journalable_id',$salaries->id)->get();
                                            $salariesSumMoveDebit=0;
                                            $salariesSumMoveCredit=0;
                                             foreach ($salariesMove as $assetsJournal){
                                                $salariesSumMoveDebit +=$assetsJournal->debit;
                                                $salariesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end salaries
                                            // Officetools
                                            $Officetools =$Accounts->where('code',3212)->first();
                                            $OfficetoolsMove= $Journal->where('journalable_id',$Officetools->id)->get();
                                            $OfficetoolsSumMoveDebit=0;
                                            $OfficetoolsSumMoveCredit=0;
                                             foreach ($OfficetoolsMove as $assetsJournal){
                                                $OfficetoolsSumMoveDebit +=$assetsJournal->debit;
                                                $OfficetoolsSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Officetools
                                            // Telecomexpenses
                                            $Telecomexpenses =$Accounts->where('code',3213)->first();
                                            $TelecomexpensesMove= $Journal->where('journalable_id',$Telecomexpenses->id)->get();
                                            $TelecomexpensesSumMoveDebit=0;
                                            $TelecomexpensesSumMoveCredit=0;
                                             foreach ($TelecomexpensesMove as $assetsJournal){
                                                $TelecomexpensesSumMoveDebit +=$assetsJournal->debit;
                                                $TelecomexpensesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Telecomexpenses
                                            // Transferexpenses
                                            $Transferexpenses =$Accounts->where('code',3214)->first();
                                            $TransferexpensesMove= $Journal->where('journalable_id',$Transferexpenses->id)->get();
                                            $TransferexpensesSumMoveDebit=0;
                                            $TransferexpensesSumMoveCredit=0;
                                             foreach ($TransferexpensesMove as $assetsJournal){
                                                $TransferexpensesSumMoveDebit +=$assetsJournal->debit;
                                                $TransferexpensesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Transferexpenses
                                            // Buildingdepreciationexpenses
                                            $Buildingdepreciationexpenses =$Accounts->where('code',3221)->first();
                                            $BuildingdepreciationexpensesMove= $Journal->where('journalable_id',$Buildingdepreciationexpenses->id)->get();
                                            $BuildingdepreciationexpensesSumMoveDebit=0;
                                            $BuildingdepreciationexpensesSumMoveCredit=0;
                                             foreach ($BuildingdepreciationexpensesMove as $assetsJournal){
                                                $BuildingdepreciationexpensesSumMoveDebit +=$assetsJournal->debit;
                                                $BuildingdepreciationexpensesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Buildingdepreciationexpenses
                                            // machinerydepreciationexpenses
                                            $machinerydepreciationexpenses =$Accounts->where('code',3222)->first();
                                            $machinerydepreciationexpensesMove= $Journal->where('journalable_id',$machinerydepreciationexpenses->id)->get();
                                            $machinerydepreciationexpensesSumMoveDebit=0;
                                            $machinerydepreciationexpensesSumMoveCredit=0;
                                             foreach ($machinerydepreciationexpensesMove as $assetsJournal){
                                                $machinerydepreciationexpensesSumMoveDebit +=$assetsJournal->debit;
                                                $machinerydepreciationexpensesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end machinerydepreciationexpenses
                                            // Equipmentdepreciationexpenses
                                            $Equipmentdepreciationexpenses =$Accounts->where('code',3223)->first();
                                            $EquipmentdepreciationexpensesMove= $Journal->where('journalable_id',$Equipmentdepreciationexpenses->id)->get();
                                            $EquipmentdepreciationexpensesSumMoveDebit=0;
                                            $EquipmentdepreciationexpensesSumMoveCredit=0;
                                             foreach ($EquipmentdepreciationexpensesMove as $assetsJournal){
                                                $EquipmentdepreciationexpensesSumMoveDebit +=$assetsJournal->debit;
                                                $EquipmentdepreciationexpensesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Transferexpenses
                                            // Furniture
                                            $Furnituredeprexpenses =$Accounts->where('code',3224)->first();
                                            $FurnituredeprexpensesMove= $Journal->where('journalable_id',$Furnituredeprexpenses->id)->get();
                                            $FurnituredeprexpensesSumMoveDebit=0;
                                            $FurnituredeprexpensesSumMoveCredit=0;
                                             foreach ($FurnituredeprexpensesMove as $assetsJournal){
                                                $FurnituredeprexpensesSumMoveDebit +=$assetsJournal->debit;
                                                $FurnituredeprexpensesSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Furnituredeprexpenses
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
                                            // Revenuestores
                                            $Revenuestores =$Accounts->where('code',412)->first();
                                            $RevenuestoresMove= $Journal->where('journalable_id',$Revenuestores->id)->get();
                                            $RevenuestoresSumMoveDebit=0;
                                            $RevenuestoresSumMoveCredit=0;
                                             foreach ($RevenuestoresMove as $assetsJournal){
                                                $RevenuestoresSumMoveDebit +=$assetsJournal->debit;
                                                $RevenuestoresSumMoveCredit +=$assetsJournal->credit;
                                            }
                                             //end Transferexpenses
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
                                            $sumFADebit1=0;
                                            $sumFADebit=0;
                                            $sumFACedit1=0;
                                            $sumFACedit=0;
                                            $changesumDebit=0;
                                            $changesumCredit=0;
                                            $arrayAssetId1=[];
                                            $fixedAssets=$Accounts->where('code',[111,112,113])->get();
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
                                            $sumcashDebit1=0;
                                            $sumcashDebit=0;
                                            $sumcashCedit1=0;
                                            $sumcashCedit=0;
                                            $cashmovesumDebit=0;
                                            $cashmovesumCredit=0;
                                            $arrayAssetId3=[];
                                          $monyCash=$Accounts->whereIn('code',[12111,12112,12113])->get();
                                               foreach ($monyCash as $asset){
                                                array_push($arrayAssetId3,$asset->id);
                                                   $sumcashDebit +=$asset->debit;
                                                   $sumcashDebit1 +=$asset->debitFrist;
                                                   $sumcashCedit1 +=$asset->creditFirst;
                                                   $sumcashCedit +=$asset->credit;
                                            }
                                            $cashJournals=$Journal->whereIn('journalable_id',$arrayAssetId3)->get();
                                            foreach ($cashJournals as $assetsJournal){
                                                $cashmovesumCredit +=$assetsJournal->credit;
                                                $cashmovesumDebit +=$assetsJournal->debit;
                                            }

                                            $sumbankDebit1=0;
                                            $sumbankDebit=0;
                                            $sumbankCedit1=0;
                                            $sumbankCedit=0;
                                            $bankmovesumDebit=0;
                                            $bankmovesumCredit=0;
                                            $arrayAssetId4=[];
                                          $monyBank=$Accounts->whereIn('code',[12121,12122])->get();
                                               foreach ($monyBank as $asset){
                                                array_push($arrayAssetId4,$asset->id);
                                                   $sumbankDebit += ($asset->debit > 0 ? $asset->debit : (-1*$asset->debit) );
                                                   $sumbankDebit1 += ($asset->debitFrist > 0 ? $asset->debitFrist : (-1*$asset->debitFrist) );
                                                   $sumbankCedit1 +=($asset->creditFirst > 0 ? $asset->creditFirst : (-1*$asset->creditFirst) );
                                                   $sumbankCedit +=($asset->credit > 0 ? $asset->credit : (-1*$asset->credit) );
                                            }
                                            $bankJournals=$Journal->whereIn('journalable_id',$arrayAssetId4)->get();
                                            foreach ($bankJournals as $assetsJournal){
                                                $bankmovesumCredit +=$assetsJournal->credit;
                                                $bankmovesumDebit +=$assetsJournal->debit;
                                            }

                                            $sumDebtorsDebit1=0;
                                            $sumDebtorsDebit=0;
                                            $sumDebtorsCedit1=0;
                                            $sumDebtorsCedit=0;
                                            $DebtorsmovesumDebit=0;
                                            $DebtorsmovesumCredit=0;
                                            $arrayAssetId5=[];
                                          $Debtors=$Accounts->whereIn('code',[131,1321,1322,1331,13231])->get();
                                               foreach ($Debtors as $asset){
                                                array_push($arrayAssetId5,$asset->id);
                                                   $sumDebtorsDebit +=($asset->debit > 0 ? $asset->debit : (-1*$asset->debit) );
                                                   $sumDebtorsDebit1 +=($asset->debitFrist > 0 ? $asset->debitFrist : (-1*$asset->debitFrist) );
                                                   $sumDebtorsCedit1 +=($asset->creditFirst > 0 ? $asset->creditFirst : (-1*$asset->creditFirst) );
                                                   $sumDebtorsCedit +=($asset->credit > 0 ? $asset->credit : (-1*$asset->credit) );
                                            }
                                            $DebtorsJournals=$Journal->whereIn('journalable_id',$arrayAssetId5)->get();
                                            foreach ($DebtorsJournals as $assetsJournal){
                                                $DebtorsmovesumCredit +=$assetsJournal->credit;
                                                $DebtorsmovesumDebit +=$assetsJournal->debit;
                                            }
                                            $sumEndowmentrevenueDebit1=0;
                                            $sumEndowmentrevenueDebit=0;
                                            $sumEndowmentrevenueCedit1=0;
                                            $sumEndowmentrevenueCedit=0;
                                            $EndowmentrevenuemovesumDebit=0;
                                            $EndowmentrevenuemovesumCredit=0;
                                            $arrayAssetId6=[];
                                          $Endowmentrevenue=$Accounts->whereIn('code',[411,412])->get();
                                               foreach ($Endowmentrevenue as $asset){
                                                array_push($arrayAssetId6,$asset->id);
                                                   $sumEndowmentrevenueDebit +=$asset->debit;
                                                   $sumEndowmentrevenueDebit1 +=$asset->debitFrist;
                                                   $sumEndowmentrevenueCedit1 +=$asset->creditFirst;
                                                   $sumEndowmentrevenueCedit +=$asset->credit;
                                            }
                                            $EndowmentrevenueJournals=$Journal->whereIn('journalable_id',$arrayAssetId6)->get();
                                            foreach ($EndowmentrevenueJournals as $assetsJournal){
                                                $EndowmentrevenuemovesumCredit +=$assetsJournal->credit;
                                                $EndowmentrevenuemovesumDebit +=$assetsJournal->debit;
                                            }
                                            $sumOpponentsDebit1=0;
                                            $sumOpponentsDebit=0;
                                            $sumOpponentsCedit1=0;
                                            $sumOpponentsCedit=0;
                                            $OpponentsmovesumDebit=0;
                                            $OpponentsmovesumCredit=0;
                                            $arrayAssetId7=[];
                                          $Opponents=$Accounts->whereIn('code',[211,212,2131,2132,221,222,231,232,233,234])->get();
                                               foreach ($Opponents as $asset){
                                                array_push($arrayAssetId7,$asset->id);
                                                   $sumOpponentsDebit +=$asset->debit;
                                                   $sumOpponentsDebit1 +=$asset->debitFrist;
                                                   $sumOpponentsCedit1 +=$asset->creditFirst;
                                                   $sumOpponentsCedit +=$asset->credit;
                                            }
                                            $OpponentsJournals=$Journal->whereIn('journalable_id',$arrayAssetId7)->get();
                                            foreach ($OpponentsJournals as $assetsJournal){
                                                $OpponentsmovesumCredit +=$assetsJournal->credit;
                                                $OpponentsmovesumDebit +=$assetsJournal->debit;
                                            }
                                            $sumassetsDebit1=0;
                                            $sumassetsDebit=0;
                                            $sumassetsCedit1=0;
                                            $sumassetsCedit=0;
                                            $assetsmovesumDebit=0;
                                            $assetsmovesumCredit=0;
                                            $arrayAssetId99=[];
                                            $assets=$Accounts->whereIn('code',[111,112,113,114,12111,12112,12113,12121,12122,141,1421,1431,131,1321,1322,1331,13231])->get();
                                               foreach ($assets as $asset){
                                                array_push($arrayAssetId99,$asset->id);
                                                   $sumassetsDebit +=$asset->debit;
                                                   $sumassetsDebit1 +=$asset->debitFrist;
                                                   $sumassetsCedit1 +=$asset->creditFirst;
                                                   $sumassetsCedit +=$asset->credit;
                                            }
                                            $assetsJournals=$Journal->whereIn('journalable_id',$arrayAssetId99)->get();
                                            foreach ($assetsJournals as $assetsJournal){
                                                $assetsmovesumCredit +=$assetsJournal->credit;
                                                $assetsmovesumDebit +=$assetsJournal->debit;
                                            }
                                            $sumfixedAssetsDebit1=0;
                                            $sumfixedAssetsDebit=0;
                                            $sumfixedAssetsCedit1=0;
                                            $sumfixedAssetsCedit=0;
                                            $fixedAssetsmovesumDebit=0;
                                            $fixedAssetsmovesumCredit=0;
                                            $arrayAssetId101=[];
                                            $fixedAssets=$Accounts->whereIn('code',[111,112,113])->get();
                                               foreach ($fixedAssets as $asset){
                                                array_push($arrayAssetId101,$asset->id);
                                                   $sumfixedAssetsDebit +=$asset->debit;
                                                   $sumfixedAssetsDebit1 +=$asset->debitFrist;
                                                   $sumfixedAssetsCedit1 +=$asset->creditFirst;
                                                   $sumfixedAssetsCedit +=$asset->credit;
                                            }
                                            $fixedAssetsJournals=$Journal->whereIn('journalable_id',$arrayAssetId101)->get();
                                            foreach ($fixedAssetsJournals as $fixedAssetsJournal){
                                                $fixedAssetsmovesumCredit +=$fixedAssetsJournal->credit;
                                                $fixedAssetsmovesumDebit +=$fixedAssetsJournal->debit;
                                            }

                                            $sumMaintenanceexpensesDebit1=0;
                                            $sumMaintenanceexpensesDebit=0;
                                            $sumMaintenanceexpensesCedit1=0;
                                            $sumMaintenanceexpensesCedit=0;
                                            $MaintenanceexpensesmovesumDebit=0;
                                            $MaintenanceexpensesmovesumCredit=0;
                                            $arrayAssetId8=[];
                                          $Maintenanceexpenses=$Accounts->whereIn('code',[3111,3112])->get();
                                               foreach ($Maintenanceexpenses as $asset){
                                                array_push($arrayAssetId8,$asset->id);
                                                   $sumMaintenanceexpensesDebit +=$asset->debit;
                                                   $sumMaintenanceexpensesDebit1 +=$asset->debitFrist;
                                                   $sumMaintenanceexpensesCedit1 +=$asset->creditFirst;
                                                   $sumMaintenanceexpensesCedit +=$asset->credit;
                                            }
                                            $MaintenanceexpensesJournals=$Journal->whereIn('journalable_id',$arrayAssetId8)->get();
                                            foreach ($MaintenanceexpensesJournals as $assetsJournal){
                                                $MaintenanceexpensesmovesumCredit +=$assetsJournal->credit;
                                                $MaintenanceexpensesmovesumDebit +=$assetsJournal->debit;
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

                                            $sumOtherbalancesDebit1=0;
                                            $sumOtherbalancesDebit=0;
                                            $sumOtherbalancesCedit1=0;
                                            $sumOtherbalancesCedit=0;
                                            $OtherbalancesmovesumDebit=0;
                                            $OtherbalancesmovesumCredit=0;
                                            $arrayAssetId12=[];
                                          $Otherbalances=$Accounts->whereIn('code',[141,1421,1431])->get();
                                               foreach ($Otherbalances as $asset){
                                                array_push($arrayAssetId12,$asset->id);
                                                   $sumOtherbalancesDebit +=$asset->debit;
                                                   $sumOtherbalancesDebit1 +=$asset->debitFrist;
                                                   $sumOtherbalancesCedit1 +=$asset->creditFirst;
                                                   $sumOtherbalancesCedit +=$asset->credit;
                                            }
                                            $OtherbalancesJournals=$Journal->whereIn('journalable_id',$arrayAssetId12)->get();
                                            foreach ($OtherbalancesJournals as $assetsJournal){
                                                $OtherbalancesmovesumCredit +=$assetsJournal->credit;
                                                $OtherbalancesmovesumDebit +=$assetsJournal->debit;
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

                                            $sumDepreciationfixedassetsDebit1=0;
                                            $sumDepreciationfixedassetsDebit=0;
                                            $sumDepreciationfixedassetsCedit1=0;
                                            $sumDepreciationfixedassetsCedit=0;
                                            $DepreciationfixedassetsmovesumDebit=0;
                                            $DepreciationfixedassetsmovesumCredit=0;
                                            $arrayAssetId18=[];
                                          $Depreciationfixedassets=$Accounts->whereIn('code',[231,232,233,234])->get();
                                               foreach ($Depreciationfixedassets as $asset){
                                                array_push($arrayAssetId18,$asset->id);
                                                   $sumDepreciationfixedassetsDebit +=$asset->debit;
                                                   $sumDepreciationfixedassetsDebit1 +=$asset->debitFrist;
                                                   $sumDepreciationfixedassetsCedit1 +=$asset->creditFirst;
                                                   $sumDepreciationfixedassetsCedit +=$asset->credit;
                                            }
                                            $DepreciationfixedassetsJournals=$Journal->whereIn('journalable_id',$arrayAssetId18)->get();
                                            foreach ($DepreciationfixedassetsJournals as $assetsJournal){
                                                $DepreciationfixedassetsmovesumCredit +=$assetsJournal->credit;
                                                $DepreciationfixedassetsmovesumDebit +=$assetsJournal->debit;
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

                                    ?>
                                    <tbody>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1</td>
                                        <td scope="row">الاصول</td>
                                        <td scope="row"><?php echo e($sumassetsDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumassetsCedit1); ?></td>
                                        <td scope="row"><?php echo e($assetsmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($assetsmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($assetsmovesumDebit -$assetsmovesumCredit) > 0 ? ($assetsmovesumDebit -$assetsmovesumCredit) : ""); ?></td>
                                        <td scope="row"><?php echo e(($assetsmovesumDebit -$assetsmovesumCredit) <0 ? ($assetsmovesumDebit -$assetsmovesumCredit) : ""); ?></td>
                                    </tr>
                                    <?php
                                        $totallastassets=$assetsmovesumDebit - $assetsmovesumCredit;
                                    $totalmoveassetsdebit=$sumassetsJournalsDebit;
                                    $totalmoveassetscredit=$sumassetsJournalsCredit;
                                    ?>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">11</td>
                                        <td scope="row">الاصول الثابته </td>
                                        <td scope="row"><?php echo e($sumfixedAssetsDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumfixedAssetsCedit1); ?></td>
                                        <td scope="row"><?php echo e($fixedAssetsmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($fixedAssetsmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($fixedAssetsmovesumDebit -$fixedAssetsmovesumCredit) >0 ? $fixedAssetsmovesumDebit -$fixedAssetsmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($fixedAssetsmovesumDebit -$fixedAssetsmovesumCredit) <0 ? $fixedAssetsmovesumDebit -$fixedAssetsmovesumCredit : ""); ?></td>
                                    </tr>

                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">111</td>
                                        <td scope="row">الاراضى</td>
                                        <td scope="row"><?php echo e($land->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($land->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($landSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($landSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($landSumMoveDebit -$landSumMoveCredit) >0 ? $landSumMoveDebit -$landSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($landSumMoveDebit -$landSumMoveCredit) <0 ? $landSumMoveDebit -$landSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">112</td>
                                        <td scope="row">المبانى </td>
                                        <td scope="row"><?php echo e($building->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($building->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($buildingSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($buildingSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($buildingSumMoveDebit -$buildingSumMoveCredit) >0 ? $buildingSumMoveDebit -$buildingSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($buildingSumMoveDebit -$buildingSumMoveCredit) <0 ? $buildingSumMoveDebit -$buildingSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">12</td>
                                        <td scope="row">الاصول المتداوله </td>
                                        <td scope="row"><?php echo e($sumbankDebit1 + $sumcashDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumbankCedit1 + $sumcashCedit1); ?></td>
                                        <td scope="row"><?php echo e($bankmovesumDebit + $cashmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($cashmovesumCredit + $bankmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e((($bankmovesumDebit + $cashmovesumDebit) -($cashmovesumCredit + $bankmovesumCredit)) > 0 ? (($bankmovesumDebit + $cashmovesumDebit) -($cashmovesumCredit + $bankmovesumCredit)) : 0); ?></td>
                                        <td scope="row"><?php echo e((($bankmovesumDebit + $cashmovesumDebit) -($cashmovesumCredit + $bankmovesumCredit)) < 0 ? (($bankmovesumDebit + $cashmovesumDebit) -($cashmovesumCredit + $bankmovesumCredit)) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">121</td>
                                        <td scope="row">النقدية بالبنوك والخزينه </td>
                                        <td scope="row"><?php echo e($summonyCashBankDebit1); ?></td>
                                        <td scope="row"><?php echo e($summonyCashBankCedit1); ?></td>
                                        <td scope="row"><?php echo e($monyCashBankmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($monyCashBankmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($monyCashBankmovesumDebit -$monyCashBankmovesumCredit) >0 ? $monyCashBankmovesumDebit -$monyCashBankmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($monyCashBankmovesumDebit -$monyCashBankmovesumCredit) <0 ? $monyCashBankmovesumDebit -$monyCashBankmovesumCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1211</td>
                                        <td scope="row">نقديه بالخزينه </td>
                                        <td scope="row"><?php echo e($sumcashDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumcashCedit1); ?></td>
                                        <td scope="row"><?php echo e($cashmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($cashmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($cashmovesumDebit -$cashmovesumCredit) >0 ? $cashmovesumDebit -$cashmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($cashmovesumDebit -$cashmovesumCredit) <0 ? $cashmovesumDebit -$cashmovesumCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">12111</td>
                                        <td scope="row">خزينة 1 </td>
                                        <td scope="row"><?php echo e($box1->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($box1->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($box1SumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($box1SumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($box1SumMoveDebit -$box1SumMoveCredit) >0 ? $box1SumMoveDebit -$box1SumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($box1SumMoveDebit -$box1SumMoveCredit) <0 ? $box1SumMoveDebit -$box1SumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">12112</td>
                                        <td scope="row">خزينة 2 </td>
                                        <td scope="row"><?php echo e($box2->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($box2->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($box2SumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($box2SumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($box2SumMoveDebit -$box2SumMoveCredit) >0 ? $box2SumMoveDebit -$box2SumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($box2SumMoveDebit -$box2SumMoveCredit) <0 ? $box2SumMoveDebit -$box2SumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">12113</td>
                                        <td scope="row">خزينة شيكات </td>
                                        <td scope="row"><?php echo e($boxcheck->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($boxcheck->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($boxcheckSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($boxcheckSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($boxcheckSumMoveDebit -$boxcheckSumMoveCredit) >0 ? $boxcheckSumMoveDebit -$boxcheckSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($boxcheckSumMoveDebit -$boxcheckSumMoveCredit) <0 ? $boxcheckSumMoveDebit -$boxcheckSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1212</td>
                                        <td scope="row">النقديه بالبنوك  </td>
                                        <td scope="row"><?php echo e($sumbankDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumbankCedit1); ?></td>
                                        <td scope="row"><?php echo e($bankmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($bankmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($bankmovesumDebit -$bankmovesumCredit) >0 ? $bankmovesumDebit -$bankmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($bankmovesumDebit -$bankmovesumCredit) <0 ? $bankmovesumDebit -$bankmovesumCredit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $bank1debit=$bank1SumMoveDebit > 0 ? $bank1SumMoveDebit : (-1* $bank1SumMoveDebit);
                                        $bank1credit=$bank1SumMoveCredit > 0 ? $bank1SumMoveCredit : (-1* $bank1SumMoveCredit);
                                    ?>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">12121</td>
                                        <td scope="row">بنك 1 </td>
                                        <td scope="row"><?php echo e($bank1->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($bank1->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($bank1SumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($bank1SumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($bank1SumMoveDebit -$bank1SumMoveCredit) >0 ? $bank1SumMoveDebit -$bank1SumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($bank1SumMoveDebit -$bank1SumMoveCredit) <0 ? $bank1SumMoveDebit -$bank1SumMoveCredit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $bank2debit=$bank2SumMoveDebit > 0 ? $bank2SumMoveDebit : (-1* $bank2SumMoveDebit);
                                        $bank2credit=$bank2SumMoveCredit > 0 ? $bank2SumMoveCredit : (-1* $bank2SumMoveCredit);
                                    ?>

                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">12122</td>
                                        <td scope="row">بنك 2 </td>
                                        <td scope="row"><?php echo e($bank2->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($bank2->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($bank2SumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($bank2SumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($bank2SumMoveDebit -$bank2SumMoveCredit) >0 ? $bank2SumMoveDebit -$bank2SumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($bank2SumMoveDebit -$bank2SumMoveCredit) <0 ? $bank2SumMoveDebit -$bank2SumMoveCredit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $sumDebtorsdebit=$sumDebtorsDebit > 0 ? $sumDebtorsDebit : (-1* $sumDebtorsDebit);
                                        $sumDebtorscredit=$sumDebtorsCedit > 0 ? $sumDebtorsCedit : (-1* $sumDebtorsCedit);
                                    ?>

                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">13</td>
                                        <td scope="row">المدينون </td>
                                        <td scope="row"><?php echo e($sumDebtorsDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumDebtorsCedit1); ?></td>
                                        <td scope="row"><?php echo e($DebtorsmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($DebtorsmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($DebtorsmovesumDebit -$DebtorsmovesumCredit) > 0 ?  $DebtorsmovesumDebit -$DebtorsmovesumCredit : 0); ?></td>
                                        <td scope="row"><?php echo e(($DebtorsmovesumDebit -$DebtorsmovesumCredit) < 0 ?  $DebtorsmovesumDebit -$DebtorsmovesumCredit : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">131</td>
                                        <td scope="row">العملاء </td>
                                        <td scope="row"><?php echo e($customers->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($customers->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($customersSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($customersSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($customersSumMoveDebit -$customersSumMoveCredit) > 0 ?  $customersSumMoveDebit -$customersSumMoveCredit : 0); ?></td>
                                        <td scope="row"><?php echo e(($customersSumMoveDebit -$customersSumMoveCredit) < 0 ?  $customersSumMoveDebit -$customersSumMoveCredit : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">132</td>
                                        <td scope="row">عهد وسلف عاملين </td>
                                        <td scope="row"><?php echo e($promise->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($promise->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($promiseSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($promiseSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($promiseSumMoveDebit -$promiseSumMoveCredit) >0 ? $promiseSumMoveDebit -$promiseSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($promiseSumMoveDebit -$promiseSumMoveCredit) <0 ? $promiseSumMoveDebit -$promiseSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1321</td>
                                        <td scope="row">عهدة 1 </td>
                                        <td scope="row"><?php echo e($promise->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($promise->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($promiseSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($promiseSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($promise->debit -$promise->credit) >0 ? $promise->debit -$promise->credit : ""); ?></td>
                                        <td scope="row"><?php echo e(($promise->debit -$promise->credit) <0 ? $promise->debit -$promise->credit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1322</td>
                                        <td scope="row">سلفة 1 </td>
                                        <td scope="row"><?php echo e($advance->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($advance->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($advanceSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($advanceSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($advanceSumMoveDebit -$advanceSumMoveCredit) >0 ? $advanceSumMoveDebit -$advanceSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($advanceSumMoveDebit -$advanceSumMoveCredit) <0 ? $advanceSumMoveDebit -$advanceSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $BeneficiaryAdvanceexpensesdebit=$BeneficiaryAdvanceexpenses->debit > 0 ? $BeneficiaryAdvanceexpenses->debit : (-1* $BeneficiaryAdvanceexpenses->debit);
                                        $BeneficiaryAdvanceexpensescredit=$BeneficiaryAdvanceexpenses->credit > 0 ? $BeneficiaryAdvanceexpenses->credit : (-1* $BeneficiaryAdvanceexpenses->credit);
                                    ?>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1323</td>
                                        <td scope="row">سلف المستفيدين	 </td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpenses->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpenses->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpensesSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpensesSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpensesSumMoveDebit - $BeneficiaryAdvanceexpensesSumMoveCredit > 0 ? $BeneficiaryAdvanceexpensesSumMoveDebit - $BeneficiaryAdvanceexpensesSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpensesSumMoveDebit - $BeneficiaryAdvanceexpensesSumMoveCredit < 0 ? $BeneficiaryAdvanceexpensesSumMoveDebit - $BeneficiaryAdvanceexpensesSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">13231</td>
                                        <td scope="row">سلفة المستفيد11	 </td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpenses->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpenses->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpensesSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpensesSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpensesSumMoveDebit - $BeneficiaryAdvanceexpensesSumMoveCredit > 0 ? $BeneficiaryAdvanceexpensesSumMoveDebit - $BeneficiaryAdvanceexpensesSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e($BeneficiaryAdvanceexpensesSumMoveDebit - $BeneficiaryAdvanceexpensesSumMoveCredit < 0 ? $BeneficiaryAdvanceexpensesSumMoveDebit - $BeneficiaryAdvanceexpensesSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">133</td>
                                        <td scope="row">تامينات لدى الغير </td>
                                        <td scope="row"><?php echo e($Insurances->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Insurances->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($InsurancesSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($InsurancesSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($InsurancesSumMoveDebit -$InsurancesSumMoveCredit) >0 ? $InsurancesSumMoveDebit -$InsurancesSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($InsurancesSumMoveDebit -$InsurancesSumMoveCredit) <0 ? $InsurancesSumMoveDebit -$InsurancesSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1331</td>
                                        <td scope="row">تامينات لدى 1 </td>
                                        <td scope="row"><?php echo e($Insurances->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Insurances->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($InsurancesSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($InsurancesSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($InsurancesSumMoveDebit -$InsurancesSumMoveCredit) >0 ? $InsurancesSumMoveDebit -$InsurancesSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($InsurancesSumMoveDebit -$InsurancesSumMoveCredit) <0 ? $InsurancesSumMoveDebit -$InsurancesSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">14</td>
                                        <td scope="row">ارصدة مدينة اخرى </td>
                                        <td scope="row"><?php echo e($sumOtherbalancesDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumOtherbalancesCedit1); ?></td>
                                        <td scope="row"><?php echo e($OtherbalancesmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($OtherbalancesmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($OtherbalancesmovesumDebit -$OtherbalancesmovesumCredit) >0 ? $OtherbalancesmovesumDebit -$OtherbalancesmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($OtherbalancesmovesumDebit -$OtherbalancesmovesumCredit) <0 ? $OtherbalancesmovesumDebit -$OtherbalancesmovesumCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">141</td>
                                        <td scope="row"> شيكات تحت التحصيل</td>
                                        <td scope="row"><?php echo e($Checks->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Checks->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($ChecksSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($ChecksSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($ChecksSumMoveDebit -$ChecksSumMoveCredit) >0 ? $ChecksSumMoveDebit -$ChecksSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($ChecksSumMoveDebit -$ChecksSumMoveCredit) <0 ? $ChecksSumMoveDebit -$ChecksSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">142</td>
                                        <td scope="row"> ابرادات مستحقة</td>
                                        <td scope="row"><?php echo e($Accrued->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Accrued->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($AccruedSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($AccruedSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($AccruedSumMoveDebit -$AccruedSumMoveCredit) >0 ? $AccruedSumMoveDebit -$AccruedSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($AccruedSumMoveDebit -$AccruedSumMoveCredit) <0 ? $AccruedSumMoveDebit -$AccruedSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1421</td>
                                        <td scope="row"> ابرادات مستحقة من 1</td>
                                        <td scope="row"><?php echo e($Accrued->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Accrued->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($AccruedSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($AccruedSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($AccruedSumMoveDebit -$AccruedSumMoveCredit) >0 ? $AccruedSumMoveDebit -$AccruedSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($AccruedSumMoveDebit -$AccruedSumMoveCredit) <0 ? $AccruedSumMoveDebit -$AccruedSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">143</td>
                                        <td scope="row"> مصروفات مقدمه</td>
                                        <td scope="row"><?php echo e($Advancedexpenses->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Advancedexpenses->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($AdvancedexpensesSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($AdvancedexpensesSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($AdvancedexpensesSumMoveDebit -$AdvancedexpensesSumMoveCredit) >0 ? $AdvancedexpensesSumMoveDebit -$AdvancedexpensesSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($AdvancedexpensesSumMoveDebit -$AdvancedexpensesSumMoveCredit) <0 ? $AdvancedexpensesSumMoveDebit -$AdvancedexpensesSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">1431</td>
                                        <td scope="row">مصروفات مقدمه ل 1 </td>
                                        <td scope="row"><?php echo e($Advancedexpenses->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Advancedexpenses->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($AdvancedexpensesSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($AdvancedexpensesSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($AdvancedexpensesSumMoveDebit -$AdvancedexpensesSumMoveCredit) >0 ? $AdvancedexpensesSumMoveDebit -$AdvancedexpensesSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($AdvancedexpensesSumMoveDebit -$AdvancedexpensesSumMoveCredit) <0 ? $AdvancedexpensesSumMoveDebit -$AdvancedexpensesSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">2</td>
                                        <td scope="row"> الخصوم</td>
                                        <td scope="row"><?php echo e($sumOpponentsDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumOpponentsCedit1); ?></td>
                                        <td scope="row"><?php echo e($OpponentsmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($OpponentsmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($OpponentsmovesumCredit  - $OpponentsmovesumDebit) <0 ? $OpponentsmovesumCredit  - $OpponentsmovesumDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($OpponentsmovesumCredit  - $OpponentsmovesumDebit) >0 ? $OpponentsmovesumCredit  - $OpponentsmovesumDebit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $totallastOpponents=$OpponentsmovesumCredit  - $OpponentsmovesumDebit;
                                    $totalmoveOpponentsdebit=$OpponentsmovesumDebit;
                                    $totalmoveOpponentscredit=$OpponentsmovesumCredit;

                                    ?>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">21</td>
                                        <td scope="row"> حقوق الملاك</td>
                                        <td scope="row"><?php echo e($sumAngelrightsDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumAngelrightsCedit1); ?></td>
                                        <td scope="row"><?php echo e($AngelrightsmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($AngelrightsmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($sumAngelrightsCedit  - $sumAngelrightsDebit) <0 ? $sumAngelrightsCedit  - $sumAngelrightsDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($sumAngelrightsCedit  - $sumAngelrightsDebit) >0 ? $sumAngelrightsCedit  - $sumAngelrightsDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">211</td>
                                        <td scope="row"> راسمال الوقف</td>
                                        <td scope="row"><?php echo e($Endowmentcapital->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Endowmentcapital->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($EndowmentcapitalSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($EndowmentcapitalSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($Endowmentcapital->credit  - $Endowmentcapital->debit) <0 ? $Endowmentcapital->credit  - $Endowmentcapital->debit : ""); ?></td>
                                        <td scope="row"><?php echo e(($Endowmentcapital->credit  - $Endowmentcapital->debit) >0 ? $Endowmentcapital->credit  - $Endowmentcapital->debit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">212</td>
                                        <td scope="row"> احتياطيات ومخصصات</td>
                                        <td scope="row"><?php echo e($Reservesprovisions->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Reservesprovisions->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($ReservesprovisionsSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($ReservesprovisionsSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($Reservesprovisions->credit  - $Reservesprovisions->debit) <0 ? $Reservesprovisions->credit  - $Reservesprovisions->debit : ""); ?></td>
                                        <td scope="row"><?php echo e(($Reservesprovisions->credit  - $Reservesprovisions->debit) >0 ? $Reservesprovisions->credit  - $Reservesprovisions->debit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">213</td>
                                        <td scope="row"> الفائض القابل للتوزيع</td>
                                        <td scope="row"><?php echo e($sumDistributablesurplusDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumDistributablesurplusCedit1); ?></td>
                                        <td scope="row"><?php echo e($DistributablesurplusmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($DistributablesurplusmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($sumDistributablesurplusCedit  - $sumDistributablesurplusDebit) <0 ? $sumDistributablesurplusCedit  - $sumDistributablesurplusDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($sumDistributablesurplusCedit  - $sumDistributablesurplusDebit) >0 ? $sumDistributablesurplusCedit  - $sumDistributablesurplusDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">2131</td>
                                        <td scope="row"> المستفيد 1</td>
                                        <td scope="row"><?php echo e($beneficial1->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($beneficial1->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($beneficial1SumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($beneficial1SumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($beneficial1SumMoveCredit  - $beneficial1SumMoveDebit) <0 ? $beneficial1SumMoveCredit  - $beneficial1SumMoveDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($beneficial1SumMoveCredit  - $beneficial1SumMoveDebit) >0 ? $beneficial1SumMoveCredit  - $beneficial1SumMoveDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">2132</td>
                                        <td scope="row"> المستفيد 2</td>
                                        <td scope="row"><?php echo e($beneficial2->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($beneficial2->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($beneficial2SumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($beneficial2SumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($beneficial2SumMoveCredit  - $beneficial2SumMoveDebit) <0 ? $beneficial2SumMoveCredit  - $beneficial2SumMoveDebit : ""); ?> </td>
                                        <td scope="row"><?php echo e(($beneficial2SumMoveCredit  - $beneficial2SumMoveDebit) >0 ? $beneficial2SumMoveCredit  - $beneficial2SumMoveDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">22</td>
                                        <td scope="row"> الالتزامات  المتداولة</td>
                                        <td scope="row"><?php echo e($sumCurrentliabilitiesDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumCurrentliabilitiesCedit1); ?></td>
                                        <td scope="row"><?php echo e($CurrentliabilitiesmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($CurrentliabilitiesmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($CurrentliabilitiesmovesumDebit  - $CurrentliabilitiesmovesumCredit) >0 ? $CurrentliabilitiesmovesumDebit  - $CurrentliabilitiesmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($CurrentliabilitiesmovesumCredit  - $CurrentliabilitiesmovesumDebit) >0 ? $CurrentliabilitiesmovesumCredit  - $CurrentliabilitiesmovesumDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">221</td>
                                        <td scope="row"> مصروفات مستحقه</td>
                                        <td scope="row"><?php echo e($deservedengagements->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($deservedengagements->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($deservedengagementsSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($deservedengagementsSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e($deservedengagementsSumMoveDebit - $deservedengagementsSumMoveCredit  >0 ? $deservedengagementsSumMoveDebit - $deservedengagementsSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e($deservedengagementsSumMoveCredit  - $deservedengagementsSumMoveDebit); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">222</td>
                                        <td scope="row"> دائنون متنوعون</td>
                                        <td scope="row"><?php echo e($miscellaneouscreditors->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($miscellaneouscreditors->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($miscellaneouscreditorsSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($miscellaneouscreditorsSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e($miscellaneouscreditorsSumMoveCredit  - $miscellaneouscreditorsSumMoveDebit  >0 ? $miscellaneouscreditorsSumMoveCredit  - $miscellaneouscreditorsSumMoveDebit : ""); ?></td>
                                        <td scope="row"><?php echo e($miscellaneouscreditorsSumMoveCredit  - $miscellaneouscreditorsSumMoveDebit); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">23</td>
                                        <td scope="row"> مجمع اهلاك الاصول الثابتة</td>
                                        <td scope="row"><?php echo e($sumDepreciationfixedassetsDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumDepreciationfixedassetsCedit1); ?></td>
                                        <td scope="row"><?php echo e($DepreciationfixedassetsmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($DepreciationfixedassetsmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($DepreciationfixedassetsmovesumCredit  - $DepreciationfixedassetsmovesumDebit) <0 ? $DepreciationfixedassetsmovesumCredit  - $DepreciationfixedassetsmovesumDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($DepreciationfixedassetsmovesumCredit  - $DepreciationfixedassetsmovesumDebit) >0 ? $DepreciationfixedassetsmovesumCredit  - $DepreciationfixedassetsmovesumDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">231</td>
                                        <td scope="row"> مجمع المباني</td>
                                        <td scope="row"><?php echo e($Buildingcomplex->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Buildingcomplex->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($BuildingcomplexSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($BuildingcomplexSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($BuildingcomplexSumMoveCredit  - $BuildingcomplexSumMoveDebit) <0 ? $BuildingcomplexSumMoveCredit  - $BuildingcomplexSumMoveDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($BuildingcomplexSumMoveCredit  - $BuildingcomplexSumMoveDebit) >0 ? $BuildingcomplexSumMoveCredit  - $BuildingcomplexSumMoveDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">232</td>
                                        <td scope="row"> مجمع الات ومعدات</td>
                                        <td scope="row"><?php echo e($Assembly->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Assembly->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($AssemblySumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($AssemblySumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($AssemblySumMoveCredit  - $AssemblySumMoveDebit) <0 ? $AssemblySumMoveCredit  - $AssemblySumMoveDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($AssemblySumMoveCredit  - $AssemblySumMoveDebit) >0 ? $AssemblySumMoveCredit  - $AssemblySumMoveDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">233</td>
                                        <td scope="row">  مجمع الاجهزة</td>
                                        <td scope="row"><?php echo e($Hardwarecomplex->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Hardwarecomplex->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($HardwarecomplexSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($HardwarecomplexSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($HardwarecomplexSumMoveCredit  - $HardwarecomplexSumMoveDebit) >0 ? $HardwarecomplexSumMoveCredit  - $HardwarecomplexSumMoveDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($HardwarecomplexSumMoveCredit  - $HardwarecomplexSumMoveDebit) <0 ? $HardwarecomplexSumMoveCredit  - $HardwarecomplexSumMoveDebit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $sumexpensesdebit=$sumexpensesDebit > 0 ? $sumexpensesDebit : (-1* $sumexpensesDebit);
                                        $expensesmovesumdebit=$expensesmovesumDebit > 0 ? $expensesmovesumDebit : (-1* $expensesmovesumDebit);
                                        $expensesmovesumcredit=$expensesmovesumCredit > 0 ? $expensesmovesumCredit : (-1* $expensesmovesumCredit);
                                        $sumexpensescredit=$sumexpensesCedit > 0 ? $sumexpensesCedit : (-1* $sumexpensesCedit);
                                    ?>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">3</td>
                                        <td scope="row"> المصروفات</td>
                                        <td scope="row"><?php echo e($sumexpensesDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumexpensesCedit1); ?></td>
                                        <td scope="row"><?php echo e($expensesmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($expensesmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($expensesmovesumDebit -$expensesmovesumCredit) >0 ? $expensesmovesumDebit -$expensesmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($expensesmovesumDebit -$expensesmovesumCredit) <0 ? $expensesmovesumDebit -$expensesmovesumCredit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $totallastexpense=$expensesmovesumDebit -  ($expensesmovesumCredit >0 ? $expensesmovesumCredit: (-1* $expensesmovesumCredit));
                                        $totalmoveexpensesdebit=$expensesmovesumDebit >0 ? $expensesmovesumDebit: (-1* $expensesmovesumDebit);
                                        $totalmoveexpensescredit=$expensesmovesumCredit >0 ? $expensesmovesumCredit: (-1* $expensesmovesumCredit);
                                    ?>
                                    <?php
                                        $sumEndowmentexpensesdebit=$sumEndowmentexpensesDebit > 0 ? $sumEndowmentexpensesDebit : (-1* $sumEndowmentexpensesDebit);
                                        $sumEndowmentexpensescredit=$sumEndowmentexpensesCedit > 0 ? $sumEndowmentexpensesCedit : (-1* $sumEndowmentexpensesCedit);
                                    ?>

                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">31</td>
                                        <td scope="row"> مصروفات الوقف</td>
                                        <td scope="row"><?php echo e($sumEndowmentexpensesDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumEndowmentexpensesCedit1); ?></td>
                                        <td scope="row"><?php echo e($EndowmentexpensesmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($EndowmentexpensesmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($sumEndowmentexpensesdebit -$sumEndowmentexpensescredit) >0 ? $sumEndowmentexpensesdebit -$sumEndowmentexpensescredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($sumEndowmentexpensesdebit -$sumEndowmentexpensescredit) <0 ? $sumEndowmentexpensesdebit -$sumEndowmentexpensescredit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $sumMaintenanceexpensesdebit=$sumMaintenanceexpensesDebit > 0 ? $sumMaintenanceexpensesDebit : (-1* $sumMaintenanceexpensesDebit);
                                        $sumMaintenanceexpensescredit=$sumMaintenanceexpensesCedit > 0 ? $sumMaintenanceexpensesCedit : (-1* $sumMaintenanceexpensesCedit);
                                    ?>

                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">311</td>
                                        <td scope="row"> مصروفات الصيانة</td>
                                        <td scope="row"><?php echo e($sumMaintenanceexpensesDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumMaintenanceexpensesCedit1); ?></td>
                                        <td scope="row"><?php echo e($MaintenanceexpensesmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($MaintenanceexpensesmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($MaintenanceexpensesmovesumDebit -$MaintenanceexpensesmovesumCredit) >0 ? $MaintenanceexpensesmovesumDebit -$MaintenanceexpensesmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($MaintenanceexpensesmovesumDebit -$MaintenanceexpensesmovesumCredit) <0 ? $MaintenanceexpensesmovesumDebit -$MaintenanceexpensesmovesumCredit : ""); ?></td>

                                    </tr>
                                    <?php
                                        $maintenance1debit=$maintenance1->debit > 0 ? $maintenance1->debit : (-1* $maintenance1->debit);
                                        $maintenance1credit=$maintenance1->credit > 0 ? $maintenance1->credit : (-1* $maintenance1->credit);
                                        $maintenance2debit=$maintenance2->debit > 0 ? $maintenance2->debit : (-1* $maintenance2->debit);
                                        $maintenance2credit=$maintenance2->credit > 0 ? $maintenance2->credit : (-1* $maintenance1->credit);
                                    ?>

                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">3111</td>
                                        <td scope="row">  الصيانة1</td>
                                        <td scope="row"><?php echo e($maintenance1->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($maintenance1->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($maintenance1SumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($maintenance1SumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($maintenance1SumMoveDebit -$maintenance1SumMoveCredit) >0 ? $maintenance1SumMoveDebit -$maintenance1SumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($maintenance1SumMoveDebit -$maintenance1SumMoveCredit) <0 ? $maintenance1SumMoveDebit -$maintenance1SumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">3112</td>
                                        <td scope="row">  الصيانة2</td>
                                        <td scope="row"><?php echo e($maintenance2->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($maintenance2->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($maintenance2SumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($maintenance2SumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($maintenance2SumMoveDebit -$maintenance2SumMoveCredit) >0 ? $maintenance2SumMoveDebit -$maintenance2SumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($maintenance2SumMoveDebit -$maintenance2SumMoveCredit) <0 ? $maintenance2SumMoveDebit -$maintenance2SumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr></tr>
                                    <td scope="row"></td>
                                    <td scope="row">312</td>
                                    <td scope="row"> رسوم حكومية</td>
                                    <td scope="row"><?php echo e($genre->debitFrist); ?></td>
                                    <td scope="row"><?php echo e($genre->creditFrist); ?></td>
                                    <td scope="row"><?php echo e($genreSumMoveDebit); ?></td>
                                    <td scope="row"><?php echo e($genreSumMoveCredit); ?></td>
                                    <td scope="row"><?php echo e(($genreSumMoveDebit -$genreSumMoveCredit) >0 ? $genreSumMoveDebit -$genreSumMoveCredit : ""); ?></td>
                                    <td scope="row"><?php echo e(($genreSumMoveDebit -$genreSumMoveCredit) <0 ? $genreSumMoveDebit -$genreSumMoveCredit : ""); ?></td>

                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">3121</td>
                                        <td scope="row"> رسوم ......</td>
                                        <td scope="row"><?php echo e($genre->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($genre->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($genreSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($genreSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($genreSumMoveDebit -$genreSumMoveCredit) >0 ? $genreSumMoveDebit -$genreSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($genreSumMoveDebit -$genreSumMoveCredit) <0 ? $genreSumMoveDebit -$genreSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">321</td>
                                        <td scope="row"> مصروفات ادارية وعموميه</td>
                                        <td scope="row"><?php echo e($sumGeneraladmiexpensesDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumGeneraladmiexpensesCedit1); ?></td>
                                        <td scope="row"><?php echo e($GeneraladmiexpensesmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($GeneraladmiexpensesmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($GeneraladmiexpensesmovesumDebit -$GeneraladmiexpensesmovesumCredit) >0 ? $GeneraladmiexpensesmovesumDebit -$GeneraladmiexpensesmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($GeneraladmiexpensesmovesumDebit -$GeneraladmiexpensesmovesumCredit) <0 ? $GeneraladmiexpensesmovesumDebit -$GeneraladmiexpensesmovesumCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">322</td>
                                        <td scope="row"> مصروفات اهلاك الاصول </td>
                                        <td scope="row"><?php echo e($sumAssetsdepreciationexpensesDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumAssetsdepreciationexpensesCedit1); ?></td>
                                        <td scope="row"><?php echo e($AssetsdepreciationexpensesmovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($AssetsdepreciationexpensesmovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($AssetsdepreciationexpensesmovesumDebit -$AssetsdepreciationexpensesmovesumCredit) >0 ? $AssetsdepreciationexpensesmovesumDebit -$AssetsdepreciationexpensesmovesumCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($AssetsdepreciationexpensesmovesumDebit -$AssetsdepreciationexpensesmovesumCredit) <0 ? $AssetsdepreciationexpensesmovesumDebit -$AssetsdepreciationexpensesmovesumCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">3221</td>
                                        <td scope="row"> مصروفات اهلاك المباني</td>
                                        <td scope="row"><?php echo e($Buildingdepreciationexpenses->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Buildingdepreciationexpenses->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($BuildingdepreciationexpensesSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($BuildingdepreciationexpensesSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($BuildingdepreciationexpensesSumMoveDebit -$BuildingdepreciationexpensesSumMoveCredit) >0 ? $BuildingdepreciationexpensesSumMoveDebit -$BuildingdepreciationexpensesSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($BuildingdepreciationexpensesSumMoveDebit -$BuildingdepreciationexpensesSumMoveCredit) <0 ? $BuildingdepreciationexpensesSumMoveDebit -$BuildingdepreciationexpensesSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">3222</td>
                                        <td scope="row"> مصروفات اهلاك الات ومعدات</td>
                                        <td scope="row"><?php echo e($machinerydepreciationexpenses->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($machinerydepreciationexpenses->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($machinerydepreciationexpensesSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($machinerydepreciationexpensesSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($machinerydepreciationexpensesSumMoveDebit -$machinerydepreciationexpensesSumMoveCredit) >0 ? $machinerydepreciationexpensesSumMoveDebit -$machinerydepreciationexpensesSumMoveCredit : ""); ?></td>
                                        <td scope="row"><?php echo e(($machinerydepreciationexpensesSumMoveDebit -$machinerydepreciationexpensesSumMoveCredit) <0 ? $machinerydepreciationexpensesSumMoveDebit -$machinerydepreciationexpensesSumMoveCredit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">4</td>
                                        <td scope="row"> ايرادات</td>
                                        <td scope="row"><?php echo e($sumincomeDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumincomeCedit1); ?></td>
                                        <td scope="row"><?php echo e($incomemovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($incomemovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($incomemovesumCredit  - $incomemovesumDebit) <0 ? $incomemovesumCredit  - $incomemovesumDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($incomemovesumCredit  - $incomemovesumDebit) >0 ? $incomemovesumCredit  - $incomemovesumDebit : ""); ?></td>
                                    </tr>
                                    <?php
                                        $totallastincome=$incomemovesumCredit  - $incomemovesumDebit;
                                        $totalmoveincomedebit=$incomemovesumDebit;
                                        $totalmoveincomecredit=$incomemovesumCredit;
                                    ?>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">41</td>
                                        <td scope="row"> ايردات الوقف</td>
                                        <td scope="row"><?php echo e($sumEndowmentrevenueDebit1); ?></td>
                                        <td scope="row"><?php echo e($sumEndowmentrevenueCedit1); ?></td>
                                        <td scope="row"><?php echo e($EndowmentrevenuemovesumDebit); ?></td>
                                        <td scope="row"><?php echo e($EndowmentrevenuemovesumCredit); ?></td>
                                        <td scope="row"><?php echo e(($EndowmentrevenuemovesumCredit  - $EndowmentrevenuemovesumDebit) <0 ? $EndowmentrevenuemovesumCredit  - $EndowmentrevenuemovesumDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($EndowmentrevenuemovesumCredit  - $EndowmentrevenuemovesumDebit) >0 ? $EndowmentrevenuemovesumCredit  - $EndowmentrevenuemovesumDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">411</td>
                                        <td scope="row"> ايراد الشقق</td>
                                        <td scope="row"><?php echo e($Revenueapartments->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Revenueapartments->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($RevenueapartmentsSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($RevenueapartmentsSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($RevenueapartmentsSumMoveCredit  - $RevenueapartmentsSumMoveDebit) <0 ? $RevenueapartmentsSumMoveCredit  - $RevenueapartmentsSumMoveDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($RevenueapartmentsSumMoveCredit  - $RevenueapartmentsSumMoveDebit) >0 ? $RevenueapartmentsSumMoveCredit  - $RevenueapartmentsSumMoveDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">412</td>
                                        <td scope="row"> ايراد المحلات</td>
                                        <td scope="row"><?php echo e($Revenuestores->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Revenuestores->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($RevenuestoresSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($RevenuestoresSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($RevenuestoresSumMoveCredit  - $RevenuestoresSumMoveDebit) <0 ? $RevenuestoresSumMoveCredit  - $RevenuestoresSumMoveDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($RevenuestoresSumMoveCredit  - $RevenuestoresSumMoveDebit) >0 ? $RevenuestoresSumMoveCredit  - $RevenuestoresSumMoveDebit : ""); ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row">42</td>
                                        <td scope="row"> ايرادات اخري</td>
                                        <td scope="row"><?php echo e($Otherincome->debitFrist); ?></td>
                                        <td scope="row"><?php echo e($Otherincome->creditFrist); ?></td>
                                        <td scope="row"><?php echo e($OtherincomeSumMoveDebit); ?></td>
                                        <td scope="row"><?php echo e($OtherincomeSumMoveCredit); ?></td>
                                        <td scope="row"><?php echo e(($OtherincomeSumMoveCredit  - $OtherincomeSumMoveDebit) <0 ? $OtherincomeSumMoveCredit  - $OtherincomeSumMoveDebit : ""); ?></td>
                                        <td scope="row"><?php echo e(($OtherincomeSumMoveCredit  - $OtherincomeSumMoveDebit) >0 ? $OtherincomeSumMoveCredit  - $OtherincomeSumMoveDebit : ""); ?></td>
                                    </tr>

                                    <tr>
                                        <td scope="row"></td>
                                        <td scope="row"></td>
                                        <td scope="row"> </td>
                                        <td scope="row"><?php echo e($sumAssetsDebitFist); ?></td>
                                        <td scope="row"><?php echo e($sumOpponentsCedit1); ?></td>
                                        <td scope="row"><?php echo e($totalmoveassetsdebit + $totalmoveincomedebit + $totalmoveexpensesdebit + $totalmoveOpponentsdebit); ?></td>
                                        <td scope="row"><?php echo e($totalmoveassetscredit + $totalmoveincomecredit +$totalmoveexpensescredit + $totalmoveOpponentscredit); ?></td>
                                        <td scope="row"><?php echo e($totallastassets + $totallastexpense); ?></td>
                                        <td scope="row"><?php echo e($totallastOpponents + $totallastincome); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
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
        $('#multicolumn_ordering_tabl').DataTable({
            language: {
                "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing":   "جارٍ التحميل...",
                "sLengthMenu":   "أظهر _MENU_ مدخلات",
                "sZeroRecords":  "لم يعثر على أية سجلات",
                "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix":  "",
                "sSearch":       "ابحث:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "الأول",
                    "sPrevious": "السابق",
                    "sNext":     "التالي",
                    "sLast":     "الأخير"
                },
                "oAria": {
                    "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            }
        });




        function deleteEstate(estate_id){
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
                        'تم الغاء ',
                        'نجاح'
                    );
                    setTimeout(function(){
                        document.getElementById(`form-${estate_id}`).submit();
                    }, 2000);

                }
            });

            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Accounting\Resources/views/accounts/trialBalance.blade.php ENDPATH**/ ?>