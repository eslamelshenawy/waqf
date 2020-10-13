<?php

namespace Modules\Client\Http\Controllers\User\Beneficiary;

use App\Beneficiary;
use App\Notifications\AdminNotification;
use App\Notifications\BeneficiariesNotification;
use App\Repositories\User\Beneficiary\BeneficiaryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Client\Http\Requests\StoreBeneficiary;
use Notification;
class BeneficiaryController extends Controller
{

    protected $beneficiary;

    public function __construct(BeneficiaryRepositoryInterface $beneficiary)
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:beneficiary')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->beneficiary = $beneficiary;
    }

    public function create()
    {
        $previous = null;
        $current = [
            'name' => __('shared::users.beneficiaries.register'),
            'url' => null
        ];

        bread_crumb_3d($previous, $current);

        return view('client::users.beneficiaries.create');
    }

    public function store(StoreBeneficiary $request)
    {
        $this->beneficiary->create($request->except(['_token']));
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

}
