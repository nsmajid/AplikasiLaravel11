<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_code' => fake()->unique()->randomNumber(4),
            'name' => fake()->name(),
            'whatsapp_number' => fake()->unique()->e164PhoneNumber(),
            'address' => fake()->address(),
            'pos_code' => fake()->postcode(),
            'division_id' => Division::factory(),
            'user_id' => User::factory(),
        ];
 
    }
}
