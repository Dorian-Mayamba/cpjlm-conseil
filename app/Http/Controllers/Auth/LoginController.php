<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    /**
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
     public function login(Request $request){
        $email = $request->email;
        $type = $this->getTypeFromEmail($email);
        if(($this->userInDb($request,$email))&&($type=="admin"||$type=="user")){
           return redirect("/");
        }
        Session::flash('error', 'password or username incorrect');
        return redirect('/login');
     }

     /**
      * @param Illuminate\Http\Request $request
      * @return bool
      */
      public function userInDb($request,$email){
        $user = User::where('email', $email)->first();
        if($user!=null && Hash::check($request->password,$user->password)){
            $this->guard()->login($user);
            return true;
        }else{
            return false;
        }
      }
      /**
       * @param string $email
       * @return string
       */
      public function getTypeFromEmail($email){
            if(self::isAdminEmail($email)){
                return 'admin';
            }else{
                return 'user';
            }
      }

      public static function isAdminEmail($email){
          return strpos($email, '.cpjlm-conseil@admin.com')!==false || strpos($email, '@cpjlm-conseil.com')!==false;
      }
}
