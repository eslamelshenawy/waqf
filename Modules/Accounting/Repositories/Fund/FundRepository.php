<?php


namespace Modules\Accounting\Repositories\Fund;

use Illuminate\Support\Facades\DB;
use Modules\Accounting\Entities\Bank;
use Modules\Accounting\Entities\BankBalance;
use Modules\Accounting\Entities\Fund;
use Modules\Accounting\Entities\FundBalance;

class FundRepository implements FundRepositoryInterface
{
    public function all()
    {
        return Fund::all();
    }

    public function getById(int $id)
    {
        return 0;
    }

    public function create(array $data)
    {

        // Create invoice header

        $fund = null;

        DB::transaction(function() use ($data, &$fund){
            if($data['type'] == 'spot'){

                $fund = Fund::create([
                    'account_id' => $data['typefund'],
                    'name' => $data['name_fund'],
                    'balance' => $data['balance'],
                    'group_id' => 1
                ]);
                $fundBalance = FundBalance::create([
                    'fund_id' => $fund->id,
                    'debit' => 0,
                    'credit' => $data['balance'],
                ]);

            }else{
                $fund = Bank::create([
                    'account_id' => $data['typefund'],
                    'name' => $data['name_fund'],
                    'number_account' => $data['number_account'],
                    'balance' => $data['balance'],
                    'group_id' => 1
                ]);
                $BankBalance = BankBalance::create([
                    'bank_id' => $fund->id,
                    'debit' => 0,
                    'credit' => $data['balance'],
                ]);

            }

        });

        return $fund;

    }
     public function update(int $id,array $data)
    {
        // Create invoice header

        $fund = null;

            if($data['type'] == 'spot'){
                $fund=Fund::find($id);
                $Bank_fund = $fund->update([
                    'account_id' => $data['typefund'],
                    'name' => $data['name_fund'],
                    'balance' => $data['balance'],
                    'group_id' => 1
                ]);

                $fundBalance = FundBalance::where('fund_id',$id)->first();
                $fundBalance->update([
                    'credit' => $data['balance'],
                ]);

            }else{
                $Bank=Bank::find($id);
                $Bank_fund = $Bank->update([
                    'account_id' => $data['typefund'],
                    'name' => $data['name_fund'],
                    'number_account' => $data['number_account'],
                    'balance' => $data['balance'],
                    'group_id' => 1
                ]);
                $BankBalance = BankBalance::where('bank_id',$id)->first();
                $BankBalance->update([
                    'credit' => $data['balance'],
                ]);

            }

        return $Bank_fund;

    }
}
