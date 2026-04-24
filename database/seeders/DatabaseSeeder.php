<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $names = [
            'Ahmad Dzaki', 'Aisyah Putri', 'Bima Satria', 'Citra Kirana',
            'Dinda Hauw', 'Eka Pratama', 'Fadil Jaidi', 'Gita Gutawa',
            'Hasan Basri', 'Indah Permatasari', 'Joko Anwar', 'Kiki Amalia',
            'Lukman Hakim', 'Maya Septha', 'Nadia Vega'
        ];

        foreach ($names as $name) {
            Student::create([
                'name' => $name,
            ]);
        }
    }
}
