<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password;

        $faker = Faker\Factory::create('es_PE');
        $fecha = $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years', $timezone = date_default_timezone_get());

        echo "Generando 5 administradores\n";

        $this->adminsReciclapp($fecha);

        DB::table('users')->insert([
            'nombre' => $faker->firstName($gender = 'male'|'female'),
            'apellido' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'password' => $password ?: $password = bcrypt('secret'),
            // 1 = colaborador, 2 = empleado, 3 = administrador
            'tipo' => 3,
            'dni' => $faker->numberBetween($min = 40000000, $max = 80000000),
            // 0 = inactivo | 1 = activo
            // 'estado' => $faker->numberBetween($min = 0, $max = 1),
            'estado' => 1,
            'puntos' => $faker->numberBetween($min = 100, $max = 1000),
            'imagen' => 'default.png',
            'direccion' => $faker->address,
            'distrito' => $faker->state,
            'nacimiento' => $faker->dateTimeBetween($startDate = '-40 years', $endDate = '-18 years', $timezone = date_default_timezone_get()),
            'api_token' => str_random(60),
            'remember_token' => str_random(10),
            'created_at' => $fecha,
            'updated_at' => $fecha
        ]); 
        echo "---- 5 administradores generados\n";

        echo "Generando 10 empleados\n";


        for ($i=0; $i < 10; $i++) { 
            DB::table('users')->insert([
                'nombre' => $faker->firstName($gender = 'male'|'female'),
                'apellido' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => $password ?: $password = bcrypt('secret'),
                // 1 = colaborador, 2 = empleado, 3 = administrador
                'tipo' => 2,
                'dni' => $faker->numberBetween($min = 40000000, $max = 80000000),
                // 0 = inactivo | 1 = activo
                // 'estado' => $faker->numberBetween($min = 0, $max = 1),
                'estado' => 1,
                'puntos' => $faker->numberBetween($min = 100, $max = 1000),
                'imagen' => 'default.png',
                'direccion' => $faker->address,
                'distrito' => $faker->state,
                'nacimiento' => $faker->dateTimeBetween($startDate = '-40 years', $endDate = '-18 years', $timezone = date_default_timezone_get()),
                'api_token' => str_random(60),
                'remember_token' => str_random(10),
                'created_at' => $fecha,
                'updated_at' => $fecha
            ]); 
        }

        echo "---- 10 empleados generados\n";

        echo "Generando 100 usuarios\n";


        for ($i=0; $i < 100; $i++) { 
            DB::table('users')->insert([
                'nombre' => $faker->firstName($gender = 'male'|'female'),
                'apellido' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => $password ?: $password = bcrypt('secret'),
                // 1 = colaborador, 2 = empleado, 3 = administrador
                'tipo' => 1,
                'dni' => $faker->numberBetween($min = 40000000, $max = 80000000),
                // 0 = inactivo | 1 = activo
                // 'estado' => $faker->numberBetween($min = 0, $max = 1),
                'estado' => $faker->numberBetween($min = 0, $max = 1),
                'puntos' => $faker->numberBetween($min = 0, $max = 10000),
                'imagen' => 'default.png',
                'direccion' => $faker->address,
                'distrito' => $faker->state,
                'nacimiento' => $faker->dateTimeBetween($startDate = '-40 years', $endDate = '-18 years', $timezone = date_default_timezone_get()),
                'api_token' => str_random(60),
                'remember_token' => str_random(10),
                'created_at' => $fecha,
                'updated_at' => $fecha
            ]); 
        }

        echo "100 usuarios generados\n";


    }

    public function adminsReciclapp($fecha) {

        static $password;
        $faker = Faker\Factory::create('es_PE');

        // Kenny

        DB::table('users')->insert([
            'nombre' => 'Kenny',
            'apellido' => 'Horna Cárdenas',
            'email' => 'kenny@reciclapp.com',
            'password' => $password ?: $password = bcrypt('password'),
            // 1 = colaborador, 2 = empleado, 3 = administrador
            'tipo' => 3,
            'dni' => 46758272,
            // 0 = inactivo | 1 = activo
            // 'estado' => $faker->numberBetween($min = 0, $max = 1),
            'estado' => 1,
            'puntos' => $faker->numberBetween($min = 100, $max = 1000),
            'imagen' => 'default.png',
            'direccion' => 'Laureano Martinez #163',
            'distrito' => 'Lima',
            'nacimiento' => $faker->dateTimeBetween($startDate = '-25 years', $endDate = '-24 years', $timezone = date_default_timezone_get()),
            'api_token' => str_random(60),
            'remember_token' => str_random(10),
            'created_at' => $fecha,
            'updated_at' => $fecha
        ]);

        // Carlos

        DB::table('users')->insert([
            'nombre' => 'Carlos',
            'apellido' => 'Estrada Mariluz',
            'email' => 'luis@reciclapp.com',
            'password' => $password ?: $password = bcrypt('password'),
            // 1 = colaborador, 2 = empleado, 3 = administrador
            'tipo' => 3,
            'dni' => $faker->numberBetween($min = 40000000, $max = 90000000),
            // 0 = inactivo | 1 = activo
            // 'estado' => $faker->numberBetween($min = 0, $max = 1),
            'estado' => 1,
            'puntos' => $faker->numberBetween($min = 100, $max = 1000),
            'imagen' => 'default.png',
            'direccion' => $faker->address,
            'distrito' => 'Santa Anita',
            'nacimiento' => $faker->dateTimeBetween($startDate = '-37 years', $endDate = '-29 years', $timezone = date_default_timezone_get()),
            'api_token' => str_random(60),
            'remember_token' => str_random(10),
            'created_at' => $fecha,
            'updated_at' => $fecha
        ]); 


        // Gustavo

        DB::table('users')->insert([
            'nombre' => 'Gustavo',
            'apellido' => 'Huaracc Huarcaya',
            'email' => 'gustavo@reciclapp.com',
            'password' => $password ?: $password = bcrypt('password'),
            // 1 = colaborador, 2 = empleado, 3 = administrador
            'tipo' => 3,
            'dni' => $faker->numberBetween($min = 40000000, $max = 90000000),
            // 0 = inactivo | 1 = activo
            // 'estado' => $faker->numberBetween($min = 0, $max = 1),
            'estado' => 1,
            'puntos' => $faker->numberBetween($min = 100, $max = 1000),
            'imagen' => 'default.png',
            'direccion' => $faker->address,
            'distrito' => 'San Isidro',
            'nacimiento' => $faker->dateTimeBetween($startDate = '-22 years', $endDate = '-21 years', $timezone = date_default_timezone_get()),
            'api_token' => str_random(60),
            'remember_token' => str_random(10),
            'created_at' => $fecha,
            'updated_at' => $fecha
        ]); 


        // Zea

        DB::table('users')->insert([
            'nombre' => 'José',
            'apellido' => 'Zea Guerrero',
            'email' => 'zea@reciclapp.com',
            'password' => $password ?: $password = bcrypt('password'),
            // 1 = colaborador, 2 = empleado, 3 = administrador
            'tipo' => 3,
            'dni' => $faker->numberBetween($min = 40000000, $max = 90000000),
            // 0 = inactivo | 1 = activo
            // 'estado' => $faker->numberBetween($min = 0, $max = 1),
            'estado' => 1,
            'puntos' => $faker->numberBetween($min = 100, $max = 1000),
            'imagen' => 'default.png',
            'direccion' => $faker->address,
            'distrito' => 'San Isidro',
            'nacimiento' => $faker->dateTimeBetween($startDate = '-22 years', $endDate = '-21 years', $timezone = date_default_timezone_get()),
            'api_token' => str_random(60),
            'remember_token' => str_random(10),
            'created_at' => $fecha,
            'updated_at' => $fecha
        ]); 
    }
}
