<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id();
            $table->integer('dondathangid');
            $table->integer('chitietsanphamid');
            $table->integer('masanpham_dh');
            $table->string('tensanpham_dh');
            $table->string('mau_dh');
            $table->string('size_dh');
            $table->integer('dongia');
            $table->integer('soluong_sp');
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
        Schema::dropIfExists('chitietdonhang');
    }
}
