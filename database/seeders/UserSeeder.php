<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Manuel Alzate',
            'email' => 'maalzates@gmail.com',
            'password' => bcrypt('Holaquehace6.')
        ])->assignRole('Admin');

        User::factory(5)->create();
    }
}
