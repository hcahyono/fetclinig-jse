<?php

namespace App\Http\Controllers\Auth;

use Auth;
// use Illuminate\Http\Request;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';   // dfault /home

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'userLogout']);
    }

    // /**
    //  * Attempt to log the user into the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return bool
    //  */
    // protected function attemptLogin(Request $request)
    // {
    //     return $this->guard()->attempt(
    //       $this->credentials($request), $request->filled('remember')
    //     ) && Auth::guard('api')->attempt(
    //       $this->credentials($request), $request->filled('remember')
    //     );
    // }

    /**
     * Log the user out of the application.
     *
     */
    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
