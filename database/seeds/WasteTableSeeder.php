<?php

use Illuminate\Database\Seeder;

class WasteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waste')->insert([
            'descripcion' => 'papel',
            'unidad' => 'KG',
            'equivalencia' => 5,
        ]);

        DB::table('waste')->insert([
            'descripcion' => 'vidrio',
            'unidad' => 'KG',
            'equivalencia' => 8,
        ]);

        DB::table('waste')->insert([
            'descripcion' => 'plastico',
            'unidad' => 'KG',
            'equivalencia' => 20,
        ]);

        for ($exchange_id=1; $exchange_id <15; $exchange_id++) { 
            DB::table('exchange_details')->insert([
                'entrega_id' => $exchange_id,
                'desecho_id' => 1,
                'cantidad' => 6,
                'puntos' => 120,
            ]);

            DB::table('exchange_details')->insert([
                'entrega_id' => $exchange_id,
                'desecho_id' => 2,
                'cantidad' => 21,
                'puntos' => 210,
            ]);

            DB::table('exchange_details')->insert([
                'entrega_id' => $exchange_id,
                'desecho_id' => 3,
                'cantidad' => 36,
                'puntos' => 360,
            ]);
        }
    }
}
