<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $title = fake('id_ID')->unique()->randomElement([
            'Konseling Keluarga',
            'Tes Psikologi',
            'Pelatihan SDM',
            'Assessment Organisasi',
            'Psikoedukasi',
            'Coaching Eksekutif',
        ]);

        return [
            'icon'        => fake()->randomElement(['☘', '✦', '◎', '✓', '⟡', '❖']),
            'title'       => $title,
            'slug'        => Str::slug($title),
            'description' => fake('id_ID')->paragraph(2),
            'cta'         => fake('id_ID')->randomElement(['Konsultasikan kebutuhan', 'Diskusikan program', 'Rancang assessment', 'Ajukan kebutuhan']),
            'sort_order'  => fake()->numberBetween(0, 10),
            'is_active'   => true,
        ];
    }
}
