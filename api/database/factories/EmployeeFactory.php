<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company_id' => 1,
        'department_id' => $faker->numberBetween($min=1,$max=3),
        'mobile' => $faker->phoneNumber,
        'email' => $faker->safeEmail
    ];
});
