<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(AccountSeeder::class);
        $this->call(InfomationSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(ProductSize::class);
        $this->call(ProductColor::class);
        $this->call(ProductType::class);
        $this->call(ProductSeeder::class);
        $this->call(ImportCouponDetailSeeder::class);
        $this->call(ImportCouponSeeder::class);
    }
}
