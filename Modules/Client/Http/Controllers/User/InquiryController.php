<?php

namespace Modules\Client\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Client\Http\Requests\StoreTenant;
use App\Inquiry;
class InquiryController extends Controller
{


    public function add_inquiry(Request $request)
    {
           $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'inquiry' => 'required',
           
        ]);
        
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
        $inquiry= new  Inquiry;
        $inquiry->name = $request->name;
        $inquiry->mobile = $request->phone;
        $inquiry->inquiry = $request->inquiry;
        $inquiry->save();
		  return response()->json(['success' => 'تم الارسال بالنجاح ', 'status' => 'true']);
        
        }
    }


}
