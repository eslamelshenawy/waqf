<?php

namespace Modules\Admin\Http\Controllers\Beneficiaries;

use App\Advance;
use App\BeneficiaryBalance;
use App\EstateOrder;
use App\orderBalance;
use App\Repositories\User\Advance\AdvanceRepositoryInterface;
use App\Repositories\User\Beneficiary\BeneficiaryRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\StoreBeneficiary;
use Modules\Admin\Http\Requests\StoreBuilding;
use Modules\Admin\Http\Requests\UpdateBeneficiary;
use Modules\Admin\Http\Requests\UpdateBuilding;

class balanceSheetController extends Controller
{
    protected $advance;


    public function index()
    {
        bread_crumb('Reservations');
        return view('admin::users.balanceSheet.index', ['orderBalance' => orderBalance::with('madeBy')->get()]);
    }

    public function destroy($id)
    {
        $this->building->trashing($id);
        return back();
    }


}
