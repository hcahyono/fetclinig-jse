<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Medis;
use App\Models\Pasien;
use App\Models\Hewan;
use Carbon\Carbon;
use Auth;

class MedisController extends Controller
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
      	return Carbon::now('Asia/Jakarta')->format('d-m-Y H:i');
    }

    public function store(Request $request, $id)
		{
				$medis = new Medis;
				$medis->anamnesa = $request->input('anamnesa');
				$medis->diagnosa = $request->input('diagnosa');
				$medis->terapi = $request->input('terapi');
				$medis->keterangan = $request->input('keterangan');
				$medis->created_by = $this->user()->name;
				$medis->updated_by = $this->user()->name;

				$medis->hewan()->associate(Hewan::findOrFail($id));
				$medis->save();

				return redirect()->back();
		}

    public function index($pasien, $hewan)
    {
	    	$pasien = Pasien::findOrFail($pasien);
	    	$peliharaan = Hewan::findOrFail($hewan);

	    	return view('admin.pages.DataMedis', [
	    							'pasien'=>$pasien,
	    							'peliharaan'=>$peliharaan,
	    							'now'=>$this->now()
	    						]);
    }

    public function show($pasien, $hewan, $medis)
    {
	    	$pasien 			= Pasien::findOrFail($pasien);
	    	$peliharaan 	= Hewan::findOrFail($hewan);
	    	$medis 				= Medis::findOrFail($medis);

	    	return view('/admin.pages.RekamMedis', [
	    							'pasien' 			=> $pasien,
	    							'peliharaan' 	=> $peliharaan,
	    							'medis' 			=> $medis,
	    							'now'=>$this->now()
	    						]);
    }

    public function update(Request $request, $id)
    {
	    	Medis::findOrFail($id)->update([
	    		'anamnesa'		 	=> $request->input('anamnesa'),
	    		'diagnosa'	 		=> $request->input('diagnosa'),
	    		'terapi'   			=> $request->input('terapi'),
	    		'keterangan'	 	=> $request->input('keterangan'),
	    		'updated_by'	 	=> $this->user()->name
	    	]);

	    	return redirect()->back();
    }

    public function delete($pasien, $hewan, $medis)
    {
    		$medis = Medis::findOrFail($medis);
    		$medis->delete();
    		return redirect('medis/'.$pasien.'/'.$hewan);
    }
}
