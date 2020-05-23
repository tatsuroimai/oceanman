<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Comment;
use App\User;
use App\Post;
use Carbon\Carbon;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'post_id' => Post::all()->random()->id,
        'comment' => $faker->realText(10),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
