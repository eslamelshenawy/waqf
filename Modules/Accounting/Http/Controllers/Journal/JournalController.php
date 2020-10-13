<?php

namespace Modules\Accounting\Http\Controllers\Journal;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounting\Entities\Journal;

class JournalController extends Controller
{

    public function index()
    {
        bread_crumb('قيود اليوميه');
        $journals = Journal::with('account')->get();
        return view('accounting::journals.index', compact('journals'));
    }


    public function create()
    {
        return view('accounting::journals.create');
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('accounting::show');
    }


    public function edit($id)
    {
        return view('accounting::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }
    
     public function create_journal(Request $request)
    {
       
        $sumdebit=0;
        $sumcredit=0;
        foreach($request->debit as $deb){
            $sumdebit+=$deb;
        }
        foreach($request->credit as $cred){
            $sumcredit+=$cred;
        }
        
        if($sumdebit != $sumcredit){
            
              $request->validate([
                  'date_at' => 'required',
             'message' => 'required',
                'messageError' => 'required',
            //  "account_id[0]"    => "required",
            //  "account_id.*"  => "required",
            //  "debit[0]"    => "required",
            //  "debit.*"  => "required",
            //  "credit[0]"    => "required",
            //  "credit.*"  => "required",

        ]);
            
            
        }else{
            
              $request->validate([
                          'date_at' => 'required',
            'message' => 'required',
            //  "account_id[0]"    => "required",
            //  "account_id.*"  => "required",
            //  "debit[0]"    => "required",
            //  "debit.*"  => "required",
            //  "credit[0]"    => "required",
            //  "credit.*"  => "required",

        ]);
        
        }
        //  dd($request->all(),$sumdebit);
         
        $count = Journal::count();
        foreach ($request->account_id as $key=> $account_id){
            $Journal=new Journal;
            $Journal->number   =++$count;
            $Journal->details   =$request->message;
            $Journal->date_at   =$request->date_at;
            $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
            $Journal->journalable_id   =$account_id;
            $Journal->debit   =$request->debit[$key] == null ? 0 : $request->debit[$key];
            $Journal->credit   =$request->credit[$key]  == null ? 0 : $request->credit[$key];
            $Journal->group_id   =1;
            $Journal->save();
        }
        
         return redirect('en/accounting/accounts/journals')->with('success', 'تم الاضافة بالنجاح ');
        
    }


    public function destroy($id)
    {
        //
    }
}
