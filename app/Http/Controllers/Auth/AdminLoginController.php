<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);   //spesifik login guest as admin guest
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //validasi data form
        $this->validate($request, [
          'email'   => 'required|email',
          'password'  => 'required|min:6'
        ]);

        //Mencoba loginkan user, $credentials, $remember
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
          //jika berhasil redirect ke halaman yang dimaksud
          return redirect()->intended(route('admin.dashboard'));
        }

        //jika gagal, redirect halaman login dengan data form
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
