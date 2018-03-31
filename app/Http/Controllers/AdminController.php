<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PanduanRequest;
use App\Models\Pasien;
use App\Models\Hewan;
use App\Models\Medis;
use App\Models\Panduan;
Use App\User;
use Hash;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');  //admin guard
    }

    /**
     * Show the application dashboard (admin dashboard).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    /**
     * Menampilkan data operator full dengan yang ter delete dari User model
     *
     * @return \App\User
     */
    public function operator()
    {
        $users = User::orderBy('id', 'desc')->withTrashed()->paginate(10);
        return view('/manage.operator', ['users'=>$users]);
    }

    /**
     * Menampilkan kelola data operator
     * Memberi status aktif dan non aktif pada akun operator & menampilkanya pada view
     * Apabila kolom deleted_at null atau kasong, status akun aktif, 
     * jika kolom deleted_at tidak null, status akun non-aktif 
     *
     * @return \App\User
     */
    public function kelolaOperator($id)
    {
        $operator = User::withTrashed()->findOrFail($id);
        if ($operator->deleted_at == '' | $operator->deleted_at == null)
        {    
            $status = 'aktif';   
        }else
        {
            $status = 'non-aktif';
        }
        
        return view('/manage.kelola-operator', ['operator'=>$operator, 'status'=>$status]);
    }
    
    /**
     * Kelola status akun operator
     * Mengganti status akun operator melalui request yang datang
     * Terdapat 2 jenis status request yang diterima, 
     * Jika status request sama dengan Non-aktifkan, maka akun operator akan di sofTDelete  
     * Selain itu (jika status request sama dengan Aktifkan), maka akun operator akan di restore
     * Memberikan pesan pada masing-masing aksi kepada admin
     *
     * @return \App\User
     */
    public function updateOperator(Request $request, $id)
    {
        if ($request->status == "Non-aktifkan")
        {
            $operator = User::findOrFail($id);
            $operator->delete();
            return redirect()->back()->with('success', 'Akun berhasil di non-aktifkan'); 
        }else
        {
            User::withTrashed()->findOrFail($id)->restore();
            return redirect()->back()->with('success', 'Akun berhasil di aktifkan');
        }
    }

    /**
     * Mengganti password user ke default
     * Melakukan reset password user jika ada request ke password default
     * Memberikan pesan feedback jika berhasil
     * 
     * @return \App\User
     * @return Hash
     */
    public function resetOperator($id)
    {    
        User::findOrFail($id)->update([
            'password' => Hash::make('123456'),
        ]);
        return redirect()->back()->with('success', 'Password akun berhasil di reset');         
    }

    /**
     * Menampilkan data pasien hanya yang ter delete dari table Pasien
     *
     * @return \App\Models\Pasien
     */
    public function pasienTrash()
    {
        $pasienTrashed = Pasien::orderBy('id', 'desc')->onlyTrashed()->paginate(10);
        return view('/manage.pasien-trashed', ['pasiens'=>$pasienTrashed]);
    }

    /**
     * Kelola data pasien
     * Menampilkan semua informasi dari data pasien yang ter delete
     *
     * @return \App\Models\Pasien
     * @return \App\Models\Hewan
     */
    public function kelolaPasien($id)
    {
        $pasien = Pasien::onlyTrashed()->findOrFail($id);
        $hewan = Hewan::onlyTrashed()->where('pasien_id', $id)->get();

        return view('/manage.kelola-pasien', ['pasien'=>$pasien, 'hewans'=>$hewan]);
    }

    /**
     * Mengembalikan data pasien yang terdelete
     * Menerima action dari Admin 
     * Jika action sama dengan Kembalikan data, 
     * Maka data pasien dengan id tertentu yang terdelete akan di restore
     * Jika restore berhasil mengembalikan feedback sukses
     * Jika action tidak ditemukan mengembalikan feedback warning
     *
     * @return \App\Models\Pasien
     */
    public function actionPasien(Request $request, $id)
    {
        //validasi berdasarkan action
        if ($request->action == "Kembalikan data")
        {
            $pasien = Pasien::onlyTrashed()->findOrFail($id);
            //mencoba restore data
            if($pasien->restore())
            {
                return redirect(route('pasien.trash'))->with('success', 'Data berhasil di kembalikan'); 
            }else
            {
                return redirect()->back()->with('danger', 'Gagal saat mencoba mengembalikan data');
            }
        }
        else
        {
            return redirect()->back()->with('warning', 'Aksi yang anda minta tidak dapat ditemukan');
        }
    }

    /**
     * Menampilkan data hewan hanya yang ter delete dari table Hewan
     *
     * @return \App\Models\Hewan
     */
    public function hewanTrash()
    {
        $hewanTrashed = Hewan::orderBy('id', 'desc')->onlyTrashed()->paginate(10);
        return view('/manage.hewan-trashed', ['hewans'=>$hewanTrashed]);
    }

    /**
     * Kelola data hewan
     * Menampilkan semua informasi dari data hewan yang ter delete
     *
     * @return \App\Models\Hewan
     */
    public function kelolaHewan($id)
    {
        $hewan = Hewan::withTrashed()->findOrFail($id);
        return view('/manage.kelola-hewan', ['hewan'=>$hewan]);
    }

    /**
     * Mengembalikan data pasien yang terdelete
     * Menerima action dari Admin 
     * Jika action sama dengan Kembalikan data, 
     * Maka data hewan dengan id tertentu yang terdelete akan di restore
     * Jika restore berhasil mengembalikan feedback sukses
     * Jika action tidak ditemukan mengembalikan feedback warning
     *
     * @return \App\Models\Hewan
     */
    public function actionHewan(Request $request, $id)
    {
        //validasi berdasarkan action
        if ($request->action == "Kembalikan data")
        {
            $hewan = Hewan::onlyTrashed()->findOrFail($id);
            //mencoba restore data
            if($hewan->restore())
            {
                return redirect(route('hewan.trash'))->with('success', 'Data berhasil di kembalikan'); 
            }else
            {
                return redirect()->back()->with('danger', 'Gagal saat mencoba mengembalikan data');
            }
        }
        else
        {
            return redirect()->back()->with('warning', 'Aksi yang anda minta tidak dapat ditemukan');
        }
    }

    /**
     * Menampilkan data medis hanya yang ter delete dari table Medis
     *
     * @return \App\Models\Medis
     */
    public function medisTrash()
    {
        $medisTrashed = Medis::orderBy('id', 'desc')->onlyTrashed()->paginate(10);
        return view('/manage.medis-trashed', ['medises'=>$medisTrashed]);
    }

    /**
     * Kelola data medis
     * Menampilkan semua informasi dari data medis yang ter delete
     *
     * @return \App\Models\Medis
     */
    public function kelolaMedis($id)
    {
        $medis = Medis::withTrashed()->findOrFail($id);
        return view('/manage.kelola-medis', ['medis'=>$medis]);
    }

    /**
     * Mengembalikan data medis yang terdelete
     * Menerima action dari Admin 
     * Jika action sama dengan Kembalikan data, 
     * Maka data medis dengan id tertentu yang terdelete akan di restore
     * Jika restore berhasil mengembalikan feedback sukses
     * Jika action tidak ditemukan mengembalikan feedback warning
     *
     * @return \App\Models\Medis
     */
    public function actionMedis(Request $request, $id)
    {
        //validasi berdasarkan action
        if ($request->action == "Kembalikan data")
        {
            $medis = Medis::onlyTrashed()->findOrFail($id);
            //mencoba restore data
            if($medis->restore())
            {
                return redirect(route('medis.trash'))->with('success', 'Data berhasil di kembalikan'); 
            }else
            {
                return redirect()->back()->with('danger', 'Gagal saat mencoba mengembalikan data');
            }
        }
        else
        {
            return redirect()->back()->with('warning', 'Aksi yang anda minta tidak dapat ditemukan');
        }
    }

    /**
     * Menampilkan data panduan pada dashboard panduan
     *
     * @return \App\Models\Panduan
     */
    public function panduan()
    {
        $panduans = Panduan::orderBy('id', 'desc')->paginate(10);
        return view('panduan.dashboard', ['panduans'=>$panduans]);
    }

    /**
     * Membuat data panduan baru
     *
     * @return view
     */
    public function panduanCreate()
    {
        return view('panduan.create');
    }

    /**
     * Menyimpan panduan yang dibuat
     *
     * @return \App\Models\Panduan
     * @return Auth
     */
    public function panduanStore(PanduanRequest $request)
    {
        $panduan = new Panduan;
        $panduan->admin_id = Auth::id();
        $panduan->judul = $request->judul;
        $panduan->panduan = $request->panduan;

        if($panduan->save())
        {
            return redirect(route('panduan'))->with('success', 'panduan berhasil dibuat');
        }else
        {
            return redirect()->back()->with('danger', 'gagal saat mencoba membuat panduan');
        }
    }

    /**
     * Menampilkan panduan yang dipilih
     *
     * @return \App\Models\Panduan
     */
    public function panduanShow($panduan)
    {
        $panduan = Panduan::findOrFail($panduan);

        return view('/panduan.show', ['panduan'=>$panduan]);
    }

    /**
     * Edit data panduan
     *
     * @return \App\Models\Panduan
     */
    public function panduanEdit($panduan)
    {
        $panduan = Panduan::findOrFail($panduan);

        return view('/panduan.edit', ['panduan'=>$panduan]);
    }

    /**
     * Menyimpan hasil edit data panduan
     *
     * @return \App\Models\Panduan
     */
    public function panduanUpdate(PanduanRequest $request, $id)
    {
        $panduan = Panduan::findOrFail($id);
        $panduan->judul = $request->judul;
        $panduan->panduan = $request->panduan;

        if($panduan->save())
        {
            return redirect(route('show.panduan', $id))->with('success', 'panduan berhasil di update');
        }else
        {
            return redirect()->back()->with('danger', 'gagal saat mencoba update panduan');
        }
    }
    
    /**
     * Menghapus permanen data panduan dari database
     *
     * @return \App\Models\Panduan
     */
    public function panduanDestroy($id)
    {
        Panduan::findOrFail($id)->delete();  
        return redirect(route('panduan'))->with('success', 'panduan berhasil di hapus');
    }
}
