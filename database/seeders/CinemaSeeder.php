<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Salle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Cinema::factory(10)
            ->has(Salle::factory()->count(10))
            ->create();

    }
}
