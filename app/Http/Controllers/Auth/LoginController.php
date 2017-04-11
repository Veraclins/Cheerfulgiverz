<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    
    protected function authenticated($request,$user){        
        
        
        if($user->activation_status == 0){
            $request->session()->flush();
            return redirect('user-registration-success')->with('message','Check your mail to activate your account.');
            
        }
        
        if($user->role_id == '1'){
            return redirect()->intended('admin/view-donation'); //redirect to admin panel
        }
        
        if($user->role_id == '2'){
            return redirect()->intended('dashboard'); //redirect to admin panel
        }

        return redirect()->intended('/'); //redirect to standard user homepage
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
