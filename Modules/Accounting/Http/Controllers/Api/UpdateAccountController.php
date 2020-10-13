<?php

namespace Modules\Accounting\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounting\Entities\Account;

class UpdateAccountController extends Controller
{

    public function __invoke(Request $request)
    {

        $field = $request->post('field');
        $account = Account::find($request->post('id'));

        $account->$field = $request->post('newVal');

        $account->save();

        \response()->json(true, 200);
    }



}
