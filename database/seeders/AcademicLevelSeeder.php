<?php

namespace Database\Seeders;

use App\Models\AcademicLevel;
use Illuminate\Database\Seeder;

class AcademicLevelSeeder extends Seeder
{
    public function run()
    {
        $levels = [
            ['name' => 'School', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'College', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'University', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Masters', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PHD', 'created_at' => now(), 'updated_at' => now()],
        ];

        AcademicLevel::insert($levels);
    }
}
