<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\Administrator;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\AdminLogin;


class AdminAuthController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('admin.login');
    }

    public function create()
    {
        return view('admin::create');
    }


    public function store(AdminLogin $request)
    {

        $validate = $request->validated();

        $info = [
            'email' => $request->post('email'),
            'password' => $request->post('password')
        ];

        if ($this->guard()->attempt($info)) {
            return redirect(route('Admin::root'));
        } else {
            return redirect()->back()->with('failed', __('admin::dashboard.incorrect'));
        }
    }


//    public function destroy(Request $request)
//    {
//
//        Auth::guard('admin')->logout();
//        Session::flush();
////        $this->logoutEdition($request);
//
//
//    }


    protected function guard()
    {
        return Auth::guard('admin');
    }

}
