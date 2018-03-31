<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `tr_kode_tbpasien` BEFORE INSERT ON `pasien` FOR EACH ROW
        BEGIN
            DECLARE angka integer;
            DECLARE tanggal varchar(20);
            SELECT nomer FROM hitung WHERE nama="pasien" INTO angka;
            
            SET tanggal = CURDATE()+0;
             
            SET NEW.kode = CONCAT(tanggal, angka);
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_kode_tbpasien`');
    }
}
