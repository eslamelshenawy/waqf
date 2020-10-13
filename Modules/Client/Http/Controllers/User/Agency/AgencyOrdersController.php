<?php

namespace Modules\Client\Http\Controllers\User\Agency;

use App\Repositories\User\Agency\AgencyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Client\Http\Requests\StoreAgency;

class AgencyOrdersController extends Controller
{

    protected $agency;

    public function __construct(AgencyRepositoryInterface $agency)
    {
        $this->middleware('auth:agency')->except('logout');
        $this->agency = $agency;
    }

    public function index()
    {
        $orders = $this->agency->getOrders(Auth::guard('agency')->user()->id);
        return view('client::users.agencies.orders.index', compact('orders'));
    }

    public function index_status(Request $request){
         return \response()->json($this->agency->update_status($request->all()), 200);

    }


}
