<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Offer\Entities\Offer::class, function (Faker $faker) {

	$dirPath = public_path('assets/img/offer', $mode = 0777, true, true);

    if(!File::exists($dirPath)){
        File::makeDirectory($dirPath);
    }

    $filePath =$faker->image($dirPath,800,300);
    
    return [
        'code' => $faker->unique()->uuid,
        'name' => $faker->realText(60),
        'image' => str_after($filePath, 'public'),
        'description' => $faker->paragraph(100),
    ];
});
