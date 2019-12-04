<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\BirthCertificate;
use App\Rules\CheckBidForRegister;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'bid' => ['required', 'integer', 'unique:users,bid', new CheckBidForRegister],
            'telephone' => ['required', 'string', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $certificate = BirthCertificate::where('bid',$data['bid'])->first();
        return User::create([
            'name' => $data['name'],
            'bid' => $data['bid'],
            'nid' => rand(1111111111, 9999999999),
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
            'division_id' => $certificate->division_id,
            'district_id' => $certificate->district_id,
            'upazilla_id' => $certificate->upazilla_id,
            'union_id' => $certificate->union_id,
            'rmo_id' => $certificate->rmo_id,
            'constituencies_id' => $certificate->constituencies_id,
        ]);
    }


}
