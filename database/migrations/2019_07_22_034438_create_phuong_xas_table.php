<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhuongXasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuong_xas', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->enum('type', ['Phường', 'Xã', 'Thị trấn']);
            $table->string('id_QH');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phuong_xas');
    }
}
