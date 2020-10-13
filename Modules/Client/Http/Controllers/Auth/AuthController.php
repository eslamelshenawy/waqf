<?php

namespace Modules\Client\Http\Controllers\Auth;

use App\Agency;
use App\Beneficiary;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Modules\Admin\Entities\Administrator;
use Modules\Client\Http\Requests\LoginUser;
use Mail;
use app\Helpers\Helpers;
use Session;
class AuthController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    private $authProvider = 'email';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:beneficiary')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:agency')->except('logout');
    }

    public function showBeforeLoginForm()
    {
        $previous = null;
        $current = [
            'name' => __('client::auth.login'),
            'url' => null
        ];
        bread_crumb_3d($previous,$current);
        return view('client::auth.before_login');
    }

    public function showCodeForm()
    {
//        if(! session()->has('code')){
//            return redirect()->back();
//        }
        $previous = null;
        $current = [
            'name' => __('client::auth.code_for_confirm_login'),
            'url' => null
        ];
        bread_crumb_3d($previous, $current);
        return view('client::auth.code');
    }

    public function showLoginForm()
    {
        $previous = null;
        $current = [
            'name' => __('client::auth.login'),
            'url' => null
        ];
        bread_crumb_3d($previous,$current);
        return view('client::auth.login');
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    public function beforeLogin(Request $request)
    {


//        User::where('identity_number', '')
        $user_mobile = User::where('identity_number', '=', $request->post('username'))->first();
        if($user_mobile == null){
            $user = User::where('email', '=', $request->post('username'))->first();
             \Session::put('username', $request->username);
        }else{
            $request['username'] =$user_mobile->email;
             \Session::put('username', $user_mobile->email);
            $user = $user_mobile;
        }
        
        // $user = User::where('email', '=', $request->post('username'))->first();
        
        // $query = "?pas=".$request->password;
        \Session::put('password', $request->password);
       
        
        
        if($user){
            if($user->is_active){
                if(Hash::check($request->post('password'), $user->password)){
                    if($user->isHasSessionToken() && $user->is_authenticated == '1'){
                        return $this->login($request);
                    }else{
                        $user->setSessionToken();
//                        $user->sendActivationMail();
                        $mobile=$user->mobile;
                        $message=$user->session_token."هذا هو كود التفعيل الخاص بكم";
                        sendSms($mobile,$message);
                        session()->flash('code');
                        return redirect(route('showCodeForm'))->with('status', 'تم ارسال الكود على رقم الجوال الخاص بكم  ');
//                        return back()->withErrors(__('client::auth.messages.errors.not_active_check'));
                    }
                }else{
                    return redirect()->back()->withErrors(__('client::auth.messages.errors.auth_wrong'));
                }
            }else{
                return back()->withErrors(__('client::auth.messages.errors.not_active'));
            }

        }else{
            $beneficiaryMobile = Beneficiary::where('identity_number', '=', $request->post('username'))->first();
            if($beneficiaryMobile == null ){
                $beneficiary = Beneficiary::where('email', '=', $request->post('username'))->first();
                  \Session::put('username', $request->post('username'));
            }else{
                $request['username'] =$beneficiaryMobile->email;
                 $beneficiary = $beneficiaryMobile;
                   \Session::put('username', $beneficiaryMobile->email);
            }
            // $beneficiary = Beneficiary::where('email', '=', $request->post('username'))->first();

            if($beneficiary){
                if($beneficiary->is_active){
                    if(Hash::check($request->post('password'), $beneficiary->password)){
                        if($beneficiary->isHasSessionToken() && $beneficiary->is_authenticated == '1'){
                            return $this->login($request);
                        }else{
                            $beneficiary->setSessionToken();
//                            $beneficiary->sendActivationMail();
                            $mobile=$beneficiary->mobile;
                            $message=$beneficiary->session_token."هذا هو كود التفعيل الخاص بكم";
                            sendSms($mobile,$message);
                            session()->flash('code');
                            return redirect(route('showCodeForm'))->with('status', 'تم ارسال الكود على رقم الجوال الخاص بكم  ');
//                            return back()->withErrors(__('client::auth.messages.errors.not_active_check'));
                        }
                    }else{
                        return redirect()->back()->withErrors(__('client::auth.messages.errors.auth_wrong'));
                    }
                }else{
                    return back()->withErrors(__('client::auth.messages.errors.not_active'));
                }

            }else{

                $agencyMobile = Agency::where('identity_number', '=', $request->post('username'))->first();
            
                if($agencyMobile == null ){
                    $agency = Agency::where('email', '=', $request->post('username'))->first();
                    \Session::put('username', $request->post('username'));
                }else{
                    $request['username'] =$agencyMobile->email;
                    \Session::put('username', $agencyMobile->email);
                    $agency =$agencyMobile;
                }
                // $agencyMobile = Agency::where('email', '=', $request->post('username'))->first();
                // dd($agencyMobile);
                if($agency) {
                    if($agency->is_active){
                        if (Hash::check($request->post('password'), $agency->password)) {
                            if ($agency->isHasSessionToken() && $agency->is_authenticated == '1') {
                                return $this->login($request);
//                                return redirect(route('showLoginForm'));
                            } else {
                                $agency->setSessionToken();
//                                $agency->sendActivationMail();
                                session()->flash('code');
                                $mobile=$agency->mobile;
                                $message=$agency->session_token."هذا هو كود التفعيل الخاص بكم";
                                sendSms($mobile,$message);

                                return redirect(route('showCodeForm'))->with('status', 'تم ارسال الكود على رقم الجوال الخاص بكم  ');
                                return back()->withErrors(__('client::auth.messages.errors.not_active_check'));
                            }
                        }else{
                            return redirect()->back()->withErrors(__('client::auth.messages.errors.auth_wrong'));
                        }
                    }else{
                        return back()->withErrors(__('client::auth.messages.errors.not_active'));
                    }

                }else{
                        $administrator = Administrator::where('email', '=', $request->post('username'))->first();
                    if($administrator){
                        return $this->login($request);
                    }
                }
            }

        }

        return redirect()->back()->withErrors(__('client::auth.messages.errors.auth_wrong'));

    }


    public function checkCode(Request $request)
    {

        $pass= Session::get('password');
        $username= Session::get('username');
        $messages = [
            'code.required' => 'Please input your code sent'
        ];

        $request->validate([
            'code' => 'required|min:4|max:5'
        ], $messages);

        $user = User::where('session_token', '=', $request->post('code'))->first();

$request['password']=$pass;
$request['username']=$username;
        if($user){
            $user->is_authenticated = '1';
            $user->save();
            session()->push('class', 'success');
            // dd($request['password']);
             if ( Auth::guard('web')->attempt($this->changeAuthProvider($request)) ) {
            if(Auth::guard('web')->user()->is_active != 1) {
                $request->session()->flush();
                return back()->withErrors(__('client.auth.messages.errors.not_active'));

            }elseif(! Auth::guard('web')->user()->isAuthenticated()) {
                $request->session()->flush();
                return redirect(route('showCodeForm'));
            }else{
                return redirect(url('/'));
            }
        }
            // return redirect(route('showLoginForm'))->with('status', 'تم التفعيل بالنجاح يرجى تسجيل الدخول ');
//            return $this->showLoginForm();
        }else{
            $beneficiary = Beneficiary::where('session_token', '=', $request->post('code'))->first();
            if($beneficiary){
                $beneficiary->is_authenticated = '1';
                $beneficiary->save();
                session()->push('class', 'success');
                if( Auth::guard('beneficiary')->attempt($this->changeAuthProvider($request)) ) {
            if(Auth::guard('beneficiary')->user()->is_active != 1){
                $request->session()->flush();
                return back()->withErrors(__('client::auth.messages.errors.not_active'));
            }elseif(! Auth::guard('beneficiary')->user()->isAuthenticated()) {
                $request->session()->flush();
                return redirect(route('showCodeForm'));
            }
            else{
                return redirect(url('/'));
            }

        }
                // return redirect(route('showLoginForm'))->with('status', 'تم التفعيل بالنجاح يرجى تسجيل الدخول ');
//                return $this->showLoginForm();
            }else{
                
               
                $agency = Agency::where('session_token', '=', $request->post('code'))->first();
                //  dd($agency,$request->all());
                if($agency) {
                    $agency->is_authenticated = '1';
                    $agency->save();
                    session()->push('class', 'success');
                    if( Auth::guard('agency')->attempt($this->changeAuthProvider($request)) ) {
//            dd(Auth::guard('agency')->user()->is_active != 1);
            if(Auth::guard('agency')->user()->is_active != 1){
                $request->session()->flush();
                return back()->withErrors(__('client::auth.messages.errors.not_active'));
            }elseif(! Auth::guard('agency')->user()->isAuthenticated()) {
                $request->session()->flush();
                return redirect(route('showCodeForm'));
            }
            else{
                return redirect(url('/'));
            }
        }
                    // return redirect(route('showLoginForm'))->with('status', 'تم التفعيل بالنجاح يرجى تسجيل الدخول ');
                }
            }
        }

        return back()->withErrors(__('client::auth.messages.errors.invalid_code'));
    }



    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if ( Auth::guard('web')->attempt($this->changeAuthProvider($request)) ) {
            if(Auth::guard('web')->user()->is_active != 1) {
                $request->session()->flush();
                return back()->withErrors(__('client.auth.messages.errors.not_active'));

            }elseif(! Auth::guard('web')->user()->isAuthenticated()) {
                $request->session()->flush();
                return redirect(route('showCodeForm'));
            }else{
                return redirect(url('/'));
            }
        } elseif( Auth::guard('beneficiary')->attempt($this->changeAuthProvider($request)) ) {
            if(Auth::guard('beneficiary')->user()->is_active != 1){
                $request->session()->flush();
                return back()->withErrors(__('client::auth.messages.errors.not_active'));
            }elseif(! Auth::guard('beneficiary')->user()->isAuthenticated()) {
                $request->session()->flush();
                return redirect(route('showCodeForm'));
            }
            else{
                return redirect(url('/'));
            }

        } elseif( Auth::guard('agency')->attempt($this->changeAuthProvider($request)) ) {
//            dd(Auth::guard('agency')->user()->is_active != 1);
            if(Auth::guard('agency')->user()->is_active != 1){
                $request->session()->flush();
                return back()->withErrors(__('client::auth.messages.errors.not_active'));
            }elseif(! Auth::guard('agency')->user()->isAuthenticated()) {
                $request->session()->flush();
                return redirect(route('showCodeForm'));
            }
            else{
                return redirect(url('/'));
            }
        }elseif( Auth::guard('admin')->attempt(
            ['email' => $request->post('username'), 'password' => $request->post('password')]) ){
            return redirect(url('en/dashboard/root'));
            return redirect(route('Admin::root'));
        }else{
            return redirect()->back()->withErrors(__('client::auth.messages.errors.auth_wrong'));
//            return redirect()->back()->withInput($request->only('email', 'remember'));
        }

    }

    public function logout(Request $request)
    {
        $this->guard();
//        if($this->getGuard() != 'admin'){
//            Auth::guard($this->getGuard())->user()->clearSessionToken();
//        }
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
        return redirect('/');

//        $request->session()->flush();
//        $request->session()->regenerate();

//        return $this->loggedOut($request) ?: redirect('/');
    }

    private function changeAuthProvider(Request $request)
    {
        if($request->has('username')){
            $request->merge([$this->authProvider => $request->post('username')]);
        }

        return $request->only($this->authProvider, 'password', 'remember');
    }

    public function username()
    {
        return 'username';
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    function getGuard(){
        if(Auth::guard('web')->check())
        {return "web";}
        elseif(Auth::guard('admin')->check())
        {return "admin";}
        elseif(Auth::guard('beneficiary')->check())
        {return "beneficiary";}
        elseif(Auth::guard('agency')->check())
        {return "agency";}
        return null;
    }

//    protected function loggedOut(Request $request)
//    {
//        return redirect(url('/'));
//    }

    protected function guard()
    {
        return Auth::guard($this->getGuard());
    }

}
