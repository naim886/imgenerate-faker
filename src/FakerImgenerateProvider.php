<?php

namespace Naim886\Imgenerate;

use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class FakerImgenerateProvider extends ServiceProvider
{
    public function register()
    {
        // Bind the ImgGenerateExtension to the Faker instance
        $this->app->extend(Generator::class, function (Generator $faker) {
            $faker->addProvider(new ImgGenerateExtension());
            return $faker;
        });
    }
}