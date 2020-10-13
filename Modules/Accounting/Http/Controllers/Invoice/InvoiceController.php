<?php

namespace Modules\Accounting\Http\Controllers\Invoice;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Accounting\Entities\Invoice;
use Modules\Accounting\Repositories\Invoice\InvoiceRepositoryInterface;
use Modules\Admin\Http\Requests\StoreInvoice;
class InvoiceController extends Controller
{
    protected $invoice;

    public function __construct(InvoiceRepositoryInterface $invoice)
    {
        $this->invoice = $invoice;
    }

    public function index()
    {
        bread_crumb('Invoices | Sales');
        return view('accounting::invoices.index', ['invoices' => $this->invoice->all()]);
    }


    public function create(Request  $request,$price,$tent)
    {
        bread_crumb('Invoices | Sales | New');
        return view('accounting::invoices.create',['tent'=>$tent,'price'=>$price]);
    }


    public function store(Request  $request)
    {
//            switch ($request->payment_mode){
//                case 'fund':
//                    $paymentable_type = 'Fund';
//                    $paymentable_id = $request->fund_id;
//                    break;
//                case 'bank':
//                    $paymentable_type = 'Bank';
//                    $paymentable_id = $request->bank_id;
//                    break;
//            }
//
        $request->validate([
             'order_at' => 'required',
            'tenant_id' => 'required',
            'service_price' => 'required',
            'service_name' => 'required',
            // 'service_price' => 'required',
            'account_id' => 'required',
        ]);
//
//
//        $request->merge(['account_id' => 1]);
//
//        if ($request->payment_mode != null) {
//            $request->merge(['paymentable_type' => $paymentable_type]);
//            $request->merge(['paymentable_id' => $paymentable_id]);
//        }

        $this->invoice->create($request->except(['_token']));
        session()->flash('success');
        return redirect(route('Accounting::invoices.index'));

    }


    public function show($id)
    {
        return view('accounting::invoices.show');
    }


    public function edit($id)
    {
        return view('accounting::invoices.edit',['invoice'=>Invoice::find($id)]);
    }


    public function update(Request $request, $id)
    {
        //

//        switch ($request->payment_mode){
//            case 'fund':
//                $paymentable_type = 'Fund';
//                $paymentable_id = $request->fund_id;
//                break;
//            case 'bank':
//                $paymentable_type = 'Bank';
//                $paymentable_id = $request->bank_id;
//                break;
//        }
        $request->validate([
             'order_at' => 'required',
            'tenant_id' => 'required',
            'service_price' => 'required',
            'service_name' => 'required',
            // 'service_price' => 'required',
            'account_id' => 'required',
        ]);


        // Just for validation

        // Create invoice with details


//        $request->merge(['account_id' => 1]);
//
//        if ($request->payment_mode != null) {
//            $request->merge(['paymentable_type' => $paymentable_type]);
//            $request->merge(['paymentable_id' => $paymentable_id]);
//        }
        $this->invoice->update($request->except(['_token']),$id);
        session()->flash('success');
        return redirect(route('Accounting::invoices.index'));

    }


    public function destroy($id)
    {
        $invoice = Invoice::destroy($id);
        return redirect()->back()->with('success', 'Success Delete Invoice');
    }
}
