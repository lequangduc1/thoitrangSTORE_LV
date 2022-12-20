<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `khuyenmai`");
        DB::statement("ALTER TABLE `khuyenmai` AUTO_INCREMENT = 1");

        DB::table('khuyenmai')->insert([
            'ten_km' => "Thích",
            'ma_km' => "thich",
            'phantramgiam' => "10",
            'soluong' => "50",
            'conlai' => "50",
            'ngaybatdau_km' => date(today()),
            'ngayketthuc_km' => date(today()),
            'trangthai' => 1,
            'created_at' => date(today()),
            'create_by' => 'admin@gmail.com',
        ]);
    }
}
