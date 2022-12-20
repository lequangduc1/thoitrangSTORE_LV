<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongtinshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtinshop', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('ten_shop');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('dien_thoai');
            $table->string('dia_chi');
            $table->string('email');
            $table->longText('iframe');
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
        Schema::dropIfExists('thongtinshop');
    }
}
