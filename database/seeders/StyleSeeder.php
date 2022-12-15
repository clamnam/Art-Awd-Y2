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
        //here style factory called creating instances of the data required in corrosponding factory

        Style::factory()
            ->times(3)
            ->create();
        // implants one of the styles id into the art tables fk style_id
        foreach (Art::all() as $art) {
            $styles = Style::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $art->style()->attach($styles);
        }
    }
}
