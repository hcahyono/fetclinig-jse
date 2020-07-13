<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
  public function dataPeriksa(Request $request)
  {
    $req = $request->post();
    
    $periksa = new Periksa();
    $periksa->leftJoin('medis', 'periksa.id_medis', '=', 'medis.id');
    $periksa->leftJoin('hewan', 'hewan.pasien');
    
    return response()->json(['data' => $periksa], 200);
  }
}
