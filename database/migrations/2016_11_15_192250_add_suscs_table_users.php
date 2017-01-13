<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuscsTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('suscAvisos')->nullable();
            $table->boolean('suscOfertas')->nullable();
            $table->boolean('suscActualizaciones')->nullable();
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
            $table->dropColumn('suscAvisos');
            $table->dropColumn('suscOfertas');
            $table->dropColumn('suscActualizaciones');
        });
    }
}
