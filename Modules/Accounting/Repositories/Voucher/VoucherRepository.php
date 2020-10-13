<?php

namespace Modules\Accounting\Repositories\Voucher;

use App\AgenciesBalance;
use App\BeneficiaryBalance;
use App\TenantBalance;
use Illuminate\Support\Facades\DB;
use Modules\Accounting\Entities\Account;
use Modules\Accounting\Entities\Bank;
use Modules\Accounting\Entities\BankBalance;
use Modules\Accounting\Entities\Fund;
use Modules\Accounting\Entities\FundBalance;
use Modules\Accounting\Entities\Journal;
use Modules\Accounting\Entities\Voucher;


class VoucherRepository implements VoucherRepositoryInterface
{


    public function all($voucher_type = null)
    {
        if($voucher_type == null)
            return Voucher::all();
        return Voucher::where('voucher_type', $voucher_type)->get();
    }

    public function getById($id)
    {
        return Voucher::find('id', '=', $id);
    }

    public function create(array $data)
    {
        //        if(isset($data['fund_id_out'])){
//            $fund=Fund::with('account')->find( isset($data['fund_id_out']) ? $data['fund_id_out'] : null  );
//        }elseif ( isset($data['fund_id_in'])){
//            $fund=Fund::with('account')->find( isset($data['fund_id_in']) ? $data['fund_id_in'] : null  );
//        }elseif (isset($data['bank_id_out'])){
//            $fund=Bank::with('account')->find( isset($data['bank_id_out']) ? $data['bank_id_out'] : null  );
//        }else{
//            $fund=Bank::with('account')->find( isset($data['bank_id_in']) ? $data['bank_id_in'] : null  );
//        }
//        dd($data);
        if(isset($data['date_voucher_in']) && $data['voucher_type'] != "سند خارجى"){
            $date = new \DateTime($data['date_voucher_in']);
            $result = $date->format('Y-m-d');
            $data["order_at"]=$result;
        }
        if(isset($data['date_voucher_out']) && $data['voucher_type'] == "سند خارجى"){
            $date = new \DateTime($data['date_voucher_out']);
            $result = $date->format('Y-m-d');
            $data["order_at"]=$result;
        }

        if(isset($data['date_Due_in']) && $data['voucher_type'] != "سند خارجى"){
            $date = new \DateTime($data['date_Due_in']);
            $result_check = $date->format('Y-m-d');
            $data["order_at"]=$result_check;
        }
        if(isset($data['date_Due_out']) && $data['voucher_type'] == "سند خارجى"){
            $date = new \DateTime($data['date_Due_out']);
            $result_check = $date->format('Y-m-d');
            $data["order_at"]=$result_check;
        }
        if(isset($result_check) == false){
            $result_check = null;
        }
        if(isset($result) == false){
            $result = null;
        }
        if(isset($data['number_voucher_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["number_voucher"]=$data['number_voucher_in'];
        }
        if(isset($data['description_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["description"]=$data['description_in'];
        }
        if(isset($data['description_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["description"]=$data['description_out'];
        }
        if(isset($data['number_voucher_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["number_voucher"]=$data['number_voucher_out'];
        }
//        account_idAttributable_in
        if(isset($data['account_idAttributable_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["account_idAttributable"]=$data['account_idAttributable_in'];
        }
        if(isset($data['account_idAttributable_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["account_idAttributable"] =$data['account_idAttributable_out'];
        }

        if(isset($data['paid_amount_out']) && $data['paid_amount_out'] != 0){
            $data["paid_amount"]=$data['paid_amount_out'];
        }
        if(isset($data['paid_amount_in']) && $data['paid_amount_in'] != 0){
            $data["paid_amount"]=$data['paid_amount_in'];
        }

        if(isset($data['fund_id_in']) && $data['fund_id_in'] != 0){
            $data["fund_id"]=$data['fund_id_in'];
        }
        if(isset($data['fund_id_out']) && $data['fund_id_out'] != 0){
            $data["fund_id"]=$data['fund_id_out'];
        }
        if(isset($data['bank_id_in']) && $data['bank_id_in'] != 0){
            $data["fund_id"]=$data['bank_id_in'];
        }
        if(isset($data['bank_id_out']) && $data['bank_id_out'] != 0){
            $data["fund_id"]=$data['bank_id_out'];
        }

        if($data['voucher_type']== "سند داخلى"){
            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = isset($data['description_in']);
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data['account_idAttributable_in'];
            $Journal->debit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data['account_idAttributable_in']);
                $balabcelaste=$Account->debit - $data['paid_amount'] > 0 ? $Account->debit - $data['paid_amount'] : (-1*($Account->debit - $data['paid_amount']));
            $Account->update([
                'debit' =>$balabcelaste ,
            ]);

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = isset($data['description_in']);
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data["fund_id"]	;
            $Journal->credit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data["fund_id"]);
            $balabcelasteCredit=$Account->credit - $data['paid_amount'] > 0 ? $Account->credit - $data['paid_amount'] : (-1*($Account->credit - $data['paid_amount']));
            $Account->update([
                'credit' =>$balabcelasteCredit ,
            ]);
        }
        else{
            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = isset($data['description_in']);
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data['account_idAttributable_out'];
            $Journal->debit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data['account_idAttributable_out']);
            $balabcelasteDebit=$Account->debit - $data['paid_amount'] > 0 ? $Account->debit - $data['paid_amount'] : (-1*($Account->debit - $data['paid_amount']));
            $Account->update([
                'debit' =>$balabcelasteDebit ,
            ]);
            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description_in'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data["fund_id"]	;
            $Journal->credit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data["fund_id"]);
            $balabcelasteCredit=$Account->credit - $data['paid_amount'] > 0 ? $Account->credit - $data['paid_amount'] : (-1*($Account->credit - $data['paid_amount']));
            $Account->update([
                'credit' =>$balabcelasteCredit,
            ]);

        }

//        dd($data,$Account);
        DB::transaction(function() use ($data,$result,$result_check,$Journal){
            if(isset($data['number_voucher_in']) && isset($data['fund_id_in']) ){
                Voucher::create([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
                    'account_id' => $data['fund_id_in'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
                    'paymentable_id' => isset($data['fund_id_in']) ? $data['fund_id_in'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_in']) ? $data['account_idAttributable_in'] : null  ,
                    'attributable_id' => isset($data['user_id_in']) ? $data['user_id_in'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' => isset($data['number_voucher_in']) ? $data['number_voucher_in'] :  null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Payment" ,/* /* Payment, Receipt */
                    'description'=> isset($data['description_in']) ? $data['description_in'] :  null ,
                    'amount'=>  isset($data['amount_in']) ? $data['amount_in'] :  null ,
                    'paid_amount'=> isset($data['paid_amount_in']) ? $data['paid_amount_in'] : null ,
                    'check_num'=> isset($data['checke_num_in']) ? $data['checke_num_in'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }elseif (isset($data['number_voucher_in']) && isset($data['bank_id_in']) ){
                Voucher::create([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
                    'account_id' => $data['bank_id_in'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
                    'paymentable_id' => isset($data['bank_id_in']) ? $data['bank_id_in'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_in']) ? $data['account_idAttributable_in'] : null  ,
                    'attributable_id' => isset($data['user_id_in']) ? $data['user_id_in'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' => isset($data['number_voucher_in']) ? $data['number_voucher_in'] :  null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Payment" ,/* /* Payment, Receipt */
                    'description'=> isset($data['description_in']) ? $data['description_in'] :  null ,
                    'amount'=>  isset($data['amount_in']) ? $data['amount_in'] :  null ,
                    'paid_amount'=> isset($data['paid_amount_in']) ? $data['paid_amount_in'] : null ,
                    'check_num'=> isset($data['checke_num_in']) ? $data['checke_num_in'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);

            }elseif (isset($data['number_voucher_in']) && isset($data['fund_id_out']) ){

                Voucher::create([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
                    'account_id' => $data['fund_id_out'],
                    'paymentable_type' =>  isset($data['payment_mode_out']) ? $data['payment_mode_out'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
                    'paymentable_id' => isset($data['fund_id_out']) ? $data['fund_id_out'] :  null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' =>  isset($data['user_id_out']) ? $data['user_id_out'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' =>  isset($data['number_voucher_out']) ? $data['number_voucher_out'] : null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Payment" ,/* /* Payment, Receipt */
                    'description'=>  isset($data['description_out']) ? $data['description_out'] : null ,
                    'amount'=>  isset($data['amount_out']) ? $data['amount_out'] : null ,
                    'paid_amount'=>  isset($data['paid_amount_out']) ? $data['paid_amount_out'] : null ,
                    'check_num'=>  isset($data['checke_num_out']) ? $data['checke_num_out'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }
            else{
                Voucher::create([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
                    'account_id' => $data['voucher_type'],
                    'paymentable_type' =>  isset($data['payment_mode_out']) ? $data['payment_mode_out'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
                    'paymentable_id' => isset($data['bank_id_out']) ? $data['bank_id_out'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' =>  isset($data['user_id_out']) ? $data['user_id_out'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' =>  isset($data['number_voucher_out']) ? $data['number_voucher_out'] : null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Payment" ,/* /* Payment, Receipt */
                    'description'=>  isset($data['description_out']) ? $data['description_out'] : null ,
                    'amount'=>  isset($data['amount_out']) ? $data['amount_out'] : null ,
                    'paid_amount'=>  isset($data['paid_amount_out']) ? $data['paid_amount_out'] : null ,
                    'check_num'=>  isset($data['checke_num_out']) ? $data['checke_num_out'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }
            if($data["account_idAttributable"] == 89 && $data['voucher_type'] != "سند خارجى"){
                if(isset($data['remaining_amount_in']) && isset($data['fund_id_in']) ) {

                    $BeneficiaryBalance = BeneficiaryBalance::where('beneficiary_id',$data['user_id_in'])->first();
                    if($BeneficiaryBalance){
                        $last_debit=$BeneficiaryBalance->debit + $data['paid_amount_in'];
                        $last_crdit=$BeneficiaryBalance->credit;
                        $BeneficiaryBalance->update([
                            'credit' =>$last_crdit,
                            'debit' => $last_debit,
                            'moveId' => $Journal->number,
                        ]);
                    }else{
                        BeneficiaryBalance::create([
                            'beneficiary_id' =>$data['user_id_in'],
                            'credit' =>0,
                            'debit' => $data['paid_amount_in'],
                            'moveId' => $Journal->number,
                        ]);
                    }


                }

                if(isset($data['remaining_amount_in']) && isset($data['bank_id_in']) ) {
                    $BeneficiaryBalance = BeneficiaryBalance::where('beneficiary_id',$data['user_id_in'])->first();
                    if($BeneficiaryBalance){
                        $last_debit=$BeneficiaryBalance->debit + $data['paid_amount_in'];
                        $last_crdit=$BeneficiaryBalance->credit;
                        $BeneficiaryBalance->update([
                            'credit' =>$last_crdit,
                            'debit' => $last_debit,
                            'moveId' => $Journal->number,

                        ]);
                    }else{
                        BeneficiaryBalance::create([
                            'beneficiary_id' =>$data['user_id_in'],
                            'credit' =>0,
                            'debit' => $data['paid_amount_in'],
                            'moveId' => $Journal->number,

                        ]);
                    }

                }
            }
            if($data["account_idAttributable"] == 69 || $data["account_idAttributable"] == 70 && $data['voucher_type'] == "سند خارجى") {

                if (isset($data['remaining_amount_out']) && isset($data['fund_id_out'])) {
                    $AgenciesBalance = AgenciesBalance::where('agencies_id', $data['user_id_out'])->first();
                    if ($AgenciesBalance) {
                        $last_crdit = $AgenciesBalance->credit + $data['paid_amount_out'];
                        $last_debit = $AgenciesBalance->debit - $data['paid_amount_out'] > 0 ? $AgenciesBalance->debit - $data['paid_amount_out'] : (-1 * ($AgenciesBalance->debit - $data['paid_amount_out']));
                        $AgenciesBalance->update([
                            'credit' => $last_crdit,
                            'debit' => $last_debit,
                            'moveId' => $Journal->number,
                        ]);

                    } else {
                        AgenciesBalance::create([
                            'agencies_id' => $data['user_id_out'],
                            'debit' => 0,
                            'credit' => $data['paid_amount_out'],
                            'moveId' => $Journal->number,
                        ]);
                    }

                }
                if (isset($data['remaining_amount_out']) && isset($data['bank_id_out'])) {

                    $AgenciesBalance = AgenciesBalance::where('agencies_id', $data['user_id_out'])->first();
                    if ($AgenciesBalance) {
                        $last_crdit = $AgenciesBalance->credit + $data['paid_amount_out'];
                        $last_debit = $AgenciesBalance->debit - $data['paid_amount_out'] > 0 ? $AgenciesBalance->debit - $data['paid_amount_out'] : (-1 * ($AgenciesBalance->debit - $data['paid_amount_out']));
                        $AgenciesBalance->update([
                            'credit' => $last_crdit,
                            'debit' => $last_debit,
                            'moveId' => $Journal->number,

                        ]);

                    } else {
                        AgenciesBalance::create([
                            'agencies_id' => $data['user_id_out'],
                            'debit' => 0,
                            'credit' => $data['paid_amount_out'],
                            'moveId' => $Journal->number,

                        ]);
                    }

                }
            }

        });
        return true;
    }


    public function create_recipt(array $data)
    {
        //        if(isset($data['fund_id_out'])){
//            $fund=Fund::with('account')->find( isset($data['fund_id_out']) ? $data['fund_id_out'] : null  );
//        }elseif ( isset($data['fund_id_in'])){
//            $fund=Fund::with('account')->find( isset($data['fund_id_in']) ? $data['fund_id_in'] : null  );
//        }elseif (isset($data['bank_id_out'])){
//            $fund=Bank::with('account')->find( isset($data['bank_id_out']) ? $data['bank_id_out'] : null  );
//        }else{
//            $fund=Bank::with('account')->find( isset($data['bank_id_in']) ? $data['bank_id_in'] : null  );
//        }

        if(isset($data['date_voucher_in']) && $data['voucher_type'] != "سند خارجى"){
            $date = new \DateTime($data['date_voucher_in']);
            $result = $date->format('Y-m-d');
            $data["order_at"]=$result;

        }
        if(isset($data['date_voucher_out']) && $data['voucher_type'] == "سند خارجى"){
            $date = new \DateTime($data['date_voucher_out']);
            $result = $date->format('Y-m-d');
            $data["order_at"]=$result;

        }

        if(isset($data['date_Due_in']) && $data['voucher_type'] != "سند خارجى"){
            $date = new \DateTime($data['date_Due_in']);
            $result_check = $date->format('Y-m-d');
            $data["order_at"]=$result_check;

        }
        if(isset($data['date_Due_out']) && $data['voucher_type'] == "سند خارجى"){
            $date = new \DateTime($data['date_Due_out']);
            $result_check = $date->format('Y-m-d');
            $data["order_at"]=$result_check;
        }
        if(isset($result_check) == false){
            $result_check = null;
        }
        if(isset($result) == false){
            $result = null;
        }

        if(isset($data['number_voucher_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["number_voucher"]=$data['number_voucher_in'];
        }
        if(isset($data['description_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["description"]=$data['description_in'];
        }
        if(isset($data['description_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["description"]=$data['description_out'];
        }
        if(isset($data['number_voucher_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["number_voucher"]=$data['number_voucher_out'];
        }
        if(isset($data['paid_amount_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["paid_amount"]=$data['paid_amount_out'];
        }
        if(isset($data['paid_amount_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["paid_amount"]=$data['paid_amount_in'];
        }
        if(isset($data['fund_id_in']) && $data['fund_id_in'] != 0){
            $data["fund_id"]=$data['fund_id_in'];
        }
        if(isset($data['fund_id_out']) && $data['fund_id_out'] != 0){
            $data["fund_id"]=$data['fund_id_out'];
        }
        if(isset($data['bank_id_in']) && $data['bank_id_in'] != 0){
            $data["fund_id"]=$data['bank_id_in'];
        }
        if(isset($data['bank_id_out']) && $data['bank_id_out'] != 0){
            $data["fund_id"]=$data['bank_id_out'];
        }
//        account_idAttributable_in
        if(isset($data['account_idAttributable_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["account_idAttributable"]=$data['account_idAttributable_in'];
        }
        if(isset($data['account_idAttributable_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["account_idAttributable"] =$data['account_idAttributable_out'];
        }

        if($data['voucher_type']== "سند داخلى"){

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data["fund_id"]	;
            $Journal->debit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data["fund_id"]);
            $balabcelasteDebit=$Account->debit + $data['paid_amount'] > 0 ? $Account->debit + $data['paid_amount'] : (-1*($Account->debit + $data['paid_amount']));
            $Account->update([
                'debit' =>$balabcelasteDebit ,
            ]);

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data['account_idAttributable_in'];
            $Journal->credit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data['account_idAttributable_in']);
            $balabcelasteCredit=$Account->credit - $data['paid_amount'] > 0 ? $Account->credit - $data['paid_amount'] : (-1*($Account->credit - $data['paid_amount']));
            $Account->update([
                'credit' =>$balabcelasteCredit ,
            ]);

        }
        else{

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data["fund_id"]	;
            $Journal->debit   =$data['paid_amount'];
//            $Journal->debit   =$request->debit[$key]  == null ? 0 : $request->debit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data["fund_id"]);
            $balabcelasteDebit=$Account->debit + $data['paid_amount'] > 0 ? $Account->debit + $data['paid_amount'] : (-1*($Account->debit + $data['paid_amount']));
            $Account->update([
                'debit' =>$balabcelasteDebit,
            ]);

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data['account_idAttributable_out'];
            $Journal->credit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data['account_idAttributable_out']);
            $balabcelasteCredit=$Account->credit - $data['paid_amount'] > 0 ? $Account->credit - $data['paid_amount'] : (-1*($Account->credit - $data['paid_amount']));
            $Account->update([
                'credit' =>$balabcelasteCredit ,
            ]);

        }

        DB::transaction(function() use ($data,$result,$result_check,$Journal){
            if(isset($data['number_voucher_in']) && isset($data['fund_id_in']) ){
                Voucher::create([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
                    'account_id' => $data['fund_id_in'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
                    'paymentable_id' => isset($data['fund_id_in']) ? $data['fund_id_in'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_in']) ? $data['account_idAttributable_in'] : null  ,
                    'attributable_id' => isset($data['user_id_in']) ? $data['user_id_in'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' => isset($data['number_voucher_in']) ? $data['number_voucher_in'] :  null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Receipt" ,/* /* Payment, Receipt */
                    'description'=> isset($data['description_in']) ? $data['description_in'] :  null ,
                    'amount'=>  isset($data['amount_in']) ? $data['amount_in'] :  null ,
                    'paid_amount'=> isset($data['paid_amount_in']) ? $data['paid_amount_in'] : null ,
                    'check_num'=> isset($data['checke_num_in']) ? $data['checke_num_in'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }elseif (isset($data['number_voucher_in']) && isset($data['bank_id_in']) ){
                Voucher::create([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
                    'account_id' => $data['bank_id_in'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
                    'paymentable_id' => isset($data['bank_id_in']) ? $data['bank_id_in'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' => isset($data['user_id_in']) ? $data['user_id_in'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' => isset($data['number_voucher_in']) ? $data['number_voucher_in'] :  null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Receipt" ,/* /* Payment, Receipt */
                    'description'=> isset($data['description_in']) ? $data['description_in'] :  null ,
                    'amount'=>  isset($data['amount_in']) ? $data['amount_in'] :  null ,
                    'paid_amount'=> isset($data['paid_amount_in']) ? $data['paid_amount_in'] : null ,
                    'check_num'=> isset($data['checke_num_in']) ? $data['checke_num_in'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);

            }elseif (isset($data['number_voucher_in']) && isset($data['fund_id_out']) ){

                Voucher::create([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
                    'account_id' => $data['fund_id_out'],
                    'paymentable_type' =>  isset($data['payment_mode_out']) ? $data['payment_mode_out'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
                    'paymentable_id' => isset($data['fund_id_out']) ? $data['fund_id_out'] :  null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' =>  isset($data['user_id_out']) ? $data['user_id_out'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' =>  isset($data['number_voucher_out']) ? $data['number_voucher_out'] : null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Receipt" ,/* /* Payment, Receipt */
                    'description'=>  isset($data['description_out']) ? $data['description_out'] : null ,
                    'amount'=>  isset($data['amount_out']) ? $data['amount_out'] : null ,
                    'paid_amount'=>  isset($data['paid_amount_out']) ? $data['paid_amount_out'] : null ,
                    'check_num'=>  isset($data['checke_num_out']) ? $data['checke_num_out'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }
            else{
                Voucher::create([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
                    'account_id' => $data['bank_id_out'],
                    'paymentable_type' =>  isset($data['payment_mode_out']) ? $data['payment_mode_out'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
                    'paymentable_id' => isset($data['bank_id_out']) ? $data['bank_id_out'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' =>  isset($data['user_id_out']) ? $data['user_id_out'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' =>  isset($data['number_voucher_out']) ? $data['number_voucher_out'] : null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Receipt" ,/* /* Payment, Receipt */
                    'description'=>  isset($data['description_out']) ? $data['description_out'] : null ,
                    'amount'=>  isset($data['amount_out']) ? $data['amount_out'] : null ,
                    'paid_amount'=>  isset($data['paid_amount_out']) ? $data['paid_amount_out'] : null ,
                    'check_num'=>  isset($data['checke_num_out']) ? $data['checke_num_out'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }
            if($data["account_idAttributable"] == 89 && $data['voucher_type'] != "سند خارجى") {

                if (isset($data['remaining_amount_in']) && isset($data['fund_id_in'])) {
//                $fund->update([
//                    'balance' => $data['remaining_amount_in'],
//                ]);
//                $fundBalance = FundBalance::where('fund_id',$data['fund_id_in'])->first();
//                $fundBalance->update([
//                    'credit' => $data['remaining_amount_in'],
//                    'debit' => $data['paid_amount_in'],
//                ]);

                    $BeneficiaryBalance = BeneficiaryBalance::where('beneficiary_id', $data['user_id_in'])->first();
                    if ($BeneficiaryBalance) {
                        $last_crdit = $BeneficiaryBalance->credit;
                        $last_debit = $BeneficiaryBalance->debit + $data['paid_amount_in'];
                        $BeneficiaryBalance->update([
                            'credit' => $last_crdit,
                            'debit' => $last_debit,
                            'moveId' => $Journal->number,

                        ]);
                    } else {
                        BeneficiaryBalance::create([
                            'beneficiary_id' => $data['user_id_in'],
                            'credit' => 0,
                            'debit' => $data['paid_amount_in'],
                            'moveId' => $Journal->number,
                        ]);
                    }


                }
                if (isset($data['remaining_amount_in']) && isset($data['bank_id_in'])) {
//                $fund->update([
//                    'balance' => $data['remaining_amount_in'],
//                ]);
//                $BankBalance = BankBalance::where('bank_id',$data['bank_id_in'])->first();
//                $BankBalance->update([
//                    'credit' => $data['remaining_amount_in'],
//                    'debit' => $data['paid_amount_in'],
//                ]);
                    $BeneficiaryBalance = BeneficiaryBalance::where('beneficiary_id', $data['user_id_in'])->first();
                    if ($BeneficiaryBalance) {
                        $last_crdit = $BeneficiaryBalance->credit;
                        $last_debit = $BeneficiaryBalance->debit + $data['paid_amount_in'];
                        $BeneficiaryBalance->update([
                            'credit' => $last_crdit,
                            'debit' => $last_debit,
                            'moveId' => $Journal->number,

                        ]);
                    } else {
                        BeneficiaryBalance::create([
                            'beneficiary_id' => $data['user_id_in'],
                            'credit' => 0,
                            'debit' => $data['paid_amount_in'],
                            'moveId' => $Journal->number,

                        ]);
                    }

                }
            }
            if($data["account_idAttributable"] == 32 && $data['voucher_type'] == "سند خارجى") {

                if (isset($data['remaining_amount_out']) && isset($data['fund_id_out'])) {
//                $fund->update([
//                    'balance' => $data['remaining_amount_out'],
//                ]);
//                $fundBalance = FundBalance::where('fund_id',$data['fund_id_out'])->first();
//                $fundBalance->update([
//                    'credit' => $data['remaining_amount_out'],
//                    'debit' => $data['paid_amount_out'],
//                ]);
                    $tenantBalance = TenantBalance::where('tenant_id', $data['user_id_out'])->first();
                    if ($tenantBalance) {
                        $last_crdit = $tenantBalance->credit + $data['paid_amount_out'];
                        $last_debit = $tenantBalance->debit;
                        $tenantBalance->update([
                            'credit' => $last_crdit,
                            'debit' => $last_debit,
                            'moveId' => $Journal->number,
                        ]);
                    } else {
                        TenantBalance::create([
                            'tenant_id' => $data['user_id_out'],
                            'credit' => $data['paid_amount_out'],
                            'debit' => 0,
                            'moveId' => $Journal->number,
                        ]);
                    }


                }
                if (isset($data['remaining_amount_out']) && isset($data['bank_id_out'])) {
//                $fund->update([
//                    'balance' => $data['remaining_amount_out'],
//                ]);
//                $BankBalance = BankBalance::where('bank_id',$data['bank_id_out'])->first();
//                $BankBalance->update([
//                    'credit' => $data['remaining_amount_out'],
//                    'debit' => $data['paid_amount_out'],
//                ]);

                    $tenantBalance = TenantBalance::where('tenant_id', $data['user_id_out'])->first();
                    if ($tenantBalance) {
                        $last_crdit = $tenantBalance->credit + $data['paid_amount_out'];
                        $last_debit = $tenantBalance->debit;
                        $tenantBalance->update([
                            'credit' => $last_crdit,
                            'debit' => $last_debit,
                            'moveId' => $Journal->number,
                        ]);

                    } else {
                        TenantBalance::create([
                            'tenant_id' => $data['user_id_out'],
                            'credit' => $data['paid_amount_out'],
                            'debit' => 0,
                            'moveId' => $Journal->number,
                        ]);


                    }

                }
            }

        });
        return true;
    }

    public function update(array $data ,$id)
    {

//        if(isset($data['fund_id_out'])){
//            $fund=Fund::with('account')->find( isset($data['fund_id_out']) ? $data['fund_id_out'] : null  );
//        }elseif ( isset($data['fund_id_in'])){
//            $fund=Fund::with('account')->find( isset($data['fund_id_in']) ? $data['fund_id_in'] : null  );
//        }elseif (isset($data['bank_id_out'])){
//            $fund=Bank::with('account')->find( isset($data['bank_id_out']) ? $data['bank_id_out'] : null  );
//        }else{
//            $fund=Bank::with('account')->find( isset($data['bank_id_in']) ? $data['bank_id_in'] : null  );
//        }

        if(isset($data['date_voucher_in']) && $data['voucher_type'] != "سند خارجى"){
            $date = new \DateTime($data['date_voucher_in']);
            $result = $date->format('Y-m-d');
            $data["order_at"]=$result;
        }
        if(isset($data['date_voucher_out']) && $data['voucher_type'] == "سند خارجى"){
            $date = new \DateTime($data['date_voucher_out']);
            $result = $date->format('Y-m-d');
            $data["order_at"]=$result;
        }

        if(isset($data['date_Due_in']) && $data['voucher_type'] != "سند خارجى"){
            $date = new \DateTime($data['date_Due_in']);
            $result_check = $date->format('Y-m-d');
            $data["order_at"]=$result_check;
        }
        if(isset($data['date_Due_out']) && $data['voucher_type'] == "سند خارجى"){
            $date = new \DateTime($data['date_Due_out']);
            $result_check = $date->format('Y-m-d');
            $data["order_at"]=$result_check;
        }
        if(isset($result_check) == false){
            $result_check = null;
        }
        if(isset($result) == false){
            $result = null;
        }
        if(isset($data['number_voucher_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["number_voucher"]=$data['number_voucher_in'];
        }
        if(isset($data['description_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["description"]=$data['description_in'];
        }
        if(isset($data['description_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["description"]=$data['description_out'];
        }
        if(isset($data['number_voucher_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["number_voucher"]=$data['number_voucher_out'];
        }

        if(isset($data['paid_amount_out']) && $data['paid_amount_out'] != 0){
            $data["paid_amount"]=$data['paid_amount_out'];
        }
        if(isset($data['paid_amount_in']) && $data['paid_amount_in'] != 0){
            $data["paid_amount"]=$data['paid_amount_in'];
        }
        if(isset($data['fund_id_in']) && $data['fund_id_in'] != 0){
            $data["fund_id"]=$data['fund_id_in'];
        }
        if(isset($data['fund_id_out']) && $data['fund_id_out'] != 0){
            $data["fund_id"]=$data['fund_id_out'];
        }
        if(isset($data['bank_id_in']) && $data['bank_id_in'] != 0){
            $data["fund_id"]=$data['bank_id_in'];
        }
        if(isset($data['bank_id_out']) && $data['bank_id_out'] != 0){
            $data["fund_id"]=$data['bank_id_out'];
        }
        $voucher = Voucher::find($id);
        $Journal= Journal::where('number',$voucher->number)->get();

        foreach ($Journal as $key=> $Jour){
            $Jour->delete();
        }
        if($data['voucher_type']== "سند داخلى"){
            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data['account_idAttributable_in'];
            $Journal->debit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();


            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data["fund_id"]	;
            $Journal->credit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data["fund_id"]);

            $Account->update([
//                'credit' =>($Account->credit - $amountBeforeUpdateCredit) + $data['paid_amount'] ,
            ]);
        }
        else{
            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data['account_idAttributable_out'];
            $Journal->debit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data['account_idAttributable_out']);
            $Account->update([
//                'debit' =>($Account->debit ) - $data['paid_amount'] ,
            ]);
            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data["fund_id"]	;
            $Journal->credit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data["fund_id"]);
            $Account->update([
//                'credit' =>($Account->credit ) + $data['paid_amount'] ,
            ]);

        }

        $voucher = Voucher::find($id);

        DB::transaction(function() use ($data,$result,$result_check,$voucher){
            if(isset($data['number_voucher_in']) && isset($data['fund_id_in']) ){
                $voucher->update([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
//                    'account_id' => $fund['account_id'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
//                    'paymentable_id' => isset($data['fund_id_in']) ? $data['fund_id_in'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_in']) ? $data['account_idAttributable_in'] : null  ,
                    'attributable_id' => isset($data['user_id_in']) ? $data['user_id_in'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' => isset($data['number_voucher_in']) ? $data['number_voucher_in'] :  null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Payment" ,/* /* Payment, Receipt */
                    'description'=> isset($data['description_in']) ? $data['description_in'] :  null ,
                    'amount'=>  isset($data['amount_in']) ? $data['amount_in'] :  null ,
                    'paid_amount'=> isset($data['paid_amount_in']) ? $data['paid_amount_in'] : null ,
                    'check_num'=> isset($data['checke_num_in']) ? $data['checke_num_in'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }elseif (isset($data['number_voucher_in']) && isset($data['bank_id_in']) ){
                $voucher->update([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
//                    'account_id' => $fund['account_id'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
//                    'paymentable_id' => isset($data['bank_id_in']) ? $data['bank_id_in'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_in']) ? $data['account_idAttributable_in'] : null  ,
                    'attributable_id' => isset($data['user_id_in']) ? $data['user_id_in'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' => isset($data['number_voucher_in']) ? $data['number_voucher_in'] :  null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Payment" ,/* /* Payment, Receipt */
                    'description'=> isset($data['description_in']) ? $data['description_in'] :  null ,
                    'amount'=>  isset($data['amount_in']) ? $data['amount_in'] :  null ,
                    'paid_amount'=> isset($data['paid_amount_in']) ? $data['paid_amount_in'] : null ,
                    'check_num'=> isset($data['checke_num_in']) ? $data['checke_num_in'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);

            }elseif (isset($data['number_voucher_in']) && isset($data['fund_id_out']) ){
                $voucher->update([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
//                    'account_id' => $fund['account_id'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
//                    'paymentable_id' => isset($data['fund_id_out']) ? $data['fund_id_out'] :  null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' =>  isset($data['user_id_out']) ? $data['user_id_out'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' =>  isset($data['number_voucher_out']) ? $data['number_voucher_out'] : null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Payment" ,/* /* Payment, Receipt */
                    'description'=>  isset($data['description_out']) ? $data['description_out'] : null ,
                    'amount'=>  isset($data['amount_out']) ? $data['amount_out'] : null ,
                    'paid_amount'=>  isset($data['paid_amount_out']) ? $data['paid_amount_out'] : null ,
                    'check_num'=>  isset($data['checke_num_out']) ? $data['checke_num_out'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }
            else{
                $voucher->update([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
//                    'account_id' => $fund['account_id'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
//                    'paymentable_id' => isset($data['bank_id_out']) ? $data['bank_id_out'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' =>  isset($data['user_id_out']) ? $data['user_id_out'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' =>  isset($data['number_voucher_out']) ? $data['number_voucher_out'] : null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Payment" ,/* /* Payment, Receipt */
                    'description'=>  isset($data['description_out']) ? $data['description_out'] : null ,
                    'amount'=>  isset($data['amount_out']) ? $data['amount_out'] : null ,
                    'paid_amount'=>  isset($data['paid_amount_out']) ? $data['paid_amount_out'] : null ,
                    'check_num'=>  isset($data['checke_num_out']) ? $data['checke_num_out'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }
//            if(isset($data['remaining_amount_in'])) {
//                $fund->update([
//                    'balance' => $data['remaining_amount_in'],
//                ]);
//            }
//            if(isset($data['remaining_amount_out'])) {
//                $fund->update([
//                    'balance' => $data['remaining_amount_out'],
//                ]);
//            }

        });
        return true;
    }

    public function update_recipt(array $data ,$id)
    {
//        if(isset($data['fund_id_out'])){
//            $fund=Fund::with('account')->find( isset($data['fund_id_out']) ? $data['fund_id_out'] : null  );
//        }elseif ( isset($data['fund_id_in'])){
//            $fund=Fund::with('account')->find( isset($data['fund_id_in']) ? $data['fund_id_in'] : null  );
//        }elseif (isset($data['bank_id_out'])){
//            $fund=Bank::with('account')->find( isset($data['bank_id_out']) ? $data['bank_id_out'] : null  );
//        }else{
//            $fund=Bank::with('account')->find( isset($data['bank_id_in']) ? $data['bank_id_in'] : null  );
//        }

        if(isset($data['date_voucher_in']) && $data['voucher_type'] != "سند خارجى"){
            $date = new \DateTime($data['date_voucher_in']);
            $result = $date->format('Y-m-d');
            $data["order_at"]=$result;
        }
        if(isset($data['date_voucher_out']) && $data['voucher_type'] == "سند خارجى"){
            $date = new \DateTime($data['date_voucher_out']);
            $result = $date->format('Y-m-d');
            $data["order_at"]=$result;
        }

        if(isset($data['date_Due_in']) && $data['voucher_type'] != "سند خارجى"){
            $date = new \DateTime($data['date_Due_in']);
            $result_check = $date->format('Y-m-d');
            $data["order_at"]=$result_check;
        }
        if(isset($data['date_Due_out']) && $data['voucher_type'] == "سند خارجى"){
            $date = new \DateTime($data['date_Due_out']);
            $result_check = $date->format('Y-m-d');
            $data["order_at"]=$result_check;
        }
        if(isset($result_check) == false){
            $result_check = null;
        }
        if(isset($result) == false){
            $result = null;
        }
        if(isset($data['number_voucher_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["number_voucher"]=$data['number_voucher_in'];
        }
        if(isset($data['description_in']) && $data['voucher_type'] != "سند خارجى"){
            $data["description"]=$data['description_in'];
        }
        if(isset($data['description_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["description"]=$data['description_out'];
        }
        if(isset($data['number_voucher_out']) && $data['voucher_type'] == "سند خارجى"){
            $data["number_voucher"]=$data['number_voucher_out'];
        }

        if(isset($data['paid_amount_out']) && $data['paid_amount_out'] != 0){
            $data["paid_amount"]=$data['paid_amount_out'];
        }
        if(isset($data['paid_amount_in']) && $data['paid_amount_in'] != 0){
            $data["paid_amount"]=$data['paid_amount_in'];
        }
        $voucher = Voucher::find($id);
        $Journal= Journal::where('number',$voucher->number)->get();
//        dd($Journal);

        foreach ($Journal as $key=> $Jour){
            $Jour->delete();
        }
        if(isset($data['fund_id_in']) && $data['fund_id_in'] != 0){
            $data["fund_id"]=$data['fund_id_in'];
        }
        if(isset($data['fund_id_out']) && $data['fund_id_out'] != 0){
            $data["fund_id"]=$data['fund_id_out'];
        }
        if(isset($data['bank_id_in']) && $data['bank_id_in'] != 0){
            $data["fund_id"]=$data['bank_id_in'];
        }
        if(isset($data['bank_id_out']) && $data['bank_id_out'] != 0){
            $data["fund_id"]=$data['bank_id_out'];
        }
        if($data['voucher_type']== "سند داخلى"){

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data["fund_id"]	;
            $Journal->debit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data["fund_id"]);

            $Account->update([
//                'debit' =>($Account->debit ) + $data['paid_amount'] ,
            ]);

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data['account_idAttributable_in'];
            $Journal->credit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data['account_idAttributable_in']);

            $Account->update([
//                'credit' =>($Account->credit ) - $data['paid_amount'] ,
            ]);

        }
        else{

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data["fund_id"]	;
            $Journal->debit   =$data['paid_amount'];
//            $Journal->debit   =$request->debit[$key]  == null ? 0 : $request->debit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data["fund_id"]);
            $Account->update([
//                'debit' =>($Account->debit ) + $data['paid_amount'] ,
            ]);

            $Journal=new Journal;
            $Journal->number   =isset($data['number_voucher']) ? $data['number_voucher'] : null;
            $Journal->details   = $data['description'];
            $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$data['account_idAttributable_out'];
            $Journal->credit   =$data['paid_amount'];
//            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();

            $Account=Account::find($data['account_idAttributable_out']);
            $Account->update([
//                'debit' =>($Account->debit ) + $data['paid_amount'] ,
            ]);

        }

        $voucher = Voucher::find($id);
        DB::transaction(function() use ($data,$result,$result_check,$voucher){
            if(isset($data['number_voucher_in']) && isset($data['fund_id_in']) ){
                $voucher->update([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
//                    'account_id' => $fund['account_id'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
//                    'paymentable_id' => isset($data['fund_id_in']) ? $data['fund_id_in'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_in']) ? $data['account_idAttributable_in'] : null  ,
                    'attributable_id' => isset($data['user_id_in']) ? $data['user_id_in'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' => isset($data['number_voucher_in']) ? $data['number_voucher_in'] :  null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Receipt" ,/* /* Payment, Receipt */
                    'description'=> isset($data['description_in']) ? $data['description_in'] :  null ,
                    'amount'=>  isset($data['amount_in']) ? $data['amount_in'] :  null ,
                    'paid_amount'=> isset($data['paid_amount_in']) ? $data['paid_amount_in'] : null ,
                    'check_num'=> isset($data['checke_num_in']) ? $data['checke_num_in'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }elseif (isset($data['number_voucher_in']) && isset($data['bank_id_in']) ){
                $voucher->update([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
//                    'account_id' => $fund['account_id'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
//                    'paymentable_id' => isset($data['bank_id_in']) ? $data['bank_id_in'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_in']) ? $data['account_idAttributable_in'] : null  ,
                    'attributable_id' => isset($data['user_id_in']) ? $data['user_id_in'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' => isset($data['number_voucher_in']) ? $data['number_voucher_in'] :  null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Receipt" ,/* /* Payment, Receipt */
                    'description'=> isset($data['description_in']) ? $data['description_in'] :  null ,
                    'amount'=>  isset($data['amount_in']) ? $data['amount_in'] :  null ,
                    'paid_amount'=> isset($data['paid_amount_in']) ? $data['paid_amount_in'] : null ,
                    'check_num'=> isset($data['checke_num_in']) ? $data['checke_num_in'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);

            }elseif (isset($data['number_voucher_in']) && isset($data['fund_id_out']) ){
                $voucher->update([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
//                    'account_id' => $fund['account_id'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
//                    'paymentable_id' => isset($data['fund_id_out']) ? $data['fund_id_out'] :  null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' =>  isset($data['user_id_out']) ? $data['user_id_out'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' =>  isset($data['number_voucher_out']) ? $data['number_voucher_out'] : null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Receipt" ,/* /* Payment, Receipt */
                    'description'=>  isset($data['description_out']) ? $data['description_out'] : null ,
                    'amount'=>  isset($data['amount_out']) ? $data['amount_out'] : null ,
                    'paid_amount'=>  isset($data['paid_amount_out']) ? $data['paid_amount_out'] : null ,
                    'check_num'=>  isset($data['checke_num_out']) ? $data['checke_num_out'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }
            else{
                $voucher->update([
                    'voucherable_type' => isset($data['voucher_type']) ? $data['voucher_type'] : null,
//                    'account_id' => $fund['account_id'],
                    'paymentable_type' =>  isset($data['payment_mode_in']) ? $data['payment_mode_in'] :  null  , /* [ 'Modules\Accounting\Entities\Fund', 'Modules\Accounting\Entities\Bank' ] */
//                    'paymentable_id' => isset($data['bank_id_out']) ? $data['bank_id_out'] : null  ,
                    'account_idAttributable' => isset($data['account_idAttributable_out']) ? $data['account_idAttributable_out'] : null  ,
                    'attributable_id' =>  isset($data['user_id_out']) ? $data['user_id_out'] : null ,
                    'liable_id' => \Auth::user()->id,
                    'number' =>  isset($data['number_voucher_out']) ? $data['number_voucher_out'] : null,
                    'date' => isset($result) ? $result : null,
                    'document_type' =>"Receipt" ,/* /* Payment, Receipt */
                    'description'=>  isset($data['description_out']) ? $data['description_out'] : null ,
                    'amount'=>  isset($data['amount_out']) ? $data['amount_out'] : null ,
                    'paid_amount'=>  isset($data['paid_amount_out']) ? $data['paid_amount_out'] : null ,
                    'check_num'=>  isset($data['checke_num_out']) ? $data['checke_num_out'] : null , //no
                    'date_check'=> isset($result_check) ? $result_check : null, //no
                    'group_id' => 1
                ]);
            }
//            if(isset($data['remaining_amount_in'])) {
//                $fund->update([
//                    'balance' => $data['remaining_amount_in'],
//                ]);
//            }
//            if(isset($data['remaining_amount_out'])) {
//                $fund->update([
//                    'balance' => $data['remaining_amount_out'],
//                ]);
//            }
//
        });
        return true;
    }


}
