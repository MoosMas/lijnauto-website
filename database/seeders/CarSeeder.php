<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory()
            ->hasLogs(50)
            ->create([
                'name' => 'Sjaak',
                'description' => 'Onze eerste auto'
            ]);
        
        Car::factory()
            ->count(5)
            ->hasLogs(50)
            ->create();
    }
}
