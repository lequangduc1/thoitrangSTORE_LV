<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSize extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `size`");
        DB::statement("ALTER TABLE `size` AUTO_INCREMENT = 1");

        DB::table('size')->insert([
            'tensize' => "S",
            'trangthai' => 1,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);
        DB::table('size')->insert([
            'tensize' => "M",
            'trangthai' => 1,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);
        DB::table('size')->insert([
            'tensize' => "L",
            'trangthai' => 1,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);
        DB::table('size')->insert([
            'tensize' => "XL",
            'trangthai' => 0,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);
        DB::table('size')->insert([
            'tensize' => "XXL",
            'trangthai' => 0,
            'created_at' => date(today()),
            'updated_at' => date(today()),
        ]);
    }
}
