<?php

namespace App\Helpers;

use App\Models\Periksa;

class Helper 
{
  public static function kodePeriksa()
  {
    $prefix = 'VCC'; //Vet Clinic Checkup
    $periksa = Periksa::select('id')->orderByDesc('id')->first();
    if ($periksa) {
      $nextId = $periksa->id + 1;
      if (strlen((string)$periksa->id) < 4) {
        return $prefix . str_pad((string)$nextId, 4, "0", STR_PAD_LEFT);
      } else {
        return $prefix . $nextId;
      }
    } else {
      return $prefix . str_pad("1", 4, "0", STR_PAD_LEFT);
    }
  }  
}
