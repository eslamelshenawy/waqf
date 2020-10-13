<?php

namespace Modules\Client\Http\Controllers\Ad;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdController extends Controller
{
    public function estates()
    {
        return view('client::ads.estates.index');
    }
}
