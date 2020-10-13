<?php
namespace Modules\Client\Http\Controllers\Api;
use App\Repositories\Order\Estate\EstateOrderRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class EstateOrderController extends Controller
{
    protected $estateOrder;
    public function __construct(EstateOrderRepository $estateOrder)
    {
        $this->estateOrder = $estateOrder;
    }
    public function store(Request $request)
    {
        return \response()->json($this->estateOrder->create($request->all()), 200);
    }
}