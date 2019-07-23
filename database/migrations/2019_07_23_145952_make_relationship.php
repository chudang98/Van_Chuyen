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
        Schema::table('users', function(Blueprint $table){
            $table->foreign('communes_id')->references('id')->on('communes');
        });
        Schema::table('bills', function(Blueprint $table){
            $table->foreign('communes_id_sender')->references('id')->on('communes');
            $table->foreign('communes_id_reciever')->references('id')->on('communes');
            $table->foreign('users_id_kh')->references('id')->on('users');
            $table->foreign('users_id_nvvc')->references('id')->on('users');
        });
        Schema::table('communes', function(Blueprint $table){
            $table->foreign('districts_id')->references('id')->on('districts');
        });
        Schema::table('districts', function(Blueprint $table){
            $table->foreign('cities_id')->references('id')->on('cities');
        });
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('bills_id')->references('id')->on('bills');
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
