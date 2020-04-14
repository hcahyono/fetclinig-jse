<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\OperatorRequest;
use App\Models\Pasien;
use App\Models\Hewan;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');  //user guard
    }

    /**
     * Menampilkan waktu saat ini.
     * Menampilkan waktu untuk wilayah spesifik dengan format tertentu
     *
     * @return Carbon\Carbon
     */
    public function now()
    {
        return Carbon::now('Asia/Jakarta')->format('d/m/Y H:i:s');
    }

    /**
     * Show the application dashboard operator.
     * Menampilkan jumlah pasien dan hewan pada view dashboard.
     *
     * @return \Illuminate\Http\Response
     * @return \App\Models\Pasien
     * @return \App\Models\Hewan
     */
    public function index()
    {
        $pasien = Pasien::all()->count();
      	$peliharaan = Hewan::all()->count();

        return view('admin.pages.Dashboard', ['pasien'=>$pasien, 'peliharaan'=>$peliharaan]);
        // return view('home');   //default view
    }

    /**
     * Menampilkan data akun user yang login pada view akun.
     * Megambil data operator yang sedang login saat ini dan menampilkanya pada view akun
     *
     * @return \Illuminate\Http\Response
     * @return \Auth
     */
    public function akun()
    {
        $akun = Auth::user();
        return view('/admin.pages.Akun', ['akun'=>$akun]);
    }

    /**
     * Ubah password operator yang login dari view akun 
     * Menerima request dari operator untuk ubah password
     * Semua data yang diterima dari inputan operator di validasi pada PasswordRequest
     * Melakukan cek password yang di input operator dengan password yang berada pada database
     * Jika password sama, ganti password operator dengan password baru yang diinputkan oleh operator
     * Hash password baru sebelum di input ke dalam database, lakukan save untuk meng update password
     * Memberikan feedback kepada operator berupa alert
     *
     * @return \Illuminate\Http\Response
     * @return \App\Http\Requests\PasswordRequest;
     * @return \Hash
     */
    public function ubahPassword(PasswordRequest $request)
    {
        if (Hash::check($request->password, Auth::user()->password))
        {
            $request->user()->fill([
                'password' => Hash::make($request->passwordbaru)
            ])->save();

            return redirect()->back()->with('alert.success', 'Password berhasil di update');
        }else
        {
            return redirect()->back()->with('alert.danger', 'Password lama tidak cocok');
        }
    }

    /**
     * Menampilkan halaman update informasi akun operator.
     * Megambil data operator yang sedang login saat ini dan menampilkanya pada view update akun
     *
     * @return \Illuminate\Http\Response
     * @return \Auth
     */
    public function editAkun()
    {
        $akun = Auth::user();
        return view('admin.pages.UpdateAkun', ['akun'=>$akun]);
    }

    /**
     * Update informasi akun operator.
     * Menerima request dari operator,
     * Semua request akan di validasi pada OperatorRequest
     * Update kolom database operator sesuai request yang diterima   
     * Lakukan update data dan jika berhasil mengambalikan feedback sukses, dan jika gagal mengembalikan feedback gagal melalui alert   
     * 
     * @return \Illuminate\Http\Response
     * @return \Auth
     */
    public function updateAkun(OperatorRequest $request)
    {
        $update = $request->user()->fill([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        if($update->save())
        {
            return redirect(route('akun'))->with('alert.success', 'Informasi akun berhasil di update');
        }else
        {
            return redirect()->back()->with('alert.danger', 'Gagal melakukan update informasi akun');
        }

    }
}
