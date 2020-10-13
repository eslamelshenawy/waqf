<?php

namespace Modules\Client\Http\Controllers\User\Tenant;

use App\Notifications\AdminNotification;
use App\Repositories\User\Tenant\TenantRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Client\Http\Requests\StoreTenant;
use Notification;

class TenantController extends Controller
{

    protected $tenant;

    public function __construct(TenantRepositoryInterface $tenant)
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:beneficiary')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->tenant = $tenant;
    }

    public function create()
    {
        $previous = null;
        $current = [
            'name' => __('shared::users.tenants.register'),
            'url' => null
        ];
        bread_crumb_3d($previous, $current);
        return view('client::users.tenants.create');
    }


    public function store(StoreTenant $request)
    {

        $data=$this->tenant->create($request->except(['_token']));
        $user = User::find($data->id);
        $orderBalance['message']="تم تسجيل مستاجر جديد ";
        $orderBalance['id']=$data->id;
        Notification::send($user, new AdminNotification($orderBalance));
        session()->flash('success');
        session()->flash('welcome');
        return redirect(url('pages/welcome'));
    }

    public function show($id)
    {
        return view('client::show');
    }


    public function edit($id)
    {
        return view('client::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
