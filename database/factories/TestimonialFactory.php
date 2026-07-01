<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'quote'      => fake('id_ID')->paragraph(2),
            'name'       => fake('id_ID')->name(),
            'role'       => fake('id_ID')->randomElement(['HR Manager', 'Orang Tua Siswa', 'Guru BK', 'Direktur SDM', 'Mahasiswa', 'Kepala Sekolah']),
            'rating'     => fake()->numberBetween(4, 5),
            'sort_order' => fake()->numberBetween(0, 10),
            'is_active'  => true,
        ];
    }
}
