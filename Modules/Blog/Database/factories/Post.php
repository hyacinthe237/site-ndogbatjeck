<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Blog\Entities\Post::class, function (Faker $faker) {
	$articleTitle = $faker->realText(60);

    $dirPath = public_path('assets/img/blog', $mode = 0777, true, true);

    if(!File::exists($dirPath)){
        File::makeDirectory($dirPath);
    }

    $filePath =$faker->image($dirPath,800,300);

    return [
        'code' => $faker->unique()->uuid,
        'title' => $articleTitle,
        'slug' => str_slug($articleTitle, '-'),
        'tags' => $faker->word,
        'image' => str_after($filePath, 'public'),
        'template' => $faker->word,
        'excerpt' => $faker->sentence(),
        'content' => $faker->paragraph(100),
        'status' => $faker->randomElement(['published','unpublished']),
        'is_commentable' => $faker->randomElement(['0','1']),
        'is_anchor' => $faker->randomElement(['0','1']),
        'published_at' => $faker->dateTimeInInterval($startDate = '0 years', $interval = '+ 60 days', $timezone = null),
        'last_updated_by' => function (array $post) {
            return App\Models\User::inRandomOrder()->first()->id;
        },
        'category_id' => function (array $post) {
            return \Modules\Blog\Entities\PostCategory::inRandomOrder()->first()->id;
        },
    ];
});
