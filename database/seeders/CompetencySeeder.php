<?php

namespace Database\Seeders;

use App\Models\Competency;
use Illuminate\Database\Seeder;

class CompetencySeeder extends Seeder
{
    public function run(): void
    {
        $competencies = [
            [
                'role'       => 'Level Staf',
                'text'       => 'Uji kompetensi dasar kerja, kemampuan pemecahan masalah teknis, ketelitian, etika kerja, dan kesesuaian kultur organisasi.',
                'icon'       => 'heroicon-o-user',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'role'       => 'Level Supervisor',
                'text'       => 'Evaluasi kemampuan supervisi, komunikasi tim, koordinasi operasional, problem solving cepat, dan kepemimpinan lini pertama.',
                'icon'       => 'heroicon-o-user-group',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'role'       => 'Level Manager',
                'text'       => 'Pemetaan kompetensi manajerial strategis, pengambilan keputusan kritis, manajemen konflik, delegasi, dan kepemimpinan visi.',
                'icon'       => 'heroicon-o-briefcase',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'role'       => 'Level Eksekutif & Direksi',
                'text'       => 'Asesmen kepemimpinan tingkat lanjut (strategic leadership), orientasi bisnis jangka panjang, integritas, dan manajemen transformasi organisasi.',
                'icon'       => 'heroicon-o-sparkles',
                'sort_order' => 4,
                'is_active'  => true,
            ],
        ];

        foreach ($competencies as $data) {
            Competency::updateOrCreate(
                ['role' => $data['role']],
                $data
            );
        }
    }
}
