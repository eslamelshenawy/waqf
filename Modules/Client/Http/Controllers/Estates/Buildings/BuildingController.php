<?php

namespace Modules\Client\Http\Controllers\Estates\Buildings;

use App\Repositories\Estate\Building\BuildingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Client\Http\Requests\StoreBuilding;

class BuildingController extends Controller
{
    protected $building;

    public function __construct(BuildingRepositoryInterface $building)
    {
        $this->building = $building;
    }

    public function store(StoreBuilding $request)
    {

//        dd($request->post('building_type'));

//        $request->merge(['beneficiary' => Auth::guard('beneficiary')->user()->identity_number ]);
        $this->building->create($request->except(['_token']));
        session('flash', 'success');
        return redirect(url('/'));
    }
}
