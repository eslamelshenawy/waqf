<?php

namespace Modules\Client\Http\Controllers\Estates\Shops;

use App\Repositories\Estate\Building\ReservationsRepositoryInterface;
use App\Repositories\Estate\Land\LandRepositoryInterface;
use App\Repositories\Estate\Shop\ShopRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Client\Http\Requests\StoreShop;

class ShopController extends Controller
{
    protected $shop;

    public function __construct(ShopRepositoryInterface $shop)
    {
        $this->shop = $shop;
    }

    public function store(StoreShop $request)
    {
//        $request
//        ->merge([
//            'beneficiary' => Auth::guard('beneficiary')->user()->identity_number
//        ]);
        $this->shop->create($request->except(['_token']));
        session()->flash('success');
        return redirect(url('/'));
    }
}
