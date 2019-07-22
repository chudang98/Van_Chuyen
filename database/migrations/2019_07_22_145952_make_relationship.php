<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('nguoi_dungs', function(Blueprint $table){
            $table->foreign('id_PX')->references('id')->on('phuong_xas');
        });
        Schema::table('don_hangs', function(Blueprint $table){
            $table->foreign('id_PX_client')->references('id')->on('phuong_xas');
            $table->foreign('id_PX_reciever')->references('id')->on('phuong_xas');
            $table->foreign('id_KH')->references('id')->on('nguoi_dungs');
            $table->foreign('id_NVVC')->references('id')->on('nguoi_dungs');
        });
        Schema::table('phuong_xas', function(Blueprint $table){
            $table->foreign('id_QH')->references('id')->on('quan_huyens');
        });
        Schema::table('quan_huyens', function(Blueprint $table){
            $table->foreign('id_TP')->references('id')->on('thanh_phos');
        });
        Schema::table('hang_hoas', function (Blueprint $table) {
            $table->foreign('id_DH')->references('id')->on('don_hangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
