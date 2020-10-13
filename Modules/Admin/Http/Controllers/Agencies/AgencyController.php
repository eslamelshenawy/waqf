<?php

namespace Modules\Admin\Http\Controllers\Agencies;

use App\Agency;
use App\Repositories\User\Agency\AgencyRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\StoreAgency;
use Modules\Admin\Http\Requests\Tenants\UpdateUser;
use Modules\Admin\Http\Requests\UpdateAgency;
use App\MaintenanceOrder;
class AgencyController extends Controller
{
    protected $agency;

    public function __construct(AgencyRepositoryInterface $agency)
    {
        $this->agency = $agency;
    }

    public function index()
    {
        bread_crumb(__('shared::users.agencies'));
        return view('admin::users.agencies.index', ['agencies' => $this->agency->all()]);
    }

    public function show($id)
    {
         return view('admin::users.agencies.show', ['agency' => $this->agency->getById($id)]);
    }

    public function create()
    {
        bread_crumb(__('shared::users.agencies') . ' ' . __('shared::actions.create'));
        return view('admin::users.agencies.create');
    }

    public function store(StoreAgency $request)
    {
        $this->agency->create($request->except(['_token']));
        session()->flash('success');
        return redirect()->route('Admin::agencies.index');
    }

    public function edit($id)
    {
        bread_crumb('Agencies | Edit');
        return view('admin::users.agencies.edit', ['agency' => $this->agency->getById($id)]);
    }

    public function update($id, UpdateAgency $request)
    {
        $request->validated();
        $isActive = $request->has('is_active');
        $request->merge(['is_active' => $isActive]);
        $this->agency->update($request->except(['_token']), $id);
        session()->flash('success');
        return redirect(route('Admin::agencies.index'));
    }

    public function destroy($id)
    {
        
        $orderMain=MaintenanceOrder::where("estate_id",$id)->first();
        // dd($orderMain,$orderst);
        if($orderMain == null){
             Agency::destroy($id);
             return redirect()->back()->with('success', 'تم الحذف بالنجاح'); 
        }elseif($orderMain != null ){
             return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز صيانه  ');
        }
      
    }





}
