<?php

use Illuminate\Database\Seeder;

class BenefitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_PE');

        $fecha = $faker->dateTimeBetween($startDate = '-14 months', $endDate = '-13 months', $timezone = date_default_timezone_get());

        for ($i=0; $i < 50; $i++) { 
            DB::table('benefits')->insert([
                'nombre' => 'Beneficio '. $i,
                'descripcion' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'req_puntos' => $faker->numberBetween($min = 500, $max = 2000),
                'tipo' => $faker->numberBetween($min = 1, $max = 3),
                'cantidad' => $faker->numberBetween($min = 20, $max = 200),
                'sponsor_id' => $faker->numberBetween($min = 1, $max = 20),
                'estado' => 1,
                'created_at' => $fecha,
                'updated_at' => $fecha
            ]); 
        }
    }
}