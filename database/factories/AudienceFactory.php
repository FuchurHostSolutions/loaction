<?php

namespace Database\Factories;

use App\Models\Audience;
use Illuminate\Database\Eloquent\Factories\Factory;

class AudienceFactory extends Factory
{
    protected $model = Audience::class;

    public function definition(): array
    {
        return [
            'number'     => str_pad(fake()->unique()->numberBetween(1, 99), 2, '0', STR_PAD_LEFT),
            'title'      => fake('id_ID')->words(3, true),
            'text'       => fake('id_ID')->sentence(12),
            'sort_order' => fake()->numberBetween(0, 10),
            'is_active'  => true,
        ];
    }
}
