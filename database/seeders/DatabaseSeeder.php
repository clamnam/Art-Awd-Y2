<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //called seeders on db:seed
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PatronSeeder::class);
        $this->call(StyleSeeder::class);
    }
}
