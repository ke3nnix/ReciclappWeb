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
            'total' => 0
        ]);

        DB::table('waste')->insert([
            'descripcion' => 'vidrio',
            'unidad' => 'KG',
            'equivalencia' => 8,
            'total' => 0
        ]);

        DB::table('waste')->insert([
            'descripcion' => 'plástico',
            'unidad' => 'KG',
            'equivalencia' => 20,
            'total' => 0
        ]);

        // for ($exchange_id=1; $exchange_id <15; $exchange_id++) { 
        //     DB::table('exchange_details')->insert([
        //         'entrega_id' => $exchange_id,
        //         'desecho_id' => 1,
        //         'cantidad' => 6,
        //         'puntos' => 120,
        //         'created_at' => '2003-08-20 18:31:00',
        //         'updated_at' => '2003-08-20 18:31:00'
        //     ]);

        //     DB::table('exchange_details')->insert([
        //         'entrega_id' => $exchange_id,
        //         'desecho_id' => 2,
        //         'cantidad' => 21,
        //         'puntos' => 210,
        //         'created_at' => '2003-08-20 18:31:00',
        //         'updated_at' => '2003-08-20 18:31:00'
        //     ]);

        //     DB::table('exchange_details')->insert([
        //         'entrega_id' => $exchange_id,
        //         'desecho_id' => 3,
        //         'cantidad' => 36,
        //         'puntos' => 360,
        //         'created_at' => '2003-08-20 18:31:00',
        //         'updated_at' => '2003-08-20 18:31:00'
        //     ]);
    }
}
