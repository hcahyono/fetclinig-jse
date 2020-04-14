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
            IF (angka != NULL) OR (angka > 0) OR (angka != "") THEN
            	SET NEW.kode = CONCAT(tanggal, angka);
            ELSE
            	SET NEW.kode = CONCAT(tanggal, 1);
            	INSERT INTO hitung (nama, nomer) VALUES("pasien", 1);
            END IF;
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
