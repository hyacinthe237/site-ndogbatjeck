<?php

namespace Modules\Offer\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OfferDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        factory(\Modules\Offer\Entities\Offer::class, 6)->create();
        // $this->call("OthersTableSeeder");
    }
}
