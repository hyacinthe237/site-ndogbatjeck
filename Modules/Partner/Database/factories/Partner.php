<?php


use Faker\Generator as Faker;

$factory->define(\Modules\Partner\Entities\Partner::class, function (Faker $faker) {

	$dirPath = public_path('assets/img/partners', $mode = 0777, true, true);

    if(!File::exists($dirPath)){
        File::makeDirectory($dirPath);
    }

    $filePath =$faker->image($dirPath,800,300);

    return [
        'code' => $faker->unique()->uuid,
        'name' => $faker->name,
        'image' => str_after($filePath, 'public'),
        'link' => 'http://boukarou.staging.izytechgroup.com',
        'description' => $faker->paragraph(100),
        'category' => $faker->randomElement(['Gold','Silver','Platinum']),
        'remember_token' => str_random(10),
    ];
});
