<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

use PDF;
use App\Models\Pasien;
use App\Models\Hewan;
use App\Models\Medis;
use Auth;

class ExportController extends Controller
{
  	public function __construct()
  	{
  		  $this->middleware('auth');  //user guard
  	}

    protected function user()
    {
        return auth()->user();
    }

    public function now()
    {
      	return Carbon::now('Asia/Jakarta')->format('d/m/Y H:i:s');
    }

    public function pdfAll($pasien, $hewan)
    {
      	$pasien = Pasien::findOrFail($pasien);
      	$hewan = Hewan::findOrFail($hewan);

      	$pdf = PDF::loadView('/admin.export.pdfAllMedis', [
      		'pasien'=>$pasien,
          'hewan'=>$hewan,
      		'user'=>$this->user()->name,
      		'now'=>$this->now()
      	]);

      	$date = Carbon::now('Asia/Jakarta')->format('d-m-Y');
  			return $pdf->stream($date.'_'.$pasien->nama.' rekam medis '.$hewan->nama.'.pdf');
    }

    public function pdfSingle($pasien, $hewan, $medis)
    {

      	$pasien = Pasien::findOrFail($pasien);
      	$hewan = Hewan::findOrFail($hewan);
      	$medis = Medis::findOrFail($medis);

      	$pdf = PDF::loadView('/admin.export.pdfSingleMedis', [
      		'pasien'=>$pasien,
      		'hewan'=>$hewan,
      		'medis'=>$medis,
          'user'=>$this->user()->name,
      		'now'=>$this->now()
      	]);

      	$date = Carbon::now('Asia/Jakarta')->format('d-m-Y');
  			return $pdf->stream($date.'_'.$pasien->nama.' rekam medis '.$hewan->nama.' tanggal '.$medis->created_at.'.pdf');
    }
}
