<?php

namespace Modules\Admin\Http\Controllers\Beneficiaries;

use App\Advance;
use App\Beneficiary;
use App\BeneficiaryBalance;
use App\EstateOrder;
use App\Notifications\BeneficiariesNotification;
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
class AdvancesController extends Controller
{
    protected $advance;

    public function __construct(AdvanceRepositoryInterface $advance)
    {
        $this->advance = $advance;
    }

    public function index()
    {
        bread_crumb('Reservations');
        return view('admin::users.Advance.index', ['Advance' => $this->advance->all()]);
    }



    public function destroy($id)
    {
        $this->building->trashing($id);
        return back();
    }

    public function change_accept(Request $request)
    {
        $Advance=Advance::find($request->id);
        $Advance_status = $Advance->update([
            'is_accepted' => $request['is_accepted'],
        ]);
        if($request['is_accepted'] == 1){
            $user = Beneficiary::find($Advance->beneficiary_id);
            $orderBalance['message']="تمت الموافقه على الطلب المقدم للاداره للحصول على سلفه ";
            Notification::send($user, new BeneficiariesNotification($orderBalance));

        }
        if($request['is_accepted'] == 2){
            $user = Beneficiary::find($Advance->beneficiary_id);
            $orderBalance['message']=" لم تتم الموافقه على الطلب المقدم للاداره للحصول على سلفه ";
            Notification::send($user, new BeneficiariesNotification($orderBalance));

        }

        return redirect()->back()->with('success', 'Success ');
    }

    public function commint(Request $request)
    {
        // dd($request->all());
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
        return \response()->json(['success'=>'تم التعديل بالنجاح']);
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
