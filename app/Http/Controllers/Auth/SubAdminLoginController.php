<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SubAdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:subAdmin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.subAdmin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::guard('subAdmin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('subAdmin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('subAdmin')->logout();
        return redirect('/');
    }
}
