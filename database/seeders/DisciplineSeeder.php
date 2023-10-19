<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disciplines = [
            "PORTUGUÊS",
            "MATEMÁTICA",
            "CIÊNCIAS",
            "HISTÓRIA",
            "GEOGRAFIA",
            "INGLÊS",
            "EDUCAÇÃO FÍSICA",
            "ARTES",
            "ENSINO RELIGIOSO",
        ];

        foreach ($disciplines as $discipline) {
            Discipline::create(['name' => $discipline]);
        }
    }
}
