<?php

namespace Database\Seeders;

use App\Models\PaperType;
use Illuminate\Database\Seeder;

class PaperTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Essay', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Business Type', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Creative Writing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Case Study', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Report', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Research Paper', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Book Review', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thesis Dissertation', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Research Proposal', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Term Paper', 'created_at' => now(), 'updated_at' => now()],
        ];

        PaperType::insert($types);
    }
}
