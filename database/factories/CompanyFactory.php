<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->company(),
            "authorized" => $this->faker->name(),
            "email" => $this->faker->unique()->safeEmail(),
            "phone" => $this->faker->phoneNumber(),
            "website" => $this->faker->url(),
            "address" => $this->faker->address(),
            "city_id" => $this->faker->numberBetween(1, 81),
            "district_id" => $this->faker->numberBetween(1, 973),
            "description" => $this->faker->paragraph()
        ];
    }
}
