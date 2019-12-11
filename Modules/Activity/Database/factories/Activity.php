<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Activity\Entities\Activity::class, function (Faker $faker) {
	$articleTitle = $faker->realText(60);

    $dirPath = public_path('assets/img/activity', $mode = 0777, true, true);

    if(!File::exists($dirPath)){
        File::makeDirectory($dirPath);
    }

    $filePath =$faker->image($dirPath,800,300);

    return [
        'code' => $faker->unique()->uuid,
        'title' => $articleTitle,
        'slug' => str_slug($articleTitle, '-'),
        'tags' => $faker->word,
        //'image' => $faker->imageUrl(1500, 1500, 'people'), 
        'image' => str_after($filePath, 'public'),
        'location' => $faker->name,
        'excerpt' => $faker->paragraph(100),
        'description' => $faker->paragraph(100),
        'published' => $faker->randomElement(['published','unpublished']),
        'is_commentable' => $faker->randomElement(['0','1']),
        'is_anchor' => $faker->randomElement(['0','1']),
        'is_frequent' => $faker->randomElement(['0','1']),
        'published_at' => $faker->dateTimeInInterval($startDate = '0 years', $interval = '+ 60 days', $timezone = null),
        'date_activity' => $faker->dateTimeInInterval($startDate = '0 years', $interval = '+ 60 days', $timezone = null),
        'time_activity' => $faker->dateTimeInInterval($startDate = '0 years', $interval = '+ 60 days', $timezone = null),
        'last_updated_by' => function (array $post) {
            return App\Models\User::inRandomOrder()->first()->id;
        },
        'subject_id' => function (array $post) {
            return \Modules\Activity\Entities\Subject::inRandomOrder()->first()->id;
        },
    ];
});
