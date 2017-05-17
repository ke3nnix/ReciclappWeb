<?php

use Illuminate\Database\Seeder;

class ExchangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     // Fetch the User ids
        $User_ids = App\Models\User::all('usuario_id')->pluck('usuario_id')->toArray();

        // Create random CollectionPoints
        factory(App\Models\CollectionPoint::class, 18)->create()->each(function ($CollectionPoint) use ($User_ids) {

            // Example: Many-to-many relations
            $this->attachRandomUsersToCollectionPoint($CollectionPoint->id, $User_ids);

            // Example: Many-to-one relations
            // $this->createNotesForCollectionPointId( $CollectionPoint->id );
        });
    }

    /**
     * @param $CollectionPoint_id
     * @param $User_ids
     * @return void
     */
    private function attachRandomUsersToCollectionPoint($CollectionPoint_id, $User_ids)
    {
        $amount = 18; // The amount of Users for this CollectionPoint
        echo "Agregando " . $amount . " entregas de desperdicios para el punto de acopio " . $CollectionPoint_id . "\n";

        if($amount > 0) {
            $keys = (array)array_rand($User_ids, $amount); // Random Users

            foreach($keys as $key) {
                DB::table('exchanges')->insert([
                    'colaborador_id' => $User_ids[$key],
                    'empleado_id' => 1,
                    'acopio_id' => $CollectionPoint_id,
                    'total_puntos' => 370,
                ]);
            }
        }
    }
}
