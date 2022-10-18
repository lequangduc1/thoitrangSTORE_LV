<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `quantri`");
        DB::statement("ALTER TABLE `quantri` AUTO_INCREMENT = 1");

        DB::table('quantri')->insert([
            'ten'=>"Admin",
            'email'=>"admin@gmail.com",
            'phone'=>"0387855869",
            'diachi'=>"HCM",
            'password'=>Hash::make('password'),
            'trangthai'=>1,
            'quyen'=>1
        ]);
    }
}
