<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
             'code' => '05d3df40-7952-11e8-844c-d9777b6f949c',
             'firstname' => 'Boukarou',
             'lastname' => 'Admin',
             'email' => 'admin@boukarou.com',
             'password' => bcrypt('secret'),
             'phone' => '+237698196943',
             'api_token' => str_random(60),
             'status' => 'active',
             'photo' => 'https://lorempixel.com/640/480/?74611',
             'dob' => '2018-08-05',
             'gender' => 'male',
             'role_id' => App\Models\Role::Where('name','admin')->first()->id
         ]);
    }
}
