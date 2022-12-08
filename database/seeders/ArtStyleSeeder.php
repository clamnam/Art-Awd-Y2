<?php

namespace Database\Seeders;

use App\Models\Art_style;
use App\Models\Art;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Art_style::factory()
            ->times(3)
            ->create();

        foreach (Art::all() as $art) {
            $art_styles = Art_style::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $art->art_styles()->attach($art_styles);
        }
    }
}
