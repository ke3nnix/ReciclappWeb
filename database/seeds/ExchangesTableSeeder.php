<?php

use Illuminate\Database\Seeder;

class ExchangesTableSeeder extends Seeder
{

    public function run()
    {
     // Fetch the User ids
        $User_ids = App\Models\User::all('usuario_id')->pluck('usuario_id')->toArray();

        // Create random CollectionPoints
        factory(App\Models\CollectionPoint::class, 18)->create()->each(function ($CollectionPoint) use ($User_ids) {

            // Example: Many-to-many relations
            $this->attachRandomUsersToCollectionPoint($CollectionPoint->acopio_id, $User_ids);

            // Example: Many-to-one relations
            // $this->createNotesForCollectionPointId( $CollectionPoint->id );
        });
    }

    /**
     * @param $CollectionPoint_id
     * @param $User_ids
     * @return void
     */
    private function attachRandomUsersToCollectionPoint($acopio_id, $User_ids)
    {
        $faker = Faker\Factory::create('es_PE');
        $amount = 18; // The amount of Users for this CollectionPoint
        echo "Agregando " . $amount . " entregas de desperdicios para el punto de acopio " . $acopio_id . "\n";

        if($amount > 0) {
            $keys = (array)array_rand($User_ids, $amount); // Random Users
            $num = 1;
            foreach($keys as $key) {

                echo "-- Entrega " . $num . "\n";
                $num += 1;

                $fecha = $faker->dateTimeThisMonth($max = '-3 days', $timezone = date_default_timezone_get());

                DB::table('exchanges')->insert([
                    'colaborador_id' => $User_ids[$key],
                    'empleado_id' => 1,
                    'acopio_id' => $acopio_id,
                    'total_cantidad' => 63,
                    'total_puntos' => 370,
                    'created_at' => $fecha,
                    'updated_at' => $fecha
                ]);
            }
        }
    }
}
