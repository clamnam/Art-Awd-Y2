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
        // creates 50 different values
        Art::factory()->times(50)->create();
    }
}
