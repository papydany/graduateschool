<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    protected $redirectTo = '/backend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

       public function login(Request $request)

    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
            ]);
//dd($request->input('password'));
if (auth()->attempt(array('email' => $request->input('email'), 'password' => $request->input('password'))))
 {

    if(auth()->user()->status == 1)
    {
    

     return redirect('/backend');
    }else{ 
        Auth::logout();
       Session::flash('status',"Your account has been deactivated.");
      
            return back(); 
    }
   }else{
            Session::flash('status',"please check your username and password.");
            return back();

        }

   
}
  public function logout(Request $request)
{
    
        Auth::logout();
return redirect('/backend');
}
}
