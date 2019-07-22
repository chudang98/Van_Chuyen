<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_client');
            $table->string('address_reciever');
            $table->string('phone_client');
            $table->string('phone_reciever');
            $table->enum('payment',['Gateway','COD']);
            $table->enum('speed',['Bình thường','Nhanh','Siêu tốc']);
            $table->enum('state',['Chờ xác nhận','Chờ giao hàng','Đang giao hàng','Hoàn thành giao hàng','Đã hủy']);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('id_PX_client');
            $table->string('id_PX_reciever');
            $table->unsignedBigInteger('id_KH');
            $table->unsignedBigInteger('id_NVVC');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hangs');
    }
}
