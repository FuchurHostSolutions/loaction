<?php

namespace Database\Factories;

use App\Models\ServiceItem;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceItemFactory extends Factory
{
    protected $model = ServiceItem::class;

    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'name'       => fake('id_ID')->sentence(4),
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }
}
