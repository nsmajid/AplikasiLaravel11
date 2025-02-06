<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Database\Seeders\DivisionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([DivisionSeeder::class]);

        Employee::factory(20)->recycle(
            [
                Division::all()
            ]
        )->create();
    }
}
