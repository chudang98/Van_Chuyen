<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoiDungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password');
            $table->string('username');
            $table->string('phone');
            $table->string('email');
            $table->enum('user_type',['Khách hàng','Quản trị viên', 'Nhân viên vận chuyển']);
            $table->string('name');
            $table->date('birth');
            $table->string('address');
            $table->string('id_PX');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoi_dungs');
    }
}
