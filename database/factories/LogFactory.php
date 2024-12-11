<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Log;
use Carbon\Carbon;
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
        return [
            'car_id' => Car::all()->random()->id,
            'checkpoint_color' => $this->faker->colorName(),
            'timestamp' => $this->faker->dateTime()
        ];
    }
}
