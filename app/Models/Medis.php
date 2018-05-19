<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medis extends Model
{
		use SoftDeletes;
		
		//sistem tnggal baru untuk deleted_at
		protected $dates = ['deleted_at'];

    //tabel
		protected $table = 'medis';

		//kolom blacklist
		protected $guarded = ['id'];

		//created_at dan updated_at maintening by eloquent
		//public $timestamps = false;

		//format waktu atribut created_at
  	public function getCreatedAtAttribute()
		{
		    return \Carbon\Carbon::parse($this->attributes['created_at'])
		    	->timezone('Asia/Jakarta')
		      ->format('d M Y H:i:s A');
		}

		//format waktu atribut updated_at
		public function getUpdatedAtAttribute()
		{
		    return \Carbon\Carbon::parse($this->attributes['updated_at'])
		    	->timezone('Asia/Jakarta')
		      ->diffForHumans();
		}

		//relasi tabel pasien
		public function hewan()
		{
			return $this->belongsTo('App\Models\Hewan', 'hewan_id');
		}
}
