<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hewan_id')->unsigned();
            $table->text('anamnesa')->nullable();
            $table->text('diagnosa')->nullable();
            $table->text('terapi')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hewan_id')
                  ->references('id')->on('hewan')
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
        Schema::dropIfExists('medis');
    }
}
