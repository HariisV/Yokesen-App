<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i=0; $i < 20; $i++) { 
        $faker = \Faker\Factory::create('id_ID');
        User::insert([
            'name' => $faker->name(),
            'no_telp' => $faker->phoneNumber(),
            'alamat' => $faker->address(),
            'email' => $faker->safeEmail(),
            "password" => "333",
            "created_at" => $faker->date()
        ]);
       }
    }
}
