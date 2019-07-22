<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HangHoas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hang_hoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('weight');
            $table->float('height');
            $table->float('width');
            $table->float('depth');
            $table->unsignedBigInteger('id_DH');

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
