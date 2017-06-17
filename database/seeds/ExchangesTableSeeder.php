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
        $amount = 18; // The amount of Users for this CollectionPoint
        echo "Agregando " . $amount . " entregas de desperdicios para el punto de acopio " . $acopio_id . "\n";

        if($amount > 0) {
            $keys = (array)array_rand($User_ids, $amount); // Random Users
            $num = 1;
            foreach($keys as $key) {

                echo "-- Entrega " . $num . "\n";
                $num += 1;

                DB::table('exchanges')->insert([
                    'colaborador_id' => $User_ids[$key],
                    'empleado_id' => 1,
                    'acopio_id' => $acopio_id,
                    'total_cantidad' => 63,
                    'total_puntos' => 370,
                    'created_at' => '2003-08-20 18:31:00',
                    'updated_at' => '2003-08-20 18:31:00'
                ]);

                // $entrega = DB::table('exchanges')
                //                     ->orderBy('entrega_id', 'desc')
                //                     ->limit(1)
                //                     ->get();
                //  $entrega = $entrega->toArray();

                // $cantidad = 20;
                // $puntos = 120;

                // for ($desecho=1; $desecho <= 3; $desecho++) { 
                //     echo "----- Detalle de entrega " . $desecho . "\n";
                //     DB::table('exchange_details')->insert([
                //         'entrega_id' => $entrega[0]->entrega_idd,
                //         'desecho_id' => $desecho,
                //         'cantidad' => $cantidad,
                //         'puntos' => $puntos,
                //         'created_at' => '2003-08-20 18:31:00',
                //         'updated_at' => '2003-08-20 18:31:00'
                //     ]);
                //     $cantidad += 15;
                //     $puntos += 85;
                // }
            }
        }
    }
}
