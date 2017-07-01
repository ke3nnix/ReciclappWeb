<?php

use Illuminate\Database\Seeder;

class CollectionPointsTableSeeder extends Seeder
{
    public function run()
    {
        // factory(App\Models\ColectionPoint::class, 30)->create();
        $faker = Faker\Factory::create('es_PE');

        for ($i=1; $i <= 15; $i++) { 

            $nombre = "PDA-LIMA-" . $i;
            echo "Añadiendo Punto de acopio: " . $nombre . "\n";

            DB::table('collection_points')->insert([
                'nombre' => $nombre,
                'direccion' => $faker->address,
                'distrito' => $faker->state,
                'latitud' => $faker->latitude($min = -12.10, $max = -12.03),
                'longitud' => $faker->longitude($min = -77.06, $max = -76.97),
                'papel_max' => ($faker->numberBetween($min = 5, $max = 9))*1000,
                'vidrio_max' => ($faker->numberBetween($min = 5, $max = 9))*1000,
                'plastico_max' => ($faker->numberBetween($min = 7, $max = 9))*1000,
                'papel_actual' => $faker->numberBetween($min = 2000, $max = 5000),
                'vidrio_actual' => $faker->numberBetween($min = 0, $max = 5000),
                'plastico_actual' => $faker->numberBetween($min = 2000, $max = 7000),
                'estado' => 1,
            ]); 
        }
    }
}
