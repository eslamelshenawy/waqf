<?php

namespace Modules\Accounting\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounting\Entities\Account;
use Modules\Accounting\Entities\Accounting;
use Modules\Accounting\Entities\Journal;

class CreateAccountController extends Controller
{


    public function __invoke(Request $request)
    {
        Account::create($request->merge(['group_id' => 1])->all());
        \response()->json(true, 200);
    }

    public function remove(Request $request){
//    Account::find($request->id)->delete();
        \response()->json(true, 200);
    }

    public function create_journal(Request $request){
        
        //  dd($request->all());
          $request->validate([
                          'date_at' => 'required',
            'message' => 'required',

            //  "account_id"    => "required|array",
            //  "account_id.*"  => "required",
            //  "debit"    => "required|array",
            //  "debit.*"  => "required",
            //  "credit"    => "required|array",
            //  "credit.*"  => "required",

        ]);
        
        foreach ($request->account_id as $key=> $account_id){
            $Journal=new Journal;
            $Journal->number   =$request->number;
            $Journal->details   =$request->message;
            $Journal->date_at   =$request->date_at;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$account_id;
            $Journal->debit   =$request->debit[$key] == null ? 0 : $request->debit[$key];
            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();
        }
        return redirect('en/accounting/accounts/journals')->with('success', 'تم الاضافة بالنجاح ');

    }
    public function creatAccount(Request $request)
    {
       
        
        $newAccount=new Account;
        $newAccount->code   =$request->codeAccount;
        $newAccount->name   =$request->nameAccount;
        $newAccount->type   =$request->typeAccount;
        $newAccount->debit   =$request->debitAccount;
        $newAccount->credit   =$request->creditAccount;
        $newAccount->debitFrist   =$request->debitAccount;
        $newAccount->creditFirst   =$request->creditAccount;
        $newAccount->balance   =($request->creditAccount - $request->debitAccount);

        $newAccount->typeMenu   =$request->typeMenu;
        $newAccount->typeAccountMenu   =$request->typeAccountMenu;

        if($request->dataMain != null){
            $newAccount->parent_id   =$request->dataMain;
        }
        if($request->dataMain1 != null){
            $newAccount->parent_id   =$request->dataMain1;
        }
        if ($request->dataMain2 != null){
            $newAccount->parent_id   =$request->dataMain2;
        }

        if ($request->dataSubdivision != null){
            $newAccount->parent_id   =$request->dataSubdivision;
        }
        $newAccount->group_id   =1;
        $newAccount->save();

        return \response()->json(["status"=>"success","data"=>$newAccount], 200);

    }

}
