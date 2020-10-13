<?php

namespace Modules\Client\Http\Controllers\User\Beneficiary;

use App\Advance;
use App\orderBalance;
use App\OrderInformation;
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
use App\Beneficiary;
use App\Notifications\AdminNotification;
class BeneficiaryInformationController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        if(Auth::guard('beneficiary')->check()){
            return view('client::users.information',['informations'=>OrderInformation::where('beneficiary_id',Auth::guard('beneficiary')->user()->id)->first()]);
        } else{
            return redirect('.login');
        }
    }

    public function sendOrder(Request $request)
    {
        $balanceOrder=OrderInformation::find($request['user_id']);
        if($balanceOrder){
            $balanceOrder1=OrderInformation::where('is_accepted',true)->find($request['user_id']);
            if($balanceOrder1){
                $balanceOrder1->update([
                    'beneficiary_id' => $request['user_id'],
                    'reason' => $request['reason'],
                ]);
                $user = Beneficiary::find(\Auth::guard('beneficiary')->user()->id);
                $Advance['message']="تم إنشاء طلب للحصول على  معلومات عن المبانى  ";
                Notification::send($user, new AdminNotification($Advance));

            }else{
                $balanceOrder->update([
                    'beneficiary_id' => $request['user_id'],
                    'reason' => $request['reason'],
                ]);
                return response()->json(['errors'=>'لم يتم قبول الطلب بعد']);
            }

        }else{
            $balanceOrder=OrderInformation::create([
                'beneficiary_id' => $request['user_id'],
                'reason' => $request['reason'],
            ]);
             $user = Beneficiary::find(\Auth::guard('beneficiary')->user()->id);
                $Advance['message']="تم إنشاء طلب للحصول على  معلومات عن المبانى  ";
                Notification::send($user, new AdminNotification($Advance));
        }

        return response()->json(['success'=>'تم بالنجاح الطلب']);

    }


    public function statement_account(Request $request){
        if(Auth::guard('beneficiary')->check()){
            return view('client::users.statement',['vouchers'=>Voucher::where('voucherable_type','سند داخلى')->where('liable_id',Auth::guard('beneficiary')->user()->id)->orderBy('id', 'DESC')->get()]);
        } else{
            return redirect('.login');
        }

    }
}
