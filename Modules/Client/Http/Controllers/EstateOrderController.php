<?php

namespace Modules\Client\Http\Controllers;

use App\MaintenanceOrder;
use App\Repositories\Order\Estate\EstateOrderInterfaceRepository;
use App\Repositories\Order\Maintenance\MaintenanceOrderInterfaceRepository;
use App\Repositories\User\Agency\AgencyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\CheckEndDateEstateOrder;
use Modules\Admin\Http\Requests\StoreEstateOrder;

class EstateOrderController extends Controller
{

    protected $estateOrder;

    public function __construct(EstateOrderInterfaceRepository $estateOrder)
    {
        $this->estateOrder = $estateOrder;
    }

    public function store(StoreEstateOrder $request)
    {
        if($this->estateOrder->create($request->all()) == true){
            return redirect()->back()->with('success', 'تم الحجز  بالنجاح ');
        }
    }

    public function store_date_end(Request $request){
        return \response()->json($this->estateOrder->store_data_end($request->all()), 200);
    }


}
