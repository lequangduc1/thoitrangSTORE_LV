<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InfomationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `thongtinshop`");
        DB::statement("ALTER TABLE `thongtinshop` AUTO_INCREMENT = 1");

        DB::table('thongtinshop')->insert([
            'ten_shop' => "Shop Thời Trang",
            'logo' => "/uploads/logo.png",
            'favicon' => "/uploads/logo.png",
            'dien_thoai' => " 0283 620 9268",
            'dia_chi' => "147 - 149 Đường 3 tháng 2, phường 11, quận 10, TP.HCM",
            'email' => "admin@gmail.com",
            'iframe' => "iframe",
        ]);
    }
}
