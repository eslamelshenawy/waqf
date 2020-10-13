<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Administrator;
use Modules\Admin\Http\Requests\Tenants\UpdateUser;

class ValidatorController extends Controller
{
    public function isEmailValid(Request $request)
    {
        if(DB::table('users')->where('email', '=', $request->post('email'))->get()->count() > 0){
            return \response()->json(true, 200);
        }

        return \response()->json(false, 200);
    }
}
