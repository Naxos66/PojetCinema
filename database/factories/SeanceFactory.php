<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Film;
use App\Models\Salle;
use App\Models\Seance;

class SeanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTime(),
            'price' => $this->faker->randomFloat(2, 0, 9.99),
            'salle_id' => Salle::factory(),
            'film_id' => Film::factory(),
        ];
    }
}
