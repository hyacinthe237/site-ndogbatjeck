<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Blog\Entities\PostCategory::class, function (Faker $faker) {
	$categoryTitle = $faker->jobTitle();
    return [
        'code' => $faker->unique()->uuid,
        'name' => $categoryTitle,
        'slug' => str_slug($categoryTitle, '-'),
        'parent_id' => function (array $post) {
        	$category=\Modules\Blog\Entities\PostCategory::inRandomOrder()->where('name','!=','Uncategorized')->first();
        	if($category)
            	return $category->id;
            else
            	return null;
        },
    ];
});
