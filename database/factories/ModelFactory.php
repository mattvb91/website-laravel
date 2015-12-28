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

$factory->define(App\Models\User::class, function (Faker\Generator $faker)
{
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Article::class, function (\Faker\Generator $faker)
{
    return [
        'user_id'      => factory(\App\Models\User::class)->create()->getKey(),
        'title'        => implode(' ', $faker->words),
        'body'         => $faker->text,
        'published_at' => $faker->dateTime,
        'published'    => 1
    ];
});

$factory->define(\App\Models\Tag::class, function(\Faker\Generator $faker)
{
    return [
      'name' => str_random(6),
    ];
});