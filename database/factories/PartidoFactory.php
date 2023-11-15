<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partido>
 */
class PartidoFactory extends Factory
{
        /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partido>
     *
     * @var string
     */
   protected $model = Partido::class;

   public function definition(): array
   {
       return [
           'equipo_local' => function () {
               return Equipo::factory()->create()->id;
           },
           'equipo_visitante' => function () {
               return Equipo::factory()->create()->id;
           },
           'ganador' => $this->faker->randomElement(['equipo_local', 'equipo_visitante']),
           'fecha' => $this->faker->date(),
       ];
   }
}


