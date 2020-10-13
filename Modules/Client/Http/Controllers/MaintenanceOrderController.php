<?php

namespace Modules\Client\Http\Controllers;

use App\Repositories\Order\Maintenance\MaintenanceOrderInterfaceRepository;
use App\Repositories\User\Agency\AgencyRepositoryInterface;
use App\Tenant;
use App\EstateOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\StoremaintenanceOrder;

class MaintenanceOrderController extends Controller
{

    protected $maintenanceOrder;

    public function __construct(MaintenanceOrderInterfaceRepository $maintenanceOrder)
    {
        $this->maintenanceOrder = $maintenanceOrder;
    }

    public function store(StoremaintenanceOrder $request)
    {

        if($this->maintenanceOrder->create($request->all()) == true){
            return redirect()->back()->with('success', 'تم تقديم الطلب بالنجاح ');
        }
    }

    public function old_maintenance(){
        $orders = $this->maintenanceOrder->getOrders(Auth::guard('web')->user()->id);
        return view('client::users.agencies.orders.index', compact('orders'));
    }
    
       public function old_tenantOrders(){
           if(\Auth::check() == false){
            return redirect()->to('.login');
        }else{
        $ordersTentans = EstateOrder::with('madeBy','tenanter')->where('tenant_id',Auth::guard('web')->user()->id)->get();
        // dd($ordersTentans);
         $orders = $this->maintenanceOrder->getOrders(Auth::guard('web')->user()->id);
        return view('client::users.tenants.orders.index', compact('orders','ordersTentans'));
        }
    }

}
