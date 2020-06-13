<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hewan;

class HewanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $search = request()->input('q');
    
    $objects = Hewan::selectRaw("hewan.id as id, CONCAT(hewan.nama, ' - ', pasien.nama) as text")
    ->join('pasien', 'pasien.id', '=', 'hewan.pasien_id')
    ->where('hewan.nama', 'LIKE', "%$search%")->orWhere('hewan.kode', 'LIKE', "%$search%")
    ->orWhere('pasien.nama', 'LIKE', "%$search%")->orWhere('pasien.kode', 'LIKE', "%$search%")
    ->paginate(10);

    return response()->json($objects, 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
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
