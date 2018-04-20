<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\PasienRequest;

use App\Models\Pasien;
use App\Models\Hewan;
use App\Models\Hitung;
use Carbon\Carbon;
use Auth;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //user guard
    }

    public function now()
    {
        return Carbon::now('Asia/Jakarta')->format('d/m/Y H:i:s');
    }

    public function index()
    {
        $pasiens = Pasien::orderBy('id', 'desc')->get();
        $hewans = Hewan::orderBy('id', 'desc')->get();
        $total = 0;

        foreach ($hewans as $hewan) {
          if (count($hewan->pasien()->get()) < 1 ) {
            //hitung total hewan yang status pemiliknya terdelete
            $total = $total + count($hewan);
          }
        }
      	return view('/admin.pages.SemuaPasien', [
          'pasiens' => $pasiens,
          'hewans'=>$hewans,
          'pemilikTerdelete'=>$total
        ]);
    }

    public function show($id)
    {
      	$pasien = Pasien::findOrFail($id);
      	return view('/admin.pages.Peliharaan', ['pasien' => $pasien, 'now'=>$this->now()]);
    }

    public function create()
    {
        return view('/admin.pages.RegistrasiPasien', ['now'=>$this->now()]);
    }

    public function store(RegisterRequest $request)
    {
        $user = auth()->user();

        $pasien = new Pasien;
        $pasien->kode       = $this->getKodePasien();
        $pasien->nama       = $request->nama;
        $pasien->gender     = $request->gender;
        $pasien->telepon    = $request->telepon;
        $pasien->handphone  = $request->handphone;
        $pasien->alamat     = $request->alamat;
        $pasien->created_by = $user->name;
        $pasien->updated_by = $user->name;

        if( $pasien->save() )
        {
          $hewan = new Hewan;
          $hewan->kode      = $this->kodeHewan();
          $hewan->nama      = $request->namahewan;
          $hewan->jenis     = $request->jenishewan;
          $hewan->gender    = $request->genderhewan;
          $hewan->ras       = $request->rashewan;
          $hewan->warna     = $request->warnabulu;
          $hewan->created_by     = $user->name;
          $hewan->updated_by     = $user->name;

          /*
          * insert id tabel parent(model tabel pasien), ke dalam tabel child(model tabel hewan)
          * dengan relasi one to many (one tabel pasien hasMany data di tabel hewan)
          * melalui fungsi hasMany hewan() yang ada pada model pasien
          * dan belongsTo pasien() yang ada pada model hewan
          */
          $hewan->pasien()->associate($pasien);

          if( $hewan->save() )
          {
            //update nomer urut untuk kode pasien di tabel hitung
            $this->setNomerPasien();
          }
        }

        return redirect('/pasien');
    }

    /*
    * Create kode hewan
    */
    public function kodeHewan()
    {
        return $this->getKodePasien().'.1';
    }

    /*
    * membuat sebuah fungsi untuk mengambil nomer pada tabel hitung
    * yang akan digunakan untuk membuat kode pasien, kode terdiri dari
    * tanggal saat pasien di daftarkan dan nomor urut pendaftaran pasien
    */
    public function getKodePasien()
    {
        //ambil nomer dari tabel hitung yang namanya pasien
        $getKode = Hitung::where('nama', 'pasien')->firstOrFail();
        $dateNow = date('Ymd');
        $kode = $dateNow.$getKode->nomer;
        return (int)$kode;
    }

    /*
    * membuat fungsi untuk melakukan update nilai pada kolom nomer tabel hitung
    * fungsi ini di panggil jika pendaftaran data pasien berhasil dilakukan
    */
    public function setNomerPasien()
    {
        //ambil data yang isi kolom nama = pasien dari tabel hitung
        $getKode = Hitung::where('nama', 'pasien')->firstOrFail();

        //update kolom nomer yang isi kolom nama = pasien, di tabel hitung
        Hitung::where('nama', 'pasien')
                ->update(['nomer' => $getKode->nomer+1]);
    }

    public function edit($id)
    {
      	$pasien = Pasien::findOrFail($id);
      	return view('/admin.pages.EditPasien', ['pasien' => $pasien]);
    }

    public function update(PasienRequest $request, $id)
    {
        $user = auth()->user();
      	Pasien::find($id)->update([
      		'nama'        => $request->nama,
      		'gender'      => $request->gender,
      		'telepon'     => $request->telepon,
      		'handphone'   => $request->handphone,
          'alamat'      => $request->alamat,
      		'updated_by'  => $user->name
      	]);

      	return redirect('pasien/' . $id);
    }

    public function delete($pasien)
    {
        $pasien = Pasien::findOrFail($pasien);
        $pasien->delete();
        return redirect('pasien');
    }
}
