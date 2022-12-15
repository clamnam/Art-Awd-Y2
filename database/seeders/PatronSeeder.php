<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patron;

class PatronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //here art factory called creating instances of the data required in corrosponding factory

        Patron::factory()
            ->times(3)
            ->hasArts(4)
            ->create();
        //
    }
}
