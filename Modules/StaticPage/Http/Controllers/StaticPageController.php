<?php

namespace Modules\StaticPage\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class StaticPageController extends Controller
{

    public function index()
    {
        return view('staticpage::index');
    }

    public function create()
    {
        return view('staticpage::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('staticpage::show');
    }

    public function edit($id)
    {
        return view('staticpage::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


    /*
     * */
    public function contact_us(Request $request){
        
        // dd($request->all());
        $validator = \Validator::make($request->all(), [
            'title_contact' => 'required',
            'message_contact' => 'required',
            'email_contact' => 'required|email',
           
        ]);
        
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
         $contact_us =  ContactUs::create([
            'title' => $request['title_contact'],
            'email' => $request['email_contact'],
            'message' => $request['message_contact'],
        ]);
        
        
         

		  return response()->json(['success' => 'تم الارسال بالنجاح ', 'status' => 'true']);
        
       
        }
        
      
    }
}
