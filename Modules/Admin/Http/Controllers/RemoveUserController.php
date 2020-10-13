<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Administrator;

class RemoveUserController extends Controller
{
    protected $user;

    public function __invoke(Request $request)
    {
        $user = User::find($request->post('user_id'));
        $user->delete();

        return back();
    }

}
