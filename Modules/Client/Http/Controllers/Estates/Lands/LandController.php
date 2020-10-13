<?php

namespace Modules\Client\Http\Controllers\Estates\Lands;

use App\Repositories\Estate\Building\ReservationsRepositoryInterface;
use App\Repositories\Estate\Land\LandRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Client\Http\Requests\StoreLand;

class LandController extends Controller
{
    protected $land;

    public function __construct(LandRepositoryInterface $land)
    {
        $this->land = $land;
    }

    public function store(Request $request)
    {

//        $request
//        ->merge([
//            'beneficiary' => Auth::guard('beneficiary')->user()->identity_number
//        ]);
        $this->land->create($request->except(['_token']));
        session()->flash('success');
        return redirect(url('/'));
    }
}
