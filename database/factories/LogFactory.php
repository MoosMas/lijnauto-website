<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Log;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    protected $model = Log::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $level = $this->faker->randomElement(Log::LEVELS);
        $messages = [
            'CHECKPOINT' => [
                $this->faker->randomElement(Log::CHECKPOINT_COLORS)
            ],
            'INFO' => [
                'Ik ben aangekomen bij mijn oplaadpunt',
                'Opdracht voltooid. Deze route duurde ' . $this->faker->numberBetween(3, 7) . ' checkpoints'
            ],
            'WARNING' => [
                'Mijn pad is geblokkeerd'
            ],
            'ERROR' => [
                'Mijn batterij is op ' . $this->faker->numberBetween(0, 5) . '% en ik kan niet terug naar mijn oplaadstation'
            ]
        ];

        return [
            'car_id' => Car::all()->random()->id,
            'level' => $level,
            'message' => $this->faker->randomElement($messages[$level]),
            'timestamp' => $this->faker->dateTimeBetween('-2 weeks', 'now')
        ];
    }
}
