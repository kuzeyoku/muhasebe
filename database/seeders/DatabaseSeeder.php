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

        DB::table("companies")->insert([
            "name" => "Kuzey Oku Madencilik",
            "authorized" => "Ramazan Yüceloğlu",
            "email" => "info@kuzeyoku.com.tr",
            "phone" => "5452801243",
            "address" => "Kuzey Oku Madencilik",
            "city_id" => 59,
            "district_id" => 834,
            "tax_office" => "Tekirdağ",
            "tax_number" => "1234567890",
            "description" => "Kuzey Oku Madencilik"
        ]);

        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
    }
}
