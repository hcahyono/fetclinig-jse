<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitungTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `tr_nomer_tbhitung` AFTER INSERT ON `pasien` FOR EACH ROW
        BEGIN
          DECLARE angka integer;
          SELECT nomer FROM hitung WHERE nama="pasien" INTO angka;
          IF (angka != NULL) OR (angka > 0) OR (angka != "") THEN
            UPDATE hitung SET nomer=nomer+1 WHERE nama="pasien";
          ELSE
            INSERT INTO hitung (nama, nomer) VALUES("pasien", 2);
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
        DB::unprepared('DROP TRIGGER `tr_nomer_tbhitung`');
    }
}
