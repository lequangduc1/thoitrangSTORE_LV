<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->id();
            $table->string('hovaten');
            $table->string('email');
            $table->string('diachi')->default('HCM');
            $table->string('sodienthoai');
            $table->string('password');
            $table->string('remember_token')->default('');
            $table->integer('email_verify')->default(0);
            $table->integer('trangthai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
