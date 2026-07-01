<?php

namespace Database\Factories;

use App\Models\Consultation;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultationFactory extends Factory
{
    protected $model = Consultation::class;

    public function definition(): array
    {
        return [
            'name'         => fake('id_ID')->name(),
            'email'        => fake('id_ID')->safeEmail(),
            'phone'        => fake('id_ID')->phoneNumber(),
            'service_id'   => Service::factory(),
            'service_name' => fake()->randomElement(['Personal Care', 'Pendidikan', 'Industri & Organisasi', 'Uji Kompetensi']),
            'message'      => fake('id_ID')->paragraph(1),
            'status'       => fake()->randomElement(['pending', 'processed', 'cancelled']),
        ];
    }
}
