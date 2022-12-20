<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnhsanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anhsanpham', function (Blueprint $table) {
            $table->id();
            $table->integer('sanphamid');
            $table->timestamps();
//            $table->foreign('sanphamid')->references('id')->on('sanpham');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anhsanpham');
    }
}
