<?php

namespace Modules\Accounting\Http\Controllers\Fund;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Accounting\Entities\Bank;
use Modules\Accounting\Entities\Fund;
use Modules\Accounting\Repositories\Fund\FundRepositoryInterface;
use Modules\Admin\Entities\Administrator;

class FundController extends Controller
{
    protected $fund;

    public function __construct(FundRepositoryInterface $fund)
    {
        $this->fund = $fund;
    }

    public function index(Request $request)
    {
        bread_crumb('Fund | Sales');
        return view('accounting::fund.index', ['fund' => $this->fund->all(),'type'=>$request->type]);
    }


    public function create(Request $request)
    {
        bread_crumb('Fund | Sales | New');
        return view('accounting::fund.create',['type'=>$request->type]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_fund' => 'required',
        ]);
        $this->fund->create($request->all());
        session()->flash('success');
        if($request->type == 'bank'){
            return redirect('accounting/fund?type=bank');
        }else{
            return redirect('accounting/fund?type=spot');
        }

    }


    public function show($id)
    {
        return view('accounting::fund.show');
    }


    public function edit($id,Request $request)
    {
        if($request->type == 'bank'){
            $fund_bank=Bank::find($id);
        }else{
            $fund_bank=Fund::find($id);
        }
        return view('accounting::fund.edit',['type'=>$request->type,'fund_bank'=>$fund_bank]);
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name_fund' => 'required',
        ]);
        $this->fund->update($id,$request->all());
        session()->flash('success');
        if($request->type == 'bank'){
            return redirect('accounting/fund?type=bank');
        }else{
            return redirect('accounting/fund?type=spot');
        }

    }


    public function destroy($id,Request $request)
    {
        if($request->model == 'bank') {
            $Bank = Bank::destroy($id);
            return redirect('accounting/fund?type=bank');
        }else{
            $Fund = Fund::destroy($id);
            return redirect('accounting/fund?type=spot');
        }
    }

      public function control(Request $request)
    {
         if($request->model == 'bank'){

             $Bank=Bank::find($request->id);
             $Bank_status = $Bank->update([
                 'is_active' => $request['is_active'],
             ]);
             return redirect('accounting/fund?type=bank');
         }else{
             $fund=Fund::find($request->id);
             $fund_status = $fund->update([
                 'is_active' => $request['is_active'],
             ]);
         }
        return redirect('accounting/fund?type=spot');
    }
}
