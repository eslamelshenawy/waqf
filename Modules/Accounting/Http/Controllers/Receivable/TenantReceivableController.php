<?php

namespace Modules\Accounting\Http\Controllers\Receivable;


use App\Agency;
use App\Beneficiary;
use App\Building;
use App\Tenant;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Accounting\Entities\Invoice;
use Modules\Accounting\Entities\Voucher;
use Modules\Accounting\Repositories\Invoice\InvoiceRepositoryInterface;

class TenantReceivableController extends Controller
{

    public function index()
    {

        $type=\Request::segment(4);
        if($type == "tenant"){
            $data=Tenant::with('balances','rents','maintenanceOrders','estateOrders')->get();
        }elseif ($type == "agency"){
            $data=Agency::with('balances','maintenanceOrders')->get();
        }
        else{
            $data=Beneficiary::with('balances')->get();
        }

        return view('accounting::Receivables.index',['data'=>$data,'type'=>$type]);
    }


    public function create()
    {
        bread_crumb('Invoices | Sales | New');
        return view('accounting::invoices.create');
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        $type=\Request::segment(4);
        if($type == "tenant"){
            $data=Tenant::with('balances','rents','maintenanceOrders','estateOrders')->find($id);
        }elseif ($type == "agency"){
            $data=Agency::with('balances')->find($id);
        } else{
            $data=Beneficiary::with('balances')->find($id);
        }

        return view('accounting::Receivables.partials._show',['data'=>$data,'type'=>$type]);
    }


    public function edit($id)
    {
        return view('accounting::Receivables.edit',['invoice'=>Invoice::find($id)]);
    }

    public function rentBuilding($id)
    {
         $rentBuilding=Building::find($id);
        return response()->json($rentBuilding);

    }
    public function rentBuilding_order($id,$data,Request $request)
    {

        $remainderData=json_decode($data);
         $rentBuilding=Building::find($id);
             $rentBuilding['amountEstate']=$remainderData->amount;
             $rentBuilding['rentPeriodEstate']=$remainderData->rentperiod;
             $rentBuilding['rentedAtEstate']=$remainderData->rented_at;
        return response()->json($rentBuilding);

    }
    public function agencyMaintence($id)
    {
         $Agency=Agency::find($id);
        return response()->json($Agency);

    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

    }
}
