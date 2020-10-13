<?php

namespace Modules\Client\Http\Controllers;

use App\Repositories\Order\Maintenance\MaintenanceOrderInterfaceRepository;
use App\Repositories\User\Agency\AgencyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MaintenanceController extends Controller
{

    protected $agency;

    public function __construct(AgencyRepositoryInterface $agency,MaintenanceOrderInterfaceRepository $maintenanceOrder)
    {
        $this->middleware('auth:beneficiary')->except('logout')->except(['index', 'show']);
        $this->agency = $agency;
        $this->maintenanceOrder = $maintenanceOrder;
    }

    public function index()
    {
        bread_crumb_3d($previous = null, $current = ['name' => 'مركز خدمات الصيانة', 'url' => route('maintenance.index')]);
//        dd('fd');
        return view('client::maintenance.index', ['agencies' => $this->agency->pagination(10)]);
    }

    public function show($id)
    {
//        bread_crumb_3d($previous = ['name' => 'الاعلانات العقارية', 'url' => route('estate.index')],
//            $current = ['name' => 'التفاصيل', 'url' => null]);
//        return view('client::estates.show');
    }

    public function create_order()
    {
//        bread_crumb_3d(__('shared::estates.new'));
        return view('client::estates.create');
    }

}
