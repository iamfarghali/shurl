<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Url;
use App\User;
use Faker\Generator as Faker;

$factory->define( Url::class, function ( Faker $faker ) {
    $user_id = rand( 0, 1 ) ? User::pluck( 'id' )->random() : null;
    return [
        'code'    => from_base10_to_base62( rand( 10, 200000000 ) ),
        'url'     => $faker->url,
        "user_id" => $user_id
    ];
} );
