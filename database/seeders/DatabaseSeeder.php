<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with complete, production-ready sample data.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            ServiceSeeder::class,
            AudienceSeeder::class,
            CompetencySeeder::class,
            TestimonialSeeder::class,
            ConsultationSeeder::class,
        ]);
    }
}
