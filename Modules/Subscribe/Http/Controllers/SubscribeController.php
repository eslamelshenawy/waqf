<?php

namespace Modules\Subscribe\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Subscribe\Entities\Subscriber;

class SubscribeController extends Controller
{

    public function store(Request $request)
    {
        Subscriber::create([
            'email' => $request->post('email')
        ]);
        return \response()->json(true, 200);
    }
}
