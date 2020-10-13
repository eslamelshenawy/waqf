<?php

namespace Modules\Accounting\Http\Controllers\Voucher;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounting\Entities\Voucher;
use Modules\Accounting\Repositories\Voucher\VoucherRepositoryInterface;

class VoucherReceiptController extends Controller
{
    protected $voucher;

    public function __construct(VoucherRepositoryInterface $voucher)
    {
        $this->voucher = $voucher;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('accounting::vouchers.receipts.index', ['vouchers' => Voucher::where('document_type','Receipt')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('accounting::vouchers.receipts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
      
    //   dd($request->all(),$request->payment_mode_in);
        if($request->voucher_type == "سند داخلى"){
            
              if($request->payment_mode_in == "Fund"  && !isset($request->payment_mode_in) && $request->payment_mode_in != "Bank"  ){
                  
             $request->validate([
             'date_voucher_in' => 'required',
            'account_idAttributable_in' => 'required',
            'payment_mode_in' => 'required',
            'user_id_in' => 'required',
            'description_in' => 'required',
            
            'fund_id_in' => 'required',
            'paid_amount_in' => 'required',
        ]);
        }else{
            $request->validate([
                   'date_voucher_in' => 'required',
            'account_idAttributable_in' => 'required',
            'payment_mode_in' => 'required',
            'user_id_in' => 'required',
            'description_in' => 'required',
                'paid_amount_in' => 'required',
            'bank_id_in' => 'required',
            'date_Due_in' => 'required',
            'checke_num_in' => 'required',
        ]); 
        }
        
        }
   if($request->voucher_type == "سند خارجى"){
        
        if($request->payment_mode_out == "Fund" && !isset($request->payment_mode_in) && $request->payment_mode_in != "Bank" ){
             $request->validate([
             'date_voucher_out' => 'required',
            'account_idAttributable_out' => 'required',
            'payment_mode_out' => 'required',
            'user_id_out' => 'required',
            'description_out' => 'required',
            
             'fund_id_out' => 'required',
            'paid_amount_out' => 'required',
            
        ]);

        }else{
            $request->validate([
             'date_voucher_out' => 'required',
            'account_idAttributable_out' => 'required',
            'payment_mode_out' => 'required',
            'user_id_out' => 'required',
            'description_out' => 'required', 
             'paid_amount_out' => 'required',
            'bank_id_out' => 'required',
            'date_Due_out' => 'required',
            'checke_num_out' => 'required',
             ]); 
          }
        
        }
         
       
        $this->voucher->create_recipt($request->all());
        return redirect(route('Accounting::vouchers.receipts.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('accounting::vouchers.receipts.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('accounting::vouchers.receipts.edit',['voucher'=>Voucher::with('fund')->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->voucher->update_recipt($request->all(),$id);
        return redirect(route('Accounting::vouchers.receipts.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
