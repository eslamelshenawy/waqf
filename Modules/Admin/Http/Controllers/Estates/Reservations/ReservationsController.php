<?php

namespace Modules\Admin\Http\Controllers\Estates\Reservations;

use App\Beneficiary;
use App\EstateOrder;
use App\Notifications\BeneficiariesNotification;
use App\Notifications\TenantNotification;
use App\Repositories\Estate\Reservations\ReservationsRepositoryInterface;
use App\Tenant;
use App\TenantBalance;
use App\TenantRent;
use App\User;
use Illuminate\Http\Request;
use Modules\Accounting\Entities\Bank;
use Modules\Accounting\Entities\Fund;
use Modules\Admin\Http\Controllers\Estates\EstateController;
use Modules\Admin\Http\Requests\StoreBuilding;
use Modules\Admin\Http\Requests\UpdateBuilding;
use Notification;
class ReservationsController extends EstateController
{
    protected $reservate;

    public function __construct(ReservationsRepositoryInterface $reservate)
    {
        $this->reservate = $reservate;
    }

    public function index()
    {
        bread_crumb('Reservations');
        return view('admin::estates.Reservations.index', ['reservate' => $this->reservate->all()]);
    }

    public function create()
    {
        bread_crumb('Building | New');
        return view('admin::estates.Reservations.create');
    }

    public function store(StoreBuilding $request)
    {
        $request->validated();
        $this->building->create($request->except(['_token']));
        return redirect()->route('Admin::buildings.index');
    }

    public function edit($id)
    {
        bread_crumb('Building | Edit');
        return view('admin::estates.Reservations.edit', ['building' => $this->building->getWithImages($id)]);
    }

    public function update($id, UpdateBuilding $request)
    {
        $request->validated();
        $this->building->update($id, $request->except(['_token']));
        return redirect()->route('Admin::buildings.index');
    }

    public function destroy($id)
    {
        $this->building->trashing($id);
        return back();
    }

    public function change_accept(Request $request)
    {
        if(isset($request->is_accepted ) == 1 ){
           $TenantRent= TenantRent::create([
               'tenant_id' => $request['tenant_id'],
               'estate_id' => $request['id'],
           ]);
            $user = User::find($request->tenant_id);
            $orderBalance['message']="تمت الموافقه على الطلب المقدم للاداره للحصول على العقار  ";
            Notification::send($user, new TenantNotification($orderBalance));

            $reservation=EstateOrder::where('estate_id',$request->id)->first();
            $reservation_status = $reservation->update([
                'is_accepted' => $request['is_accepted'],
            ]);
                
                // dd($reservation);
            // $TenantBalance = TenantBalance::where('tenant_id',$request['tenant_id'])->first();
            // if(!$TenantBalance){

            //     TenantBalance::create([
            //         'tenant_id' => $request['tenant_id'],
            //         'debit' => $reservation->amount,
            //         'credit' => 0,
            //         'description' => $reservation->description,
            //     ]);
            // }else{

            //     $TenantBalance->update([
            //         'debit' => $reservation->amount,
            //         'credit' => 0,
            //         'description' => $reservation->description,
            //     ]);

            // }

        }else{
            // dd('dd');
         $check_tenant=TenantRent::where(['tenant_id'=>$request['tenant_id'],'estate_id'=>$request['id']])->first();
         if($check_tenant){
             $check_tenant->delete();
         }
            $user = User::find($request->tenant_id);
            $orderBalance['message']="لم تتم الموافقه على الطلب المقدم للاداره للحصول على العقار  ";
            Notification::send($user, new TenantNotification($orderBalance));

            $reservation=EstateOrder::find($request->id);
            $reservation_status = $reservation->update([
                'is_accepted' => isset($request->is_accepted ) ? $request['is_accepted'] : 0,
            ]);

        }

        return redirect()->back()->with('success', 'Success ');
    }



}
