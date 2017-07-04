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
        $this->call(UsersTableSeeder::class);
        $this->call(CollectionPointsTableSeeder::class);
        $this->call(SponsorsTableSeeder::class);
        $this->call(BenefitsTableSeeder::class);
        $this->call(UserBenefitsTableSeeder::class);
        $this->call(WasteTableSeeder::class);
        // $this->call(ExchangesTableSeeder::class);
    }
}
