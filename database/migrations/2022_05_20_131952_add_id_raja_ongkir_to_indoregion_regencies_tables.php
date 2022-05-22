<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdRajaOngkirToIndoregionRegenciesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoregion_regencies', function (Blueprint $table) {
            $table->integer('id_rj_ongkir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoregion_regencies', function (Blueprint $table) {
            $table->dropColumn('id_rj_ongkir');
        });
    }
}
