<?php

namespace Database\Factories;

use App\Models\Equipo;

use Illuminate\Database\Eloquent\Factories\Factory;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->word,
            'ciudad' => $this->faker->unique()->word,
        ];
    }
}


?>
