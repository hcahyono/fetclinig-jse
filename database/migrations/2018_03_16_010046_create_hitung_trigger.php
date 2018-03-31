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
            UPDATE hitung SET nomer=nomer+1 WHERE nama="pasien";
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
