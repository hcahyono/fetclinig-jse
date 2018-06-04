<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pasien;
use Carbon\Carbon;
use Auth;

class UltahController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');  //user guard
	}

	public function dateNow()
	{
		return Carbon::now('Asia/Jakarta')->format('l, d-m-Y');
	}

	public function tomorrow()
	{
		return Carbon::now('Asia/Jakarta')->addDays(1)->format('l, d-m-Y');
	}

	public function showUltah()
	{
		$hari = date('d');
		$bulan = date('m');
		$ultah = array();
		$ultahBesok = array();
		
		$ultahPemilik = DB::table('pasien')
									->whereNull('deleted_at')
									->whereMonth('tanggal_lahir', $bulan)
									->whereDay('tanggal_lahir', $hari)
									->get();
		foreach ($ultahPemilik as $ultahValue) {
			$ultah[] = $ultahValue;
		}

		$ultahPemilikBesok = DB::table('pasien')
									->whereNull('deleted_at')
									->whereMonth('tanggal_lahir', $bulan)
									->whereDay('tanggal_lahir', $hari+1)
									->get();
		foreach ($ultahPemilikBesok as $ultahBesokValue) {
			$ultahBesok[] = $ultahBesokValue;
		}

		return view('/admin.pages.Ultah', ['ulangtahun'=>$ultah, 'ulangtahunbesok'=>$ultahBesok, 'now'=>$this->dateNow(), 'tomorrow'=>$this->tomorrow()]);
	}
}
