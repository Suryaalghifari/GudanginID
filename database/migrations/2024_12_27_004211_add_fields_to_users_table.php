<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
            $table->date('tanggallahir')->nullable();
            $table->string('nomorhandphone')->nullable();
            $table->string('username')->unique();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tanggallahir');
            $table->dropColumn('nomorhandphone');
            $table->dropColumn('username');
        });
    }
};
