<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kwitansi extends Model
{
  use SoftDeletes;
  
  protected $table = 'kwitansi';
  
  protected $guarded = ['id'];

  public function periksa() 
  {
    return $this->belongsTo('App\Models\Periksa', 'periksa_id');
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
