<?php

namespace Database\Seeders;

use App\Models\Seance;
use Illuminate\Database\Seeder;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seance::factory()->count(5)->create();
    }
}
