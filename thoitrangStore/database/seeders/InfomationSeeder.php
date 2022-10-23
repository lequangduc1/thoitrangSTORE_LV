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
            'ten_shop'=>"Shop Thoi Trang",
            'logo'=>"/uploads/logo_default.png",
            'favicon'=>"/uploads/logo_default.png",
            'dien_thoai'=>"038756952",
            'dia_chi'=>"Address",
            'email'=>"admin@gmail.com",
            'iframe'=>"iframe",
        ]);
    }
}
