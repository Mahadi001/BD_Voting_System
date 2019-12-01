<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    
    public function login(Request $request)
    {
        $this->validate($request, [
            'nid' => 'required',
            'password' => 'required|min:8',
        ]);

        if(Auth::guard('web')->attempt(['nid' => $request->nid, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('user'));
        }
        return redirect()->back()->withInput($request->only('nid', 'remember'));
    }
    public function username()
    {
        return 'nid';
    }
}
