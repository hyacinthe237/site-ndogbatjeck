<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Page\Entities\Page::class, function (Faker $faker) {
	$articleTitle = $faker->realText(60);

    $dirPath = public_path('assets/img/page', $mode = 0777, true, true);

    if(!File::exists($dirPath)){
        File::makeDirectory($dirPath);
    }

    $filePath =$faker->image($dirPath,800,300);

    return [
        'title' => $articleTitle,
        'slug' => str_slug($articleTitle, '-'),
        'tags' => $faker->word,
        'image' => str_after($filePath, 'public'),
        'template' => $faker->word,
        'type' => $faker->randomElement(['bienvenue','presentation','bureau','apropos','organisation','membres','statuts']),
        'excerpt' => $faker->sentence(),
        'content' => $faker->paragraph(100),
        'status' => $faker->randomElement(['published','unpublished']),
        'is_commentable' => $faker->randomElement(['0','1']),
        'published_at' => $faker->dateTimeInInterval($startDate = '0 years', $interval = '+ 60 days', $timezone = null),
        'last_updated_by' => function (array $post) {
            return App\Models\User::inRandomOrder()->first()->id;
        },
    ];
});
