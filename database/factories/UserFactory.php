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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'role' => $faker->word,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'type' => $faker->word,
        'description' => $faker->text,
        'status' => $faker->boolean,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'type' => $faker->word,
        'description' => $faker->text,
        'price' => $faker->randomFloat($nbMaxDecimals = Null , $min = 10, $max = 50),
        'status' => $faker->boolean,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'menu_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});

$factory->define(App\Meal::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'price' => $faker->randomFloat($nbMaxDecimals = Null , $min = 10, $max = 50),
        'status' => $faker->boolean,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'city' => $faker->city,
        'phone' => $faker->e164PhoneNumber,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ];
});

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'total' => $faker->randomFloat($nbMaxDecimals = Null , $min = 10, $max = 50),
        'CashIn' =>$faker->randomFloat($nbMaxDecimals = Null , $min = 10, $max = 50),
        'payment' => $faker->randomFloat($nbMaxDecimals = Null , $min = 10, $max = 50),
        'change' => $faker->randomFloat($nbMaxDecimals = Null , $min = 10, $max = 50),
        'status' => $faker->boolean,
        //'customer_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
	    'status' => $faker->boolean,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'customer_id' => $faker->numberBetween($min = 1, $max = 20),
        'order_id' => $faker->numberBetween($min = 1, $max = 20),
        'rate' => $faker->numberBetween($min = 1, $max = 5),
    ];
});

$factory->define(App\OrderItem::class, function (Faker $faker) {
    return [

		'order_id' => $faker->numberBetween($min = 1, $max = 20),      
  		'item_id' => $faker->numberBetween($min = 1, $max = 15),
    ];
});

$factory->define(App\OrderMeal::class, function (Faker $faker) {
    return [

		'order_id' => $faker->numberBetween($min = 1, $max = 20),      
  		'meal_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});

$factory->define(App\UserOrder::class, function (Faker $faker) {
    return [

		'order_id' => $faker->numberBetween($min = 1, $max = 20),      
  		'user_id' => $faker->numberBetween($min = 1, $max = 20),
  		'type' => $faker->word,
    ];
});
