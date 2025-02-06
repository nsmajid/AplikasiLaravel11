<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::factory()->create([
            'division' => 'Keuangan',
        ]);
        Division::factory()->create([
            'division' => 'SDM',
        ]);
        Division::factory()->create([
            'division' => 'Humas',
        ]);
        Division::factory()->create([
            'division' => 'Asset',
        ]);
    }
}
