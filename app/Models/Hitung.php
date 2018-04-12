<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hitung extends Model
{
    //tabel pada database yang digunakan
	protected $table = 'hitung';

	//kolom yang tidak boleh di write
	protected $guarded = ['id'];

}
