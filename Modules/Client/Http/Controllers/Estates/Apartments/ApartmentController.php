<?php

namespace Modules\Client\Http\Controllers\Estates\Apartments;

use App\Repositories\Estate\Apartment\ApartmentRepositoryInterface;
use App\Repositories\Estate\Building\ReservationsRepositoryInterface;
use App\Repositories\Estate\Land\LandRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Client\Http\Requests\StoreApartment;

class ApartmentController extends Controller
{
    protected $apartment;

    public function __construct(ApartmentRepositoryInterface $apartment)
    {
        $this->apartment = $apartment;
    }

    public function store(StoreApartment $request)
    {
//        $request->merge(['beneficiary' => Auth::guard('beneficiary')->user()->id]);
        $this->apartment->create($request->except(['_token']));
        session()->flash('success');
        return redirect(url('/'));
    }
}
