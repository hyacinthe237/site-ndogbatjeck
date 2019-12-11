<?php


use Faker\Generator as Faker;

$factory->define(\Modules\Team\Entities\Member::class, function (Faker $faker) {

	$dirPath = public_path('assets/img/team', $mode = 0777, true, true);

    if(!File::exists($dirPath)){
        File::makeDirectory($dirPath);
    }
    
    $filePath =$faker->image($dirPath,800,300);

    return [
        'code' => $faker->unique()->uuid,
        'name' => $faker->name,
        'image' => str_after($filePath, 'public'),
        'description' => $faker->paragraph(100),
        'position' => $faker->name,
        'remember_token' => str_random(10),
    ];
});
