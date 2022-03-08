<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Interest;
use Faker\Generator as Faker;

$factory->define(Interest::class, function (Faker $faker) {
    return [
        'interest' => $faker -> randomElement([
            'Leggere',
            'Dipingere',
            'Visitare musei',
            'Ascoltare musica',
            'Guardare film',
            'sport',
            'Fotografia',
            'Cucina',
            'Scrittura',
            'Viaggiare'
        ])
    ];
});
