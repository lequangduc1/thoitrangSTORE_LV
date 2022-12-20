<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductColor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `mau`");
        DB::statement("ALTER TABLE `mau` AUTO_INCREMENT = 1");

        DB::table('mau')->insert([
            'tenmau' => "Black",
            'code' => "#000000",
            'trangthai' => 1,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);

        DB::table('mau')->insert([
            'tenmau' => "White",
            'code' => "#fff",
            'trangthai' => 0,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);

        DB::table('mau')->insert([
            'tenmau' => "Red",
            'code' => "#EE0000",
            'trangthai' => 1,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);
    }
}
