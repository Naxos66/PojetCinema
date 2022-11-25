<?php

namespace Database\Seeders;

use App\Models\Friandise;
use Illuminate\Database\Seeder;

class FriandiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Friandise::factory()->count(5)->create();
    }
}
