<?php

namespace App\Http\Controllers;

use Helper;
use App\Models\Medis;
use App\Models\Periksa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PeriksaController extends Controller
{
  public function now()
  {
    return Carbon::now('Asia/Jakarta')->format('d-m-Y H:i');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // dd(Helper::kodePeriksa());
    return view('periksa.create', ['now'=>$this->now()]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $req)
  {
    $this->storeValidator($req);

    try {
      //create rekam medis
      $rekamMedis = Medis::create([
        'hewan_id' => $req->peliharaan,
        'anamnesa' => $req->anamnesa,
        'created_at' => now()->format('Y-m-d H:i:s'),
        'created_by' => Auth::user()->name
      ]);
    } catch (\Exception $e) {
      return back()->withInput()->with('error', 'Gagal saat menyimpan anamnesa');
    }

    if ($rekamMedis) {
      try {
        //created data periksa
        $periksa = Periksa::create([
          'kode' => Helper::kodePeriksa(),
          'medis_id' => $rekamMedis->id,
          'tgl_periksa' => now()->format('Y-m-d H:i:s'),
          'f_status' => $req->saveAs,
          'created_at' => now()->format('Y-m-d H:i:s'),
          'created_by' => Auth::user()->id
        ]);
      } catch (\Exception $e) {
        $rekamMedis->delete();
        return back()->withInput()->with('error', 'Gagal saat menyimpan data periksa');
      }
    }
    
    return back()->with('success', 'Data periksa berhasil disimpan');
  }

  protected function storeValidator(Request $req)
  {
    $req->validate([
      'peliharaan' => ['required', 'integer', 'min:1', 'exists:hewan,id'],
      'anamnesa' => ['required', 'string', 'min:3'],
      'saveAs' => ['required', 'integer', 'min:1'],
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
