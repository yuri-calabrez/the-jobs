<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'login_type' => 'default',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Candidate::class, function (Faker $faker){
    return [
        'headline' => $faker->sentence,
        'description' => $faker->paragraph,
        'salary' => $faker->randomFloat(2, 1, 3),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'age' => rand(18, 50)
    ];
});

$factory->define(App\Models\Company::class, function (Faker $faker){
    return [
        'name' => $faker->company,
        'headline' => $faker->sentence,
        'description' => $faker->paragraph,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'foundation' => $faker->date(),
        'company_email' => $faker->unique()->companyEmail,
        'company_detail' => $faker->paragraph
    ];
});

$factory->define(\App\Models\Education::class, function (Faker $faker){
   $repository = app(\App\Contracts\Repositories\CandidateRepository::class);
   $candidate_id = $repository->all()->random()->id;

   return [
       'candidate_id' => $candidate_id,
       'degree' => $faker->sentence,
       'major' => $faker->word,
       'institute' => $faker->sentence,
       'description' => $faker->sentence(10),
       'start' => rand(1970, 2030),
       'end' => rand(1970, 2030),
   ];
});
