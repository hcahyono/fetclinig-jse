<?php

namespace App\Http\Controllers;

use App\Models\Medis;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        'anamnesa' => $req->anamnesa
      ]);
    } catch (\Exception $e) {
      return back()->withInput()->with('error', 'Gagal saat menyimpan anamnesa');
    }
    
    dd('sukses');
  }

  protected function storeValidator(Request $req)
  {
    $req->validate([
      'peliharaan' => ['required', 'integer', 'min:1', 'exists:hewan,id'],
      'anamnesa' => ['required', 'string', 'min:3'],
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
