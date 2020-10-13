<?php

namespace Modules\Admin\Http\Controllers\Beneficiaries;

use App\Advance;
use App\Beneficiary;
use App\BeneficiaryBalance;
use App\EstateOrder;
use App\Notifications\BeneficiariesNotification;
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
use Notification;
class OrderBalanceController extends Controller
{
    protected $advance;


    public function index()
    {
        bread_crumb('Reservations');
        return view('admin::users.orderBalance.index', ['orderBalance' => orderBalance::with('madeBy')->get()]);
    }


    public function destroy($id)
    {
        $this->building->trashing($id);
        return back();
    }

    public function changeStatus(Request $request)
    {
        $orderBalance=orderBalance::where("beneficiary_id",$request->id)->first();
        $orderBalanceStatus = $orderBalance->update([
            'is_accepted' => isset($request['is_accepted']) ? $request['is_accepted'] : 0,
        ]);
        if(isset($request['is_accepted']) == true){
            $user = Beneficiary::find($request->id);
            $orderBalance['message']="تمت الموافقه على الطلب المقدم للاداره للحصول على الميزانيه ";
            Notification::send($user, new BeneficiariesNotification($orderBalance));
        }
        return redirect()->back()->with('success', 'Success ');
    }

      public function changeStatusInformation(Request $request)
    {
        $orderBalance=orderBalance::where("beneficiary_id",$request->id)->first();
        $orderBalanceStatus = $orderBalance->update([
            'is_accepted' => isset($request['is_accepted']) ? $request['is_accepted'] : 0,
        ]);

        if(isset($request['is_accepted']) == true){
            $user = Beneficiary::find($request->id);
            $orderBalance['message']="تمت الموافقه على الطلب المقدم للاداره للحصول على معلومات عن المبانى  ";
            Notification::send($user, new BeneficiariesNotification($orderBalance));
        }
        return redirect()->back()->with('success', 'Success ');
    }

    public function commint(Request $request)
    {
        $Advance=Advance::find($request->data_id);
        $Advance_status = $Advance->update([
            'admin_commit' => $request['admin_commit'],
        ]);
        return \response()->json(['success'=>'تم الأرسال بالنجاح']);
    }
    public function change(Request $request)
    {
        $Advance=Advance::find($request->data_id);
        $Advance_status = $Advance->update([
            'date_pay' => $request['date_advance'],
        ]);
        return \response()->json(['success'=>'تم الأرسال بالنجاح']);
    }


    public function date_done(Request $request)
    {
        $date_advance=\Carbon\Carbon::parse($request->date_advance);
        $date_advance->format('Y-m-d');
//        dd($request->all());
        $Advance=Advance::find($request->data_id);

//            $BeneficiaryBalance = BeneficiaryBalance::where('beneficiary_id',$Advance->beneficiary_id)->first();
//                $last_crdit=$BeneficiaryBalance->credit - $Advance->amount;
//                $last_debit=$BeneficiaryBalance->debit - $Advance->amount;
//                $BeneficiaryBalance->update([
//                    'credit' =>$last_crdit ,
//                    'debit' => $last_debit,
//                ]);
        $Advance_status = $Advance->update([
            'date_done' => $date_advance,
            'is_done' => 1,
        ]);
        return \response()->json(['success'=>'تم الأرسال بالنجاح']);
    }


}
