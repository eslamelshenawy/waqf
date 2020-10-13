<?php

namespace Modules\Accounting\Http\Controllers\Voucher;

use App\Agency;
use App\VocherOutUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounting\Entities\Voucher;
use Modules\Accounting\Repositories\Voucher\VoucherRepositoryInterface;

class VoucherPaymentController extends Controller
{

    protected $voucher;

    public function __construct(VoucherRepositoryInterface $voucher)
    {
        $this->voucher = $voucher;
    }

    public function index()
    {
        return view('accounting::vouchers.payments.index', ['vouchers' => Voucher::where('document_type','Payment')->get()]);
    }


    public function create()
    {
        return view('accounting::vouchers.payments.create');
    }


    public function store(Request $request)
    {
        // dd($request->all(),$request->payment_mode_in);
        if($request->voucher_type == "سند داخلى"){
            
              if($request->payment_mode_in == "Fund" || !isset($request->payment_mode_in) && $request->payment_mode_in != "Bank" ){
                  
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

        if($request->payment_mode_out == "Fund"  || !isset($request->payment_mode_in) && $request->payment_mode_in != "Bank" ){
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
         
       
            $this->voucher->create($request->all()); 
        
        
        return redirect(route('Accounting::vouchers.payments.index'));
    }


    public function show($id)
    {
        return view('accounting::vouchers.payments.show');
    }


    public function edit($id)
    {
        return view('accounting::vouchers.payments.edit',['voucher'=>Voucher::with('account')->find($id)]);
    }

    public function update(Request $request, $id)
    {
          if($request->voucher_type == "سند داخلى"){
            
              if($request->payment_mode_in == "Fund"){
                  
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

        if($request->payment_mode_out == "Fund"){
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
        
        $this->voucher->update($request->all(),$id);
        return redirect(route('Accounting::vouchers.payments.index'));
    }


    public function destroy($id)
    {
        //
    }

    public function usersajax(Request $request){
//        $data = [];

        $search = $request->q;
         $result= \DB::table('beneficiaries')->select('beneficiaries.id','beneficiaries.name')
            ->where('beneficiaries.name','LIKE',"%$search%")
            ->get();
//        $data = $data_users->merge($result);
        $data = $result;

        return response()->json($data);
    }

    public function usersajax_out(Request $request){

        $search = $request->q;
        $data= \DB::table('agencies')->select('agencies.id','agencies.name')
            ->where('agencies.name','LIKE',"%$search%")
            ->get();
        return response()->json($data);
    }

    public function tentantsajax_out(Request $request){

        $search = $request->q;
        $data= \DB::table('users')->select('users.id','users.name')
            ->where('users.name','LIKE',"%$search%")
            ->get();
        return response()->json($data);
    }

    /*
     * create voucher
     * */
    public function voucher_out (Request $request){
//        $data = [];
    
    // dd($request->all());
        try
        {
            // Call the rabbit hole of an import method
            $data= Agency::create([
                'name' => isset($request['name_voucher']) ? $request['name_voucher'] : null,
                'email' => isset($request['email_voucher']) ? $request['email_voucher'] : null,
                'mobile' => isset($request['mobile_voucher']) ? $request['mobile_voucher'] : null,
                'user_type' => isset($request['voucher_user_type']) ? $request['voucher_user_type'] : null,
                'type' => isset($request['type']) ? $request['type'] : null,
                'city_id' => isset($data['city_id']) ? $request['city_id'] : getModelId('City', 'name_en', $request['city']),
                'identity_number' => isset($request['identityNumber']) ? $request['identityNumber'] : null,
                'is_active' => 1,
                'password' => bcrypt('123456789'),
                'services' =>["other"],
            ]);
            return response()->json(['success'=>"تم بالنجاح الاضافه "]);
        }
        catch(\Exception $e)
        {
            return response()->json(['error'=>$e]);
        }
    }
}
