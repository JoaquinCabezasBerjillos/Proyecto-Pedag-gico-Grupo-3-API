<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'nombre' =>$this->faker->word(),
        'precio' =>$this->faker->numberBetween($min = 0, $max = 99999),       
        'categoria' =>$this->faker->sentence($nbWords = 6, $variableNbWords = true), 
        'descripcion' =>$this->faker->realText($maxNbChars = 200, $indexSize = 2), 
        'foto' =>$this->faker->imageUrl(200, 200, 'animals', true, 'cats')
        
        ];
    }
}
