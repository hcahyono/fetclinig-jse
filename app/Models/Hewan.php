<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hewan extends Model
{
		use SoftDeletes;

		//format tanggal baru untuk deleted_at
		protected $dates = ['deleted_at'];

    //tabel
		protected $table = 'hewan';

		//kolom blacklist
		protected $guarded = ['id'];

		//created_at dan updated_at maintening by eloquent
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

		//relasi many -> one tabel pasien
		public function pasien()
		{
			return $this->belongsTo('App\Models\Pasien', 'pasien_id');
		}

		/**
   	* Override parent boot and Call deleting event
   	*
   	* @return void
   	*/
    protected static function boot()
    {
      parent::boot();

      static::deleting(function($hewan) {
         foreach ($hewan->medis()->get() as $medis) {
            $medis->delete();
         }
      });
    }

		 /*
		relasi one to many tabel medis
	  */
  	public function medis()
  	{
  		//hewan has many rekam medis, pada models Medis, 'foreignkey_id', 'local_id'
  		return $this->hasMany('App\Models\Medis', 'hewan_id', 'id')
  						->orderBy('created_at', 'DESC');
  	}
}
