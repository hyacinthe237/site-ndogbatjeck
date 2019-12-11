<?php

namespace Modules\Project\Database\Seeders;


use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $themes = [
            ['id' => 1,
            'code' => '05d3df40-7952-11e8-844c-d9777b6f909',
            'name' => 'Economie Circulaire',
            'slug' => 'economie-circulaire',
            'image' => '../assets/img/life-units/image-LeBoukarou-economie-circulaire-life-unit.png',
            'parent_id' => null],
            ['id' => 2,
            'code' => '05d3df40-7952-11e8-844c-d9777b6f908',
            'name' => 'Ville durable',
            'slug' => 'ville-durable',
            'image' => '../assets/img/life-units/image-LeBoukarou-ville-durable-life-unit.png',
            'parent_id' => null],
            ['id' => 3,
            'code' => '05d3df40-7952-11e8-844c-d9777b6f907',
            'name' => 'Santé - Sport - Bien-être',
            'slug' => 'sante-sport-bien-etre',
            'image' => '../assets/img/life-units/image-LeBoukarou-sante-sport-bien-etre-life-unit.png',
            'parent_id' => null],
            ['id' => 4,
            'code' => '05d3df40-7952-11e8-844c-d9777b6f906',
            'name' => 'Industries - Culturelles et Créatives',
            'slug' => 'idustries-culturelles-et-creatives',
            'image' => '../assets/img/life-units/image-LeBoukarou-industries-life-unit.png',
            'parent_id' => null],
            ['id' => 5,
            'code' => '05d3df40-7952-11e8-844c-d9777b6f905',
            'name' => 'Mobilité',
            'slug' => 'mobilité',
            'image' => '../assets/img/life-units/image-LeBoukarou-mobilite-life-unit.png',
            'parent_id' => null],
            ['id' => 6,
            'code' => '05d3df40-7952-11e8-844c-d9777b6f904',
            'name' => 'Energie & Eau',
            'slug' => 'energie-eau',
            'image' => '../assets/img/life-units/image-LeBoukarou-eau-energie-life-unit.png',
            'parent_id' => null],
            ['id' => 7,
            'code' => '05d3df40-7952-11e8-844c-d9777b6f903',
            'name' => 'Education - Citoyenneté - Vivre ensemble',
            'slug' => 'education-Citoyennete-vivre-ensemble',
            'image' => '../assets/img/life-units/image-LeBoukarou-vivre-ensemble-life-unit.png',
            'parent_id' => null],
           ['id' => 8,
           'code' => '05d3df40-7952-11e8-844c-d9777b6f902',
           'name' => 'Environnement',
           'slug' => 'environnement',
           'image' => '../assets/img/life-units/image-LeBoukarou-environnement-life-unit.png',
           'parent_id' => null],
            ['id' => 9,
            'code' => '05d3df40-7952-11e8-844c-d9777b6f901',
            'name' => 'Agriculture - Agro-industrie - Sécurité alimentaire',
            'slug' => 'agriculture-agro-industrie-securité-alimentaire',
            'image' => '../assets/img/life-units/image-LeBoukarou-agriculture-life-unit.png',
            'parent_id' => null]           
        ];

        foreach ($themes as $theme) {
            DB::table('themes')->insert([
                'id' => $theme['id'],
                'code' => $theme['code'],
                'name' => $theme['name'],
                'slug' => $theme['slug'],
                'image' => $theme['image'],
                'parent_id' => $theme['parent_id'],
                'created_at' => '2018-08-05',
                'updated_at' => '2018-08-05'
            ]);
        }
    }
}
