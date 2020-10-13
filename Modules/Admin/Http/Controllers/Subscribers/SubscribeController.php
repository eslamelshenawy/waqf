<?php

namespace Modules\Admin\Http\Controllers\Subscribers;

use Illuminate\Routing\Controller;
use Modules\Subscribe\Entities\Subscriber;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin::users.subscribers.index', compact('subscribers'));
    }
    public function destroy($id)
    {
        Subscriber::find($id)->delete();
        return back();
    }
}