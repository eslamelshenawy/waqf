<?php

namespace Modules\Client\Http\Controllers\User\Beneficiary;

use App\Advance;
use App\orderBalance;
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
use \PDF;
use Dompdf\Dompdf;
use Notification;
use App\Beneficiary;
use App\Notifications\AdminNotification;

class BeneficiaryBalanceController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        if(Auth::guard('beneficiary')->check()){
//            $pdf = \PDF::loadView('client::users.result');
//            $pdf->save(public_path('pdf/').'BalanceSheet.pdf');
//            $path=public_path('pdf/').'BalanceSheet.pdf';
            return view('client::users.balance',['balances'=>orderBalance::where('beneficiary_id',Auth::guard('beneficiary')->user()->id)->first()]);
        } else{
            return redirect('.login');
        }
    }

    public function getPDF(){
//        $path = public_path('pdf/');
        $pdf = \PDF::loadView('client::users.result');
       $pdf->save(public_path('pdf/').'BalanceSheet.pdf');
      $path=public_path('pdf/').'BalanceSheet.pdf';
        return view('client::users.balance',['balance'=>orderBalance::where('beneficiary_id',Auth::guard('beneficiary')->user()->id)->get(),"path"=>$path]);

        return view('client::users.result',['path'=>$path]);
        return PDF::loadFile(public_path('pdf/').'1'.'_filename.pdf')->stream('download.pdf');
        return $pdf->stream('client::users.result');

    }

    public function sendOrder(Request $request)
    {
        $balanceOrder=orderBalance::find($request['user_id']);
        if($balanceOrder){
            $balanceOrder1=orderBalance::where('is_accepted',true)->find($request['user_id']);
            if($balanceOrder1){
                $balanceOrder1->update([
                    'beneficiary_id' => $request['user_id'],
                    'reason' => $request['reason'],
                ]);
                
                 $user = Beneficiary::find(\Auth::guard('beneficiary')->user()->id);
                $Advance['message']="تم إنشاء طلب للحصول على الميزانيه  ";
                Notification::send($user, new AdminNotification($Advance));

            }else{
                $balanceOrder->update([
                    'beneficiary_id' => $request['user_id'],
                    'reason' => $request['reason'],
                ]);
                return response()->json(['errors'=>'لم يتم قبول الطلب بعد']);
            }

        }else{
            $balanceOrder=orderBalance::create([
                'beneficiary_id' => $request['user_id'],
                'reason' => $request['reason'],
            ]);
             $user = Beneficiary::find(\Auth::guard('beneficiary')->user()->id);
                $Advance['message']="تم إنشاء طلب للحصول على الميزانيه  ";
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
