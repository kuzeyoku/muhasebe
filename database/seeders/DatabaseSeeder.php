<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            "password" => bcrypt("password"),
            "role" => "admin"
        ]);

        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
    }
}
