<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Reservation;
use App\Models\Seance;
use App\Models\User;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'quantity' => $this->faker->randomNumber(1),
            'total_price' => $this->faker->randomFloat(2, 9.99, 99.99),
            'date_order' => $this->faker->dateTime(),
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->e164PhoneNumber,
            'seance_id' => Seance::factory(),
            'user_id' => User::factory(),
        ];
    }
}
