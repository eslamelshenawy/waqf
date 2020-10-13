<?php
namespace Modules\Client\Http\Controllers\Api;
use App\Repositories\Order\Maintenance\MaintenanceOrderInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class MaintenanceOrderController extends Controller
{
    protected $maintenanceOrder;
    public function __construct(MaintenanceOrderInterfaceRepository $maintenanceOrder)
    {
        $this->maintenanceOrder = $maintenanceOrder;
    }
    public function store(Request $request)
    {
        return \response()->json($this->maintenanceOrder->create($request->all()), 200);
    }
}
