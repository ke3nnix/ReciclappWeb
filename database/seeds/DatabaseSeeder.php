<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SponsorsTableSeeder::class);
        $this->call(BenefitsTableSeeder::class);
        $this->call(UserBenefitsTableSeeder::class);
        $this->call(ExchangesTableSeeder::class);
        $this->call(WasteTableSeeder::class);
    }
}
