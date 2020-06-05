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

  /**
   * Membuat idCard image menggunakan image converter
   *
   * @param object $pasien
   * @return void
   */
  public function createCard($pasien) {
    // Cek jika file sudah ada maka delete file
    if (file_exists(public_path('storage/card/'.$pasien->kode.'.png'))) {
      unlink(public_path('storage/card/'.$pasien->kode.'.png'));
    }
    $options = [
      'width' => 1011,
      'height' => 638,
      'quality' => 100
    ];
    //membuat image idCard menggunakan image converter
    $conv = new Converter();
    $conv->source(route('template.card', [$pasien->id])) //ambil tampilan idCard HTML melalui route [idCardTemplate($id)] 
    ->toPng()
    ->imageOptions($options)
    // ->download('card.png');
    ->save(public_path('storage/card/'.$pasien->kode.'.png')); //Simpan ke folder public
    // ->serve();
  }

  /**
   * idCart template HTML view, template idCard yang akan digunakan untuk membuat idCard dari fungsi  createCard
   *
   * @param int $id Pasien
   * @return view idCard 
   */
  public function idCardTemplate($id) {
    $pasien = Pasien::find($id);
    return view('admin.export.idCard', compact(['pasien']));
  }

  /**
   * Api mengambil data idCard milik satu pasien
   *
   * @param int $id Pasien
   * @return json $data
   */
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

  /**
   * Api regenerate image idCard pasien
   *
   * @param int $id Pasien
   * @return json $data
   */
  public function reGenerateCard($id){
    $pasien = Pasien::find($id);
    if ($pasien) {
      $this->createCard($pasien);
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
