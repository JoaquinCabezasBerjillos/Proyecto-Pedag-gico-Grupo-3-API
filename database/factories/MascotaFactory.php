<?php

namespace Database\Factories;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;

class MascotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mascota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'tipo' => $this->faker->name(),
            'chip' => $this->faker->numberBetween($min = 100000, $max = 900000),
            'foto' => $this->faker->image(),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 900000),
        ];
    }
}
