<?php

namespace Modules\Client\Http\Controllers\User\Agency;

use App\Repositories\User\Agency\AgencyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Client\Http\Requests\StoreAgency;

class AgencyController extends Controller
{

    protected $agency;

    public function __construct(AgencyRepositoryInterface $agency)
    {
        $this->agency = $agency;
    }

    public function create()
    {
        $previous = null;
        $current = [
            'name' => __('shared::users.agencies.register'),
            'url' => null
        ];
        bread_crumb_3d($previous,$current);
        return view('client::users.agencies.create');
    }

    public function store(StoreAgency $request)
    {
        $this->agency->create($request->except(['_token']));
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
