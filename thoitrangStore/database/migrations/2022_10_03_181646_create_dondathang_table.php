<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDondathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dondathang', function (Blueprint $table) {
            $table->id();
            $table->integer('khachhangid');
            $table->integer('khuyenmaiid');
            $table->integer('quantriid');
            $table->string('nguoinhan_dh');
            $table->string('sodienthoai_dh');
            $table->string('diachi_dh');
            $table->integer('tongtien_dh');
            $table->integer('trangthai_dh');
            $table->integer('trangthai_tt');
            $table->integer('phuongthuc_tt');
            $table->string('ghichu');
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
        Schema::dropIfExists('dondathang');
    }
}
