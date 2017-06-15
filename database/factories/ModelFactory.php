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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nombre' => $faker->firstName($gender = null|'male'|'female'),
        'apellido' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        // 1 = colaborador, 2 = empleado, 3 = administrador
        'tipo' => $faker->numberBetween($min = 1, $max = 3),
        'dni' => '46758272',
        // 0 = inactivo | 1 = activo
        'estado' => $faker->numberBetween($min = 0, $max = 1),
        'puntos' => $faker->numberBetween($min = 100, $max = 1000),
        'imagen' => 'imagen_url_300x300.jpg',
        'direccion' => $faker->address,
        'distrito' => $faker->state,
        'nacimiento' => $faker->dateTime(),
        'api_token' => str_random(60),
        'remember_token' => str_random(10),
         'created_at' => $faker->dateTime(),
         'updated_at' => $faker->dateTime(),
    ];
});

// GENERADOR DE PUNTOS DE ACOPIO
$factory->define(App\Models\CollectionPoint::class, function (Faker\Generator $faker) {

    $nombre = 'Punto de acopio ' . str_random(1);

    return [
        'nombre' => $nombre,
        'direccion' => $faker->address,
        'distrito' => $faker->state,
        'latitud' => $faker->latitude($min = -12.10, $max = -12.03),
        'longitud' => $faker->longitude($min = -77.06, $max = -76.97),
        'papel_max' => $faker->numberBetween($min = 1000, $max = 9000),
        'vidrio_max' => $faker->numberBetween($min = 1000, $max = 9000),
        'plastico_max' => $faker->numberBetween($min = 1000, $max = 9000),
        'papel_actual' => $faker->numberBetween($min = 500, $max = 1000),
        'vidrio_actual' => $faker->numberBetween($min = 500, $max = 1000),
        'plastico_actual' => $faker->numberBetween($min = 500, $max = 1000),
    ];
});

// GENERADOR DE BENEFICIOS
$factory->define(App\Models\Benefit::class, function (Faker\Generator $faker) {

    return [
        'nombre' => 'Producto '.$faker->numberBetween($min = 10, $max = 100),
        'descripcion' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'req_puntos' => $faker->numberBetween($min = 500, $max = 2000),
        'tipo' => $faker->numberBetween($min = 1, $max = 3),
        'cantidad' => $faker->numberBetween($min = 20, $max = 200),
        'sponsor_id' => $faker->numberBetween($min = 1, $max = 19),
        'estado' => $faker->numberBetween($min = 0, $max = 1),
         'created_at' => $faker->dateTime(),
         'updated_at' => $faker->dateTime(),
    ];
});

// GENERADOR DE SPONSORS
$factory->define(App\Models\Sponsor::class, function (Faker\Generator $faker) {

    return [
        'razon_social' => $faker->company,
        'ruc' => '20542357294',
        'direccion' => $faker->address,
        'telefono' => '987654321',
        'contacto' => $faker->name($gender = null|'male'|'female'),
        'distrito' =>$faker->state,
         'created_at' => $faker->dateTime(),
         'updated_at' => $faker->dateTime(),
    ];
});
