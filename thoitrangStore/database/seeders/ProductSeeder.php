<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `sanpham`");
        DB::statement("ALTER TABLE `sanpham` AUTO_INCREMENT = 1");

        DB::table('sanpham')->insert([
            'ten_sp'=>"Giày thể thao",
            'macodesanpham'=>"GTT102",
            'mota'=>"GTT102",
            'trangthai'=>1,
            'idloaisanpham' => 2,
            'created_at'=>date(today()),
            'updated_at'=>date(today()),
        ]);
        DB::table('sanpham')->insert([
            'ten_sp'=>"Áo thể thao",
            'macodesanpham'=>"ATT102",
            'mota'=>"ATT102",
            'trangthai'=>1,
            'idloaisanpham' => 1,
            'created_at'=>date(today()),
            'updated_at'=>date(today()),
        ]);

        DB::statement("DELETE FROM `chitietsanpham`");
        DB::statement("ALTER TABLE `chitietsanpham` AUTO_INCREMENT = 1");
        DB::table('chitietsanpham')->insert([
            'idsanpham'=>1,
            'idsize'=>1,
            'idsanpham'=>1,
            'idmau'=>1,
            'soluong'=>12,
            'anhsanpham'=>'',
            'giasanpham'=>125000,
            'created_at'=>date(today()),
            'updated_at'=>date(today()),
        ]);
        DB::table('chitietsanpham')->insert([
            'idsanpham'=>2,
            'idsize'=>2,
            'idsanpham'=>2,
            'idmau'=>2,
            'soluong'=>12,
            'anhsanpham'=>'',
            'giasanpham'=>125000,
            'created_at'=>date(today()),
            'updated_at'=>date(today()),
        ]);
    }
}
