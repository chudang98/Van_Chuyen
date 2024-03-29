<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpFoundation\Request;
use DB;

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
            'firstname' => ['bail','required', 'string', 'max:20'],
            'lastname' => ['bail','required', 'string', 'max:20'],
            'email' => ['bail','required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['bail','required', 'string', 'confirmed'],
            'phone' => ['bail','required', 'max:12', 'unique:users,phone'],
            'date' => ['bail','required', 'date_format:Y-m-d', 'before:today'],
            'commune' =>['bail','required'],
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
        return User::create([
            'name' => $data['firstname'] ." " .$data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birth' => $data['date'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'communes_id' => $data['commune'],
        ]);
    }

    public function showRegistrationForm()
    {
        $districts = DB::table('districts')->get();
        return view('auth.register')
            ->with('districts', $districts);
    }

    
}
