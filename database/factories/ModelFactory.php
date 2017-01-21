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

use App\{Category, Role, User};

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'role_id' => $faker->numberBetween($min = 2, $max = 3),
        'remember_token' => str_random(10),
    ];
});
$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->text,
    ];
});

$factory->define(Role::class, function (Faker\Generator $faker) {
    return array(
        'nombre' => $faker->unique()->word,
        'descripcion' => $faker->text,
    );
});