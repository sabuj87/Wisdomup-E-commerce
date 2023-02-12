<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ConfirmRegNotification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {   

        $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['nullable', 'string', 'max:15'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
               
    

           
            ]
    
    
    );

        $user = User::create([
            
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->first_name,
            'email' => $request->email,
            'ip_address' => request()->ip(),
            'remember_token'=> Str::random(40),
            'status' =>0,
            'password' => Hash::make($request->password),
        ]);
        $user ->notify(new ConfirmRegNotification($user,$user->remember_token));


        flash('A  confirmation email has sent to you..Please check and verify')->success();

        return  redirect()->route('home');
    }
}
