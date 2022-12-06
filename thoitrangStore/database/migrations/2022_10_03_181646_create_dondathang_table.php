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
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->integer('makhachhang');
            $table->text('makhuyenmai')->nullable();
            $table->integer('manhanvien');
            $table->integer('tongtien_dh');
            $table->integer('trangthai_dh');
            $table->integer('phuongthuc_tt');
            $table->integer('trangthai_tt');
            $table->string('ghichu')->nullable();
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
