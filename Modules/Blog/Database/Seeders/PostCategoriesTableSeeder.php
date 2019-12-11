<?php

namespace Modules\Blog\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PostCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('post_categories')->insert([
             'code' => '05d3df40-7952-11e8-844c-d9777b6f949c',
             'name' => 'Uncategorized',
             'slug' => 'uncategorized',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

        DB::table('post_categories')->insert([
             'code' => '05d3df40-7952-11e8-844c-d9777b6f949c',
             'name' => 'Actualites',
             'slug' => 'actualites',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

        factory(\Modules\Blog\Entities\PostCategory::class, 3)->create();
        factory(\Modules\Blog\Entities\PostCategory::class, 2)->create();
    }
}
