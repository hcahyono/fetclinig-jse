<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Pasien extends Model
{
		use SoftDeletes;

		//format tanggal baru untuk deleted_at
		protected $dates = ['deleted_at'];

		/*
		Model akan otomatis mencari table sesuai nama plural classnya, yaitu mencari table pasiens,
		jika nama table yang dimiliki berbeda gunakan protec variabel untuk memberikan nama tabel
		*/
  	protected $table = 'pasien';

	  /*
		Mass Assignment atau tabel proteksi, izin penulisan pada setiap field database
		protected $guarded = ['field', 'field2']; //daftar field yang di blacklist
		protected $fillable =  ['field', 'field2']; //daftar field yang boleh di tulis
	  */
  	protected $guarded = ['id'];

  	//created_at dan updated_at maintening by eloquent
		// public $timestamps = false;


  	//format waktu atribut created_at
  	public function getCreatedAtAttribute()
		{
				// $user = Auth::user();
				// $timezone = $user ? $user->timezone : Config::get('app.timezone');
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

		/**
   	* Override parent boot and Call deleting event
   	*
   	* @return void
   	*/
    protected static function boot()
    {
      parent::boot();

      static::deleting(function($pasien) {
         foreach ($pasien->peliharaan()->get() as $peliharaan) {
            $peliharaan->delete();
         }
      });
    }

		//relasi one to many tabel hewan
  	public function peliharaan()
  	{
  		//pasien has many peliharaan, pada models Hewan, 'foreignkey_id', 'local_id'
  		return $this->hasMany('App\Models\Hewan', 'pasien_id', 'id')
  						->orderBy('created_at', 'DESC');
  	}
}
