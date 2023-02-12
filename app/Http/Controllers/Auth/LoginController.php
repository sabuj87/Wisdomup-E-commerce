<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\ConfirmRegNotification;
use App\Models\User;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request){

        $checkout=$request->checkout;

      if(!is_null($checkout)){
        return view('auth.login',compact('checkout'));



      }else{
        return view('auth.login');
      }

    

    }


    public function login(Request $request){
  
          
        $this->validate($request ,[
              
            'email' => 'required | email',
            'password'=> 'required | string'
        


        ]);

        $user = User :: where('email',$request->email)->first();

        $checkout=$request->checkout;


        if(!is_null($user)){

            if($user->status == 1){
           
                if(Auth::guard('web')->attempt(['email' => $request->email,'password'=>$request->password],$request->filled('remember'))){
                  

                    if(!is_null($checkout)){
                        return redirect()->intended(route('checkouts'));

                    }
                    else{
                        return redirect()->intended(route('home'));
                     

                    }
                 
                  
                     
    
    
                }else{

                    return back();
                }
    
            }else{
                        
                   $user ->notify(new ConfirmRegNotification($user,$user->remember_token));
                    flash(' Your email address not verified . A New confirmation email has sent to you..Please check and verify')->success();
    
                    return redirect()->intended(route('login'));
                
    
            }



        }else{
            return back();
        }
        


    }
}
