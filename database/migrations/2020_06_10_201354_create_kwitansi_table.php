<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKwitansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwitansi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('periksa_id')->comment('id periksa');
            $table->string('kode', 50)->comment('sama dengan kode periksa');
            $table->string('item_periksa', 255)->default("");
            $table->unsignedInteger('qty')->default(1);
            $table->string('satuan_qty', 50)->nullable();
            $table->decimal('biaya_satuan')->default(0);
            $table->decimal('sub_total')->default(0);
            // $table->unsignedInteger('f_status')->comment('1:menunggu pembayaran, 2:lunas, 3:belum lunas');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('created_by')->comment('id users, [dokter]');
            $table->unsignedInteger('updated_by')->default(0)->comment('id users, [resepsionis / kasir]');
            $table->unsignedInteger('deleted_by')->default(0)->comment('id users, [semua roles bisa]');

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
        Schema::dropIfExists('kwitansi');
    }
}
