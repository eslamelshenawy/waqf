<?php

namespace Modules\Admin\Http\Controllers\Estates\Buildings;

use App\Repositories\Estate\Building\BuildingRepositoryInterface;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\Estates\EstateController;
use Modules\Admin\Http\Requests\StoreBuilding;
use Modules\Admin\Http\Requests\UpdateBuilding;
use App\EstateOrder;
use App\MaintenanceOrder;
class BuildingController extends EstateController
{
    protected $building;

    public function __construct(BuildingRepositoryInterface $building)
    {
        $this->building = $building;
    }

    public function index()
    {
        bread_crumb('Building');
        return view('admin::estates.buildings.index', ['buildings' => $this->building->all()]);
    }

    public function create()
    {
        bread_crumb('Building | New');
        return view('admin::estates.buildings.create');
    }

    public function store(StoreBuilding $request)
    {
        $request->validated();
        $this->building->create($request->except(['_token']));
        return redirect()->route('Admin::buildings.index');
    }

    public function edit($id)
    {
        bread_crumb('Building | Edit');
        return view('admin::estates.buildings.edit', ['building' => $this->building->getWithImages($id)]);
    }

    public function update($id, UpdateBuilding $request)
    {
        $request->validated();
        $this->building->update($id, $request->except(['_token']));
        return redirect()->route('Admin::buildings.index');
    }

    public function destroy($id)
    {
          $orderst=EstateOrder::where("estate_id",$id)->first();
        $orderMain=MaintenanceOrder::where("estate_id",$id)->first();
        // dd($orderMain,$orderst);
        if($orderst == null && $orderMain == null){
             $this->building->trashing($id);
             return redirect()->back()->with('success', 'تم الحذف بالنجاح'); 
        }elseif($orderMain != null && $orderst != null){
             return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز صيانه و حجز عقار ');
        }elseif($orderMain != null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك طلب صيانه');
        }elseif($orderst == null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز ');
        }elseif($orderMain == null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك طلب صيانه');
        }
        else{
             return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز '); 
        }
       
        
        // return back();
    }




}
