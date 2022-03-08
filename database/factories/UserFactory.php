<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['Maschio', 'Femmina']);
    return [        
        'name' => $faker -> firstName($gender),    
        // 'name' => $faker -> firstName($gender ='male'|'female'),
        'lastname' => $faker -> lastName(),
        'date_of_birth'=> $faker -> dateTimeBetween($startDate ='-60 years', $endDate ='-18 years', $timezone = null),
        'gender' => $gender,
        'gender_like' => $faker -> randomElement(['Maschio', 'Femmina']),
        'email' => $faker ->unique()-> freeEmail(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
