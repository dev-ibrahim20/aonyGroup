<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed data
        $this->call([
            AdminUserSeeder::class,
            ProjectSeeder::class,
            UnitSeeder::class,
            BlogSeeder::class,
            PortfolioSeeder::class,
            MediaSeeder::class,
            LeadSeeder::class,
        ]);
    }
}
