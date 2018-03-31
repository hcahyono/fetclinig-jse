<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use Hash;

class AdminResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    //use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    // protected function broken()
    // {
    //     return Password::broken('admins');
    // }

    /**
     * Menampilkan halaman konfirmasi kode.
     * Menampilkan form input kode konfirmasi untuk reset password admin.
     * Jika request yang diterima cocok dengan kode reset, maka tampilkan halaman reset password
     * Jika tidak cocok kembalikan feedback status kode salah
     * 
     * @return void
     */
    public function kodeConfirm(Request $request)
    {
      $this->validate($request, [
        'kode' => 'required|min:2'
      ]);

      if ($request->kode === "&^m@?h>#C1*r(y%3")
      {
        return view('auth.passwords.admin-reset-form');
      }else {
        return redirect()->back()->with('status', 'data yang anda input tidak cocok dengan dokumen');
      }
    }

    /**
     * Reset password admin.
     * Validasi input request admin 
     * Mencari spesifik admin dengan mencocokan email
     * Jika email ditemukan lakukan update password admin dengan password baru yang di hash
     * Jika update password berhasil admin di arahkan untuk login dan di redirect ke halaman dashboard admin
     * Jika admin gagal diarahkan untuk login, di redirect kembali ke halaman form reset password
     * Jika email tidak ditemukan, diredirect kembali dengan pesan error
     * 
     * @return void
     */
    public function adminUpdate(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required|string',   
      ]);

      if( Admin::where('email', $request->email)->update(['password'  => Hash::make($request->password)]) ) {

        //Mencoba loginkan user, $credentials, $remember
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
          //jika berhasil redirect ke halaman yang dimaksud
          return redirect()->intended(route('admin.dashboard'));
        }

        //jika gagal login, redirect halaman login dengan data form
        return redirect()->back()->withInput($request->only('email', 'remember'));
      }

      return redirect()->back()->with('danger', 'tidak dapat menemukan E-Mail yang dimaksud');

    }

}
