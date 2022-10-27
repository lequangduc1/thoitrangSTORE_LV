<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `khachhang`");
        DB::statement("ALTER TABLE `khachhang` AUTO_INCREMENT = 1");

        DB::table('khachhang')->insert([
            'hovaten'=>"Khach hang 1",
            'email'=>"customer@gmail.com",
            'sodienthoai'=>"0387855869",
            'diachi'=>"HCM",
            'password'=>Hash::make('password'),
            'trangthai'=>1,
        ]);
    }
}
