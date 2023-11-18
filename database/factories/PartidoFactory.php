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
    $equipoLocal = Equipo::factory()->create();
    $equipoVisitante = Equipo::factory()->create();

    return [
        'equipo_local_id' => $equipoLocal->id,
        'equipo_visitante_id' => $equipoVisitante->id,
        'ganador' => $this->faker->randomElement([$equipoLocal->id, $equipoVisitante->id]),
        'fecha' => $this->faker->date(),
    ];
}

}


