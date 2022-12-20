<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `loaisanpham`");
        DB::statement("ALTER TABLE `loaisanpham` AUTO_INCREMENT = 1");

        DB::table('loaisanpham')->insert([
            'tenloai' => "quần áo",
            'trangthai' => 1,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);
        DB::table('loaisanpham')->insert([
            'tenloai' => "Giày dép",
            'trangthai' => 0,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);
    }
}
