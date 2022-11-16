<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `phieunhap`");
        DB::statement("ALTER TABLE `phieunhap` AUTO_INCREMENT = 1");

        DB::table('phieunhap')->insert([
            'tongtien'=>122121,
            'trangthai'=>0,
            'tencuahang'=>"Apple",
            'created_at'=>date(today()),
            'updated_at'=>date(today()),
        ]);
        DB::table('phieunhap')->insert([
            'tongtien'=>122121,
            'tencuahang'=>"changsing",
            'trangthai'=>1,
            'created_at'=>date(today()),
            'updated_at'=>date(today()),
        ]);
        DB::table('phieunhap')->insert([
            'tongtien'=>122121,
            'tencuahang'=>"fpttelecom",
            'trangthai'=>2,
            'created_at'=>date(today()),
            'updated_at'=>date(today()),
        ]);
    }

}
