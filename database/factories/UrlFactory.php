<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Url;
use Faker\Generator as Faker;

$factory->define( Url::class, function ( Faker $faker ) {
    return [
        'code'    => from_base10_to_base62( rand( 10, 200000000 ) ),
        'url'     => $faker->url,
        "user_id" => null
    ];
} );
