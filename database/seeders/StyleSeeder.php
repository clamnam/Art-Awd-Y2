<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Style;
use App\Models\Art;



class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Style::factory()
            ->times(3)
            ->create();

        foreach (Art::all() as $art) {
            $styles = Style::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $art->style()->attach($styles);
        }
    }
}
