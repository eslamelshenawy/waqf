<?php

namespace Modules\Accounting\Http\Controllers\Cheque;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ChequeController extends Controller
{

    public function index()
    {
        return view('accounting::cheques.index');
    }


    public function create()
    {
        return view('accounting::cheques.create');
    }


    public function store(Request $request)
    {
        dd('Thanks');
    }


    public function show($id)
    {
        return view('accounting::cheques.show');
    }


    public function edit($id)
    {
        return view('accounting::cheques.edit');
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
