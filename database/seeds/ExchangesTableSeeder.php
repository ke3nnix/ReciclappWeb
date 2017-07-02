<?php

use Illuminate\Database\Seeder;

class ExchangesTableSeeder extends Seeder
{

    public function run()
    {
        // Fetch the colaborators ids
        // $benefit_ids = App\Models\Benefit::all('beneficio_id')->pluck('beneficio_id')->toArray();
        // instanciando al faker
        $faker = Faker\Factory::create('es_PE');
        $entrega_id = 1;
        // añadiendo entregas para todos los usuarios colaboradores
        for ($usuario_id=16; $usuario_id <=115; $usuario_id++) { 
            $amount = $faker->numberBetween($min = 1, $max =20);
            echo "Registrando " . $amount . " entregas para el usuario " . $usuario_id . "\n";
            // añadiendo $AMOUNT entregas para el usuario $USUARIO_ID
            for ($e=0; $e < $amount; $e++) { 

                $cpa = $faker->numberBetween($min = 0, $max =15);
                $ppa = $cpa * 5;

                $cvi = $faker->numberBetween($min = 0, $max =15);
                $pvi = $cvi * 8;

                $cpl = $faker->numberBetween($min = 0, $max =15);
                $ppl = $cpl * 20;

                $cant_total = $cpa + $cvi + $cpl;
                $punt_total = $ppa + $pvi + $ppl;

                $fecha = $faker->dateTimeBetween($startDate = '-12 months', $endDate = 'now', $timezone = date_default_timezone_get());

                // Añadiendo la entrega
                DB::table('exchanges')->insert([
                    'colaborador_id' => $usuario_id,
                    'empleado_id' => $faker->numberBetween($min = 6, $max = 15),
                    'acopio_id' => $faker->numberBetween($min = 1, $max = 15),
                    'total_cantidad' => $cant_total,
                    'total_puntos' => $punt_total,
                    'created_at' => $fecha,
                    'updated_at' => $fecha
                ]);

                // Añadiendo papel
                if ($cpa>0) {
                    DB::table('exchange_details')->insert([
                        'entrega_id' => $entrega_id,
                        'desecho_id' => 1,
                        'cantidad' => $cpa,
                        'puntos' => $ppa,
                        'created_at' => $fecha,
                        'updated_at' => $fecha
                    ]);
                }

                // Añadiendo vidrio
                if ($cvi>0) {
                    DB::table('exchange_details')->insert([
                        'entrega_id' => $entrega_id,
                        'desecho_id' => 2,
                        'cantidad' => $cvi,
                        'puntos' => $pvi,
                        'created_at' => $fecha,
                        'updated_at' => $fecha
                    ]);
                }

                // Añadiendo plastico
                if ($cpl>0) {
                    DB::table('exchange_details')->insert([
                        'entrega_id' => $entrega_id,
                        'desecho_id' => 3,
                        'cantidad' => $cpl,
                        'puntos' => $ppl,
                        'created_at' => $fecha,
                        'updated_at' => $fecha
                    ]);
                }

                $entrega_id = $entrega_id + 1;

            }
        }
    }
}
