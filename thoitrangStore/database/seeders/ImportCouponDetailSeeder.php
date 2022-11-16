<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportCouponDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `chitietphieunhap`");
        DB::statement("ALTER TABLE `chitietphieunhap` AUTO_INCREMENT = 1");


        DB::table('chitietphieunhap')->insert([
            'idphieunhap'=>1,
            'idchitietsanpham'=>1,
            'soluongnhap'=>2,
            'gianhap'=>200000,
            'created_at'=>date(today()),
            'updated_at'=>date(today()),
        ]);
    }
}
