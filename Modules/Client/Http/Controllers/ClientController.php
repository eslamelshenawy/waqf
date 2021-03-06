<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('client::index');
    }

    public function allNotification()
    {
        \Session::put('previous', ['name'=>'كل الاشعارات','url'=>"#"]);
        \Session::put('previous', ['name'=>'كل الاشعارات','url'=>"#"]);

        return view('client::allNotification');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('client::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('client::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function setting()
    {
        return view('client::users.setting');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function setting_store(Request $request)
    {
        // dd($request->all());
        if(\Auth::guard('web')->user()){
        $user=\Auth::guard('web')->user();
        $user->email=$request->email;
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->save();
        }
         if(\Auth::guard('beneficiary')->user()){
             $user=\Auth::guard('beneficiary')->user();
        $user->email=$request->email;
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->save();
        }
         if(\Auth::guard('agency')->user()){
             $user=\Auth::guard('agency')->user();
        $user->email=$request->email;
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->save();
        }
        
       
        return redirect()->back()->with('success', 'Success Update!');

    }
}
