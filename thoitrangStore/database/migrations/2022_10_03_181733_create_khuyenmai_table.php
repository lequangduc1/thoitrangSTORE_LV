<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->id();
            $table->integer('quantriid');
            $table->string('ten_km');
            $table->string('ma_km');
            $table->integer('soluonggiam');
            $table->integer('solan_dadung');
            $table->integer('giagiam_km');
            $table->date('ngaybatdau_km');
            $table->date('ngayketthuc_km');
            $table->integer('hinhthuc_km');
            $table->integer('trangthai_km');
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
        Schema::dropIfExists('khuyenmai');
    }
}
