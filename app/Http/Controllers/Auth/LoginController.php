<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function otpVerifyForm(Request $request){
        return view('auth.login_otp_verify');
    }

    public function otpSend(Request $request){
        $this->validate($request, [
            'nid' => 'required|exists:users,nid'
        ]);
        $pin = rand(1000,9999);
        $user = User::where('nid',$request->nid)->first();
        $user->otp_pin = $pin;
        $user->save();

        try{
            $soapClient = new \SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
            $paramArray = array(
            'userName' => "01911666556",
            'userPassword' => "776674cb3f",
            'mobileNumber' => $user->telephone,
            'smsText' => "Your one time password is ".$pin,
            'type' => "TEXT",
            'maskName' => '',
            'campaignName' => '',
            );
            $value = $soapClient->__call("OneToOne", array($paramArray));
            //echo $value->OneToOneResult;
        } catch (\Exception $e) {
            //echo $e->getMessage();
        }
        return redirect( route('otp.verify', ['nid'=>$request->nid]) )->with('otpresent', 'please check your phone for the login pin');
    }
    
    public function login(Request $request)
    {
        $user = User::where('nid',$request->nid)->first();
        
        if(Auth::login($user,true)){
            return redirect()->intended(route('user'));
        }
        return redirect(route('login'))->withInput($request->only('nid'));
    }
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'nid' => 'required|exists:users,nid',
            'pin' => "required|exists:users,otp_pin,nid,$request->nid",            
        ],[
            'pin.exists'=> 'please enter your valid pin'
        ]);
    }


    public function username()
    {
        return 'nid';
    }
}
