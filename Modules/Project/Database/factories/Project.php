<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Project\Entities\Project::class, function (Faker $faker) {
	$articleTitle = $faker->realText(60);

    $dirPath = public_path('assets/img/project', $mode = 0777, true, true);

    if(!File::exists($dirPath)){
        File::makeDirectory($dirPath);
    }
    
    $filePath =$faker->image($dirPath,800,300);

    return [
        'code' => $faker->unique()->uuid,
        'title' => $articleTitle,
        'slug' => str_slug($articleTitle, '-'),
        'tags' => $faker->word,
        'logo' => str_after($filePath, 'public'),
        'idea' => $faker->sentence(),
        'excerpt' => $faker->sentence(),
        'description' => $faker->paragraph(50),
        'published' => $faker->randomElement(['published','unpublished']),
        'status' => $faker->randomElement(['en_cours','terminé','annulé']),
        'owner' => $faker->firstName,
        'phone' => $faker->e164PhoneNumber,
        'location' => $faker->address,
        'email' => $faker->email,
        'published_at' => $faker->dateTimeInInterval($startDate = '0 years', $interval = '+ 60 days', $timezone = null),
        'last_updated_by' => function (array $post) {
            return App\Models\User::inRandomOrder()->first()->id;
        },
        'theme_id' => function (array $post) {
            return \Modules\Project\Entities\Theme::inRandomOrder()->first()->id;
        },
    ];
});
