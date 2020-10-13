<?php

namespace Modules\Accounting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AccountingController extends Controller
{

    public function index()
    {
        bread_crumb('');
        return view('accounting::index');
    }

}
