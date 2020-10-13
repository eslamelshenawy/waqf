<?php

namespace Modules\Admin\Http\Controllers\Tenants;


use App\Repositories\User\Tenant\TenantRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\StoreTenant;
use Modules\Admin\Http\Requests\UpdateTenant;
use App\EstateOrder;
use App\MaintenanceOrder;
class TenantController extends Controller
{
    protected $tenant;

    public function __construct(TenantRepositoryInterface $tenant)
    {
        $this->tenant = $tenant;
    }

    public function index()
    {
        bread_crumb('المستاجرين');
        return view('admin::users.tenants.index', ['tenants' => $this->tenant->all()]);
    }

    public function show($id)
    {
        return view('admin::users.tenants.show', ['user' => $this->tenant->getById($id)]);
    }

    public function create()
    {
        bread_crumb(' المستاجرين / جديد ');
        return view('admin::users.tenants.create');
    }

    public function store(StoreTenant $request)
    {
        $this->tenant->create($request->except(['_token']));
        session()->flash('success');
        return redirect()->route('Admin::tenants.index');
    }

    public function edit($id)
    {
        bread_crumb(' المستاجرين | تعديل ');
        return view('admin::users.tenants.edit', ['tenant' => $this->tenant->getById($id)]);
    }

    public function update($id, UpdateTenant $request)
    {
        $request->validated();
        $isActive = $request->has('is_active');
        $request->merge(['is_active' => $isActive]);
        $this->tenant->update($id, $request->except(['_token']));
        session()->flash('success');
        return redirect()->route('Admin::tenants.index');
    }

    public function destroy($id)
    {
        $orderst=EstateOrder::where("tenant_id",$id)->first();
        $orderMain=MaintenanceOrder::where("tenant_id",$id)->first();
        // dd($orderMain,$orderst);
        if($orderst == null && $orderMain == null){
             $this->tenant->trashing($id);
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
       
        
    }

}
