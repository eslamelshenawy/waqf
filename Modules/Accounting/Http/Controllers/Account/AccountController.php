<?php

namespace Modules\Accounting\Http\Controllers\Account;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounting\Entities\Account;
use Modules\Accounting\Entities\Journal;
use function response;

class AccountController extends Controller
{
    public function __invoke()
    {
        bread_crumb(' Accounts');

        return view('accounting::accounts.index', ['accounts' => Account::with('account')->select('accounts.*', DB::raw('(SELECT id FROM accounts WHERE accounts.parent_id = accounts.id ) as sort'))->orderBy('code')->get()]);
    }

    public function accountStatement(Request $request)
    {
        bread_crumb(' AccountStatement');
        return view('accounting::accounts.statement',['Journal'=>Journal::with('details')->select('journalable_id')->distinct('journalable_id')->get()]);

    }
    public function accountStatementDetails(Request $request,$id)
    {
        bread_crumb(' AccountStatementDetails');
        return view('accounting::accounts.statementDetails',['Journal'=>Journal::with('account')->where('journalable_id',$id)->get()]);

    }

        public function trialBalance(Request $request)
    {
        bread_crumb(' ميزان المراجعه');
        return view('accounting::accounts.trialBalance', ['account' => Account::with('account')->get()]);

    }


        public function editAccount(Request $request, $id)
    {
        return view('accounting::accounts.partials._edit', ['account' => Account::with('account')->find($id)]);

    }

    public function updateAccount(Request $request, $id)
    {
        $newAccount = Account::find($id);
        $newAccount->code = $request->codeAccount;
        $newAccount->name = $request->nameAccount;
        $newAccount->type = $request->typeAccount;
        $newAccount->debit = $request->debitAccount;
        $newAccount->credit = $request->creditAccount;
        $newAccount->balance = ($request->creditAccount - $request->debitAccount);

        $newAccount->typeMenu = $request->typeMenu;
        $newAccount->typeAccountMenu = $request->typeAccountMenu;

        if ($request->dataMain != null) {
            $newAccount->parent_id = $request->dataMain;
        }
        if ($request->dataMain1 != null) {
            $newAccount->parent_id = $request->dataMain1;
        }
        if ($request->dataMain2 != null) {
            $newAccount->parent_id = $request->dataMain2;
        }

        if ($request->dataSubdivision != null) {
            $newAccount->parent_id = $request->dataSubdivision;
        }
        $newAccount->group_id = 1;
        $newAccount->save();

        return response()->json(["status" => "success", "data" => $newAccount], 200);

    }

}

