<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),

        'body' => $faker->paragraph(10),

        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
