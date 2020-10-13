<?php

namespace Modules\Admin\Http\Controllers\Estates\Lands;

use App\Repositories\Estate\Land\LandRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\Estates\EstateController;
use Modules\Admin\Http\Requests\StoreLand;
use Modules\Admin\Http\Requests\UpdateLand;
use Modules\Admin\Http\Requests\UpdateBuilding;
use App\EstateOrder;
use App\MaintenanceOrder;
class LandController extends EstateController
{

    protected $land;

    public function __construct(LandRepositoryInterface $land)
    {
        $this->land = $land;
    }

    public function index()
    {
        bread_crumb('Estates | Lands');
        return view('admin::estates.lands.index', ['lands' => $this->land->all()]);
    }

    public function show($id)
    {
        bread_crumb('Estates | Lands | ' . $this->land->getById($id)->land_number);
        return view('admin::estates.lands.index', ['land' => $this->land->getById($id)]);
    }

    public function create()
    {
        bread_crumb('Estates | Lands | New');
        return view('admin::estates.lands.create');
    }

    public function store(StoreLand $request)
    {
        $this->land->create($request->except(['_token']));
        session()->flash('success');
        return redirect()->route('Admin::lands.index');
    }

    public function edit($id)
    {
        bread_crumb('lands | Edit');
        return view('admin::estates.lands.edit', ['lands' => $this->land->getById($id)]);
    }

    public function update($id, UpdateLand $request)
    {
        $request->validated();
        $this->land->update($id, $request->except(['_token']));
        return redirect()->route('Admin::lands.index');
    }
    public function destroy($id)
    {
        $orderst=EstateOrder::where("estate_id",$id)->first();
        $orderMain=MaintenanceOrder::where("estate_id",$id)->first();
        // dd($orderMain);
         if($orderst == null && $orderMain == null){
             $this->land->trash($id);
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
        // $this->land->trash($id);
        // session()->flash('success');
        // return back();
    }


}
