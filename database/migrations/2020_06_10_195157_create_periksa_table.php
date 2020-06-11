<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriksaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periksa', function (Blueprint $table) {
            $table->increments('id'); //integer
            $table->string('kode', 50)->unique()->comment('kode periksa');
            $table->integer('medis_id')->unsigned()->comment('id rekam medis');
            $table->integer('dokter_id')->unsigned()->default(0)->comment('users dengan role dokter');
            $table->dateTime('tgl_periksa')->comment('tanggal resepsionis mendaftarkan pasien untuk diperiksa');
            $table->dateTime('tgl_diperiksa')->comment('tanggal pasien diperiksa oleh dokter');
            $table->unsignedInteger('f_status')->default(1)->comment('1:menunggu diperiksa, 2:diambil/diperiksa oleh dokter, 3:selesai diperiksa');
            $table->decimal('total_biaya')->default(0)->comment('jumlah sub total biaya di kwitansi');
            $table->decimal('total_bayar')->default(0)->comment('total dibayarkan dari total biaya');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('created_by')->comment('id users, [users receptionis]');
            $table->unsignedInteger('updated_by')->comment('id users, [semua roles bisa]');
            $table->unsignedInteger('deleted_by')->comment('id users, [semua roles bisa]');

            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periksa');
    }
}
