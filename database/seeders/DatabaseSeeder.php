<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//calles other additional seeders to splitt up the process
//Use the call methods to execute additional seeder clases
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Need to make ROleSeeder rund first. Or else the code in the UserSeeder wont work
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GameSeeder::class);
    }
}
