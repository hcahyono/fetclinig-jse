<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tambah kolom role_id ke tabel users untuk relasi dengan tabel roles
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->default(0)->after('id')->comment('id roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('role_id');
        });
    }
}
