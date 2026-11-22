<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'email'             => 'admin@loaction.id',
                'name'              => 'Administrator LoAction',
                'password'          => Hash::make('admin1234'),
                'email_verified_at' => now(),
            ],
            [
                'email'             => 'iqbal@loaction.id',
                'name'              => 'Iqbal (Admin)',
                'password'          => Hash::make('iqbal'),
                'email_verified_at' => now(),
            ],
            [
                'email'             => 'psikolog@loaction.id',
                'name'              => 'Tim Psikolog LoAction',
                'password'          => Hash::make('psikolog1234'),
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }
    }
}
