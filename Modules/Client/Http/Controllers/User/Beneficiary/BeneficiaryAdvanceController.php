<?php

namespace Modules\Client\Http\Controllers\User\Beneficiary;

use App\Advance;
use App\Beneficiary;
use App\Notifications\AdminNotification;
use App\User;
use App\Repositories\User\Beneficiary\BeneficiaryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Accounting\Entities\Voucher;
use Modules\Client\Http\Requests\StoreAdvance;
use Modules\Client\Http\Requests\StoreBeneficiary;
use mysql_xdevapi\Exception;
use Notification;

class BeneficiaryAdvanceController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        if(Auth::guard('beneficiary')->check()){
            return view('client::users.advance',['Advance'=>Advance::where('beneficiary_id',Auth::guard('beneficiary')->user()->id)->orderBy('id', 'DESC')->get()]);
        } else{
            return redirect('.login');
        }
    }

    public function store_advance(Request $request)
    {
        $data=[];
        $validator = \Validator::make($request->all(), [
            'd' => 'required|after:today'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => 'يجب ان يكون التاريخ بعد هذا التاريخ', 'status' => 400], 200);
          }else{
            $arr=array();
            $check_advance= Advance::where('beneficiary_id',\Auth::guard('beneficiary')->user()->id)->get();
            foreach($check_advance as $key=> $advance1){
                if($advance1->is_accepted == 0 && $advance1->is_done == 0){
                    $arr[$key]=1;
                }
                if($advance1->is_accepted == 1 &&   $advance1->is_done == 0){
                    $arr[$key]=2;
                }
            }

            if(!$arr){
                $date = new \DateTime($request['order_datepicker_']);
                $date_pay = $date->format('Y-m-d');
                 $AdvanceNumber= Advance::where('beneficiary_id',\Auth::guard('beneficiary')->user()->id)->count();
                $Advance = Advance::create([
                    'amount' => isset($request['number_advance']) ? $request['number_advance'] : null,
                    'reason_advance' => isset($request['reason_advance']) ? $request['reason_advance'] : null,
                    'date_pay' => $date_pay ? $date_pay : null,
                    'number_advance' => ++$AdvanceNumber,
                    'beneficiary_id' => \Auth::guard('beneficiary')->user()->id,
                ]);
                $user = Beneficiary::find(\Auth::guard('beneficiary')->user()->id);
                $Advance['message']="تم إنشاء طلب سلفه ";
                Notification::send($user, new AdminNotification($Advance));

                return response()->json(['success'=>'تم بالنجاح الطلب']);
            }else{
                return response()->json(['errors' => 'لم يتم قفل السلفه بعد', 'status' => 400], 200);
            }

        }

    }


    public function statement_account(Request $request){
        if(Auth::guard('beneficiary')->check()){
            $data=Beneficiary::with('balances')->find(Auth::guard('beneficiary')->user()->id);
            return view('client::users.statement',['data'=>$data]);
        } else{
            return redirect('.login');
        }

    }
}
