<?php

use App\Models\Role;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement([User::TYPE_ADMIN, User::TYPE_USER]),
        'name' => $faker->word,
    ];
});
