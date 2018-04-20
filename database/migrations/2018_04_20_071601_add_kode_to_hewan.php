<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKodeToHewan extends Migration
{
    /**
     * Add new column on existing database,
     * Run command in cli. php artisan make:migration add_kode_to_hewan --option, [--table="hewan"].
     * Add Schema table in function up (for adding in existing table, not create new once)
     * Add Schema table in function down for dropping new adding column, used to rollback
     * Run the migrations. php artisan migrate (this not delete existing data in table).
     *
     * @return void
     */
    public function up()
    {
        //tambah kolom kode ke tabel hewan
        Schema::table('hewan', function (Blueprint $table) {
            $table->string('kode', 30)->unique()->after('pasien_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop column kode di tabel hewan
        Schema::table('hewan', function (Blueprint $table) {
            $table->dropColumn('kode');
        });
    }
}
