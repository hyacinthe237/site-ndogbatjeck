<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Activity\Entities\Subject::class, function (Faker $faker) {
	$categoryTitle = $faker->jobTitle();
    return [
        'code' => $faker->unique()->uuid,
        'name' => $categoryTitle,
        'slug' => str_slug($categoryTitle, '-'),
        'parent_id' => function (array $subject) {
        	$subject=\Modules\Activity\Entities\Subject::inRandomOrder()->first();
        	if($subject)
            	return $subject->id;
            else
            	return null;
        },
    ];
});
