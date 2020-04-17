<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anam\PhantomMagick\Converter;
use App\Models\Pasien;

class CardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['idCardTemplate']]);  //user guard
  }

  public function createCard($pasien) {
    $options = [
      'width' => 1011,
      'height' => 638,
      'quality' => 100
    ];
    $conv = new Converter();
    $conv->source(route('template.card', [$pasien->id]))
    ->toPng()
    ->imageOptions($options)
    // ->download('card.png');
    ->save(public_path('storage/card/'.$pasien->kode.'.png'));
    // ->serve();
  }

  public function idCardTemplate($id) {
    $pasien = Pasien::find($id);
    return view('admin.export.idCard', compact(['pasien']));
  }

  public function idCardShow($id)
  {
    $pasien = Pasien::find($id);
    if ($pasien) {
      if (!file_exists(public_path('storage/card/'.$pasien->kode.'.png'))) {
        $this->createCard($pasien);
      }
      $data = [
        'pasien' => $pasien
      ];
      $resp = ['status' => true, 'desc' => 'success', 'result' => $data];
    } else {
      $resp = ['status' => false, 'desc' => 'data pasien tidak ditemukan'];
    }

    return response()->json($resp, 200);
  }
}
