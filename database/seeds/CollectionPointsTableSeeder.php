<?php

use Illuminate\Database\Seeder;

class CollectionPointsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\ColectionPoint::class, 30)->create();
    }
}
