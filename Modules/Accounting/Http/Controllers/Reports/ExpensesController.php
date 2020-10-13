<?php

namespace Modules\Accounting\Http\Controllers\Reports;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Accounting\Entities\Invoice;
use Modules\Accounting\Entities\Voucher;
use Modules\Accounting\Repositories\Invoice\InvoiceRepositoryInterface;

class ExpensesController extends Controller
{

    public function index()
    {
        $type=\Request::segment(4);
        if($type == "expenses"){
            $Voucher=Voucher::where('document_type','Payment')->with('fund','account','bank')->get();
        }else{
            $Voucher=Voucher::where('document_type','Receipt')->with('fund','account','bank')->get();
        }
        return view('accounting::reports.index',['Voucher'=>$Voucher,'type'=>$type]);
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
        if($type == "expenses"){
            $Voucher=Voucher::where('document_type','Payment')->with('fund','account','bank')->find($id);
        }else{
            $Voucher=Voucher::where('document_type','Receipt')->with('fund','account','bank')->find($id);
        }
        return response()->json(['data' => $Voucher]);
    }


    public function edit($id)
    {
        return view('accounting::Receivable.edit',['invoice'=>Invoice::find($id)]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

    }
}
