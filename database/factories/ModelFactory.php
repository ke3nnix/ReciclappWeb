<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// GENERADOR DE USUARIOS
// $factory->define(App\Models\User::class, function (Faker\Generator $faker) {
//     $faker = Faker\Factory::create('es_PE');

//     static $password;

//     return [
//         'nombre' => $faker->firstName($gender = 'male'|'female'),
//         'apellido' => $faker->lastName,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         // 1 = colaborador, 2 = empleado, 3 = administrador
//         'tipo' => $faker->numberBetween($min = 1, $max = 2),
//         'dni' => $faker->dni(),
//         // 0 = inactivo | 1 = activo
//         'estado' => $faker->numberBetween($min = 0, $max = 1),
//         'puntos' => $faker->numberBetween($min = 100, $max = 1000),
//         'imagen' => 'imagen_url_300x300.jpg',
//         'direccion' => $faker->address,
//         'distrito' => $faker->state,
//         'nacimiento' => $faker->dateTime(),
//         'api_token' => str_random(60),
//         'remember_token' => str_random(10),
//         'created_at' => $faker->dateTime(),
//         'updated_at' => $faker->dateTime(),
//     ];
// });

// GENERADOR DE PUNTOS DE ACOPIO
// $factory->define(App\Models\CollectionPoint::class, function (Faker\Generator $faker) {
//     $faker = Faker\Factory::create('es_PE');

//     $nombre = 'Punto de acopio ' . str_random(1);

//     return [
//         'nombre' => $nombre,
//         'direccion' => $faker->address,
//         'distrito' => $faker->state,
//         'latitud' => $faker->latitude($min = -12.10, $max = -12.03),
//         'longitud' => $faker->longitude($min = -77.06, $max = -76.97),
//         'papel_max' => ($faker->numberBetween($min = 5, $max = 9))*1000,
//         'vidrio_max' => ($faker->numberBetween($min = 5, $max = 9))*1000,
//         'plastico_max' => ($faker->numberBetween($min = 7, $max = 9))*1000,
//         'papel_actual' => $faker->numberBetween($min = 0, $max = 1000),
//         'vidrio_actual' => $faker->numberBetween($min = 0, $max = 1000),
//         'plastico_actual' => $faker->numberBetween($min = 2000, $max = 7000),
//         'estado' => 1,
//     ];
// });

// GENERADOR DE BENEFICIOS
// $factory->define(App\Models\Benefit::class, function (Faker\Generator $faker) {
//     $faker = Faker\Factory::create('es_PE');

//     return [
//         'nombre' => 'Beneficio '.$faker->numberBetween($min = 10, $max = 100),
//         'descripcion' => $faker->realText($maxNbChars = 200, $indexSize = 2),
//         'req_puntos' => $faker->numberBetween($min = 500, $max = 2000),
//         'tipo' => $faker->numberBetween($min = 1, $max = 3),
//         'cantidad' => $faker->numberBetween($min = 20, $max = 200),
//         'sponsor_id' => $faker->numberBetween($min = 1, $max = 19),
//         'estado' => $faker->numberBetween($min = 0, $max = 1),
//          'created_at' => $faker->dateTime(),
//          'updated_at' => $faker->dateTime(),
//     ];
// });

// GENERADOR DE SPONSORS
 $factory->define(App\Models\Sponsor::class, function (Faker\Generator $faker) {
     $faker = Faker\Factory::create('es_PE');

     $fecha = $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years', $timezone = date_default_timezone_get());

     return [
         'razon_social' => $faker->company,
         'ruc' => $faker->numerify('20#########'),
         'direccion' => $faker->address,
         'telefono' => $faker->numerify('+01 ###-####'),
         'contacto' => $faker->name($gender = null|'male'|'female'),
         'distrito' =>$faker->state,
         'estado' => 1,
          'created_at' => $fecha,
          'updated_at' => $fecha,
     ];
 });
