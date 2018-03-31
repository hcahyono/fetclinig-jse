<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{

    //format tanggal baru untuk deleted_at
		protected $dates = ['deleted_at'];

    //tabel
		protected $table = 'panduan';

		//kolom blacklist
		protected $guarded = ['id'];

		//off created_at dan updated_at maintening by eloquent
		//public $timestamps = false;

		//format waktu atribut created_at
  	public function getCreatedAtAttribute()
		{
		    return \Carbon\Carbon::parse($this->attributes['created_at'])
		    	->timezone('Asia/Jakarta')
		      ->format('d, M Y H:i:s A');
		}

		//format waktu atribut updated_at
		public function getUpdatedAtAttribute()
		{
		    return \Carbon\Carbon::parse($this->attributes['updated_at'])
		      ->timezone('Asia/Jakarta')
		      ->diffForHumans();
		}

		//relasi many -> one tabel admin
		public function admin()
		{
			return $this->belongsTo('App\Admin', 'admin_id');
		}

}
