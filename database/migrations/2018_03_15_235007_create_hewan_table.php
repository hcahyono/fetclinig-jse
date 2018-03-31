<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHewanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hewan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pasien_id')->unsigned();
            $table->string('nama', 50);
            $table->string('jenis', 50)->nullable();
            $table->string('gender', 10);
            $table->string('ras', 50)->nullable();
            $table->string('warna', 50)->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pasien_id')
                  ->references('id')->on('pasien')
                  ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('hewan');
    }
}
