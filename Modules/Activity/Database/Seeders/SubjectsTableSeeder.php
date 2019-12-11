<?php

namespace Modules\Activity\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(\Modules\Activity\Entities\Subject::class, 3)->create();
        factory(\Modules\Activity\Entities\Subject::class, 2)->create();
    }
}
