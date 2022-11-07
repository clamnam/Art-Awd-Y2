<?php

namespace Database\Seeders;
use App\Models\Art;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // Seeder is used to create fake data by using table name
        //here it creates 50 sets of fake data
        Art::factory()->times(50)->create();
    }
}
