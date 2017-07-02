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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(123456),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Realty::class, function(Faker\Generator $faker){
	$type = ['rent' , 'sell'];
	return [
		'country'=>$faker->name,
		'city' => $faker->name,
		'region'=>$faker->name,
		'street'=>$faker->name,
		'house_no'=>rand(1,99),
		'apartment_no'=>rand(1,99),
		
		'type'=>$type[rand(0,1)],
		'area'=>rand(0,9999),
		'price'=>rand(0,9999),
		'description'=>$faker->text,
		'user_id'=>1,
	];
});