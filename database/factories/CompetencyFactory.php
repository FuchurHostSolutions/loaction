<?php

namespace Database\Factories;

use App\Models\Competency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetencyFactory extends Factory
{
    protected $model = Competency::class;

    public function definition(): array
    {
        return [
            'role'       => fake()->randomElement(['Staff', 'Supervisor', 'Manager']),
            'text'       => fake('id_ID')->sentence(10),
            'icon'       => null,
            'sort_order' => fake()->numberBetween(0, 10),
            'is_active'  => true,
        ];
    }
}
