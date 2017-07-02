<?php

use Illuminate\Database\Seeder;

class UserBenefitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch the Benefit ids
        $benefit_ids = App\Models\Benefit::all('beneficio_id')->pluck('beneficio_id')->toArray();
        // instanciando al faker
        $faker = Faker\Factory::create('es_PE');
        // añadiendo beneficios para todos los usuarios colaboradores
        for ($usuario_id=16; $usuario_id <=115; $usuario_id++) { 
            $amount = $faker->numberBetween($min = 1, $max = 5);
            echo "Agregando " . $amount . " beneficios para el usuario " . $usuario_id . "\n";
            if($amount > 0) {
                // seleccionando $AMOUNT elementos del array
                $keys = (array)array_rand($benefit_ids, $amount); // Random Benefits
                // añadiendo $AMOUNT beneficios para el usuario $USUARIO_ID
                foreach($keys as $key) {
                    $fecha = $faker->dateTimeBetween($min = '-12 months' , $max = 'now');
                    DB::table('user_benefits')->insert([
                        'usuario_id' => $usuario_id,
                        'beneficio_id' => $benefit_ids[$key],
                        'created_at' => $fecha,
                        'updated_at' => $fecha
                    ]);
                }
            }
        }
    }
}