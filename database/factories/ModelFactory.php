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
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'puntos' => $faker->numberBetween($min = 100, $max = 1000),
        'imagen' => 'imagen_url_300x300.jpg',
        'direccion' => $faker->address,
        'distrito' => $faker->state,
        'nacimiento' => $faker->dateTime(),
        'remember_token' => str_random(10),
    ];
});

// GENERADOR DE PUNTOS DE ACOPIO
$factory->define(App\Models\CollectionPoint::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->company,
        'direccion' => $faker->address,
        'distrito' => $faker->state,
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
        'puntos' => $faker->numberBetween($min = 500, $max = 2000),
        'tipo' => $faker->numberBetween($min = 1, $max = 3),
        'cantidad' => $faker->numberBetween($min = 20, $max = 200),
        'sponsor_id' => $faker->numberBetween($min = 1, $max = 19),
        'status' => $faker->numberBetween($min = 0, $max = 1),
    ];
});

// GENERADOR DE SPONSORS
$factory->define(App\Models\Sponsor::class, function (Faker\Generator $faker) {

    return [
        'razon' => $faker->company,
        'ruc' => '20542357294',
        'direccion' => $faker->address,
        'telefono' => '987654321',
        'contacto' => $faker->name($gender = null|'male'|'female'),
    ];
});