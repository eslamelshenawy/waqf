<?php

namespace Modules\Admin\Http\Controllers\Beneficiaries;

use App\Repositories\User\Beneficiary\BeneficiaryRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\StoreBeneficiary;
use Modules\Admin\Http\Requests\UpdateBeneficiary;
use App\Advance;
class BeneficiaryController extends Controller
{
    protected $beneficiary;

    public function __construct(BeneficiaryRepositoryInterface $beneficiary)
    {
        $this->beneficiary = $beneficiary;
    }

    public function index()
    {
        bread_crumb('المستفييدين');
        return view('admin::users.beneficiaries.index', ['beneficiaries' => $this->beneficiary->all()]);
    }

    public function show($id)
    {
        return view('admin::users.beneficiaries.show', ['beneficiary' => $this->beneficiary->getById($id)]);
    }

    public function create()
    {
        bread_crumb('المستفييدين  /  جديد');
        return view('admin::users.beneficiaries.create');
    }

    public function store(StoreBeneficiary $request)
    {
        $this->beneficiary->create($request->except(['_token']));
        session()->flash('success');
        return redirect()->route('Admin::beneficiaries.index');
    }

    public function edit($id)
    {
        return view('admin::users.beneficiaries.edit', ['beneficiary' => $this->beneficiary->getById($id)]);
    }

    public function update($id, UpdateBeneficiary $request)
    {
        $isActive = $request->has('is_active');
        $request->merge(['is_active' => $isActive]);
        $this->beneficiary->update($id, $request->except(['_token']));
        session()->flash('success');
        return redirect()->route('Admin::beneficiaries.index');
    }

    public function destroy($id)
    {
        
         $orderMain=Advance::where("beneficiary_id",$id)->first();
        // dd($orderMain);
        if($orderMain == null){
             $this->beneficiary->trashing($id);
             return redirect()->back()->with('success', 'تم الحذف بالنجاح'); 
        }elseif($orderMain != null ){
             return redirect()->back()->with('errors', 'لم يتم الحذف هناك  سلفه ');
        }
        
    }


}
