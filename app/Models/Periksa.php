<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periksa extends Model
{
  use SoftDeletes;
  
  protected $table = 'periksa';
  
  protected $guarded = ['id'];

  public function dokter() 
  {
    return $this->belongsTo('App\Models\User', 'dokter_id')->where('role_id', 5);
  }

  public function medis()
  {
    return $this->belongsTo('App\Models\Medis', 'medis_id');
  }

  public function creator()
  {
    return $this->belongsTo('App\User', 'created_by');
  }

  public function updater()
  {
    return $this->belongsTo('App\User', 'updated_by');
  }
}
