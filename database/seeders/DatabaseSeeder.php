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
        // Create admin user if not exists
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin1234'),
                'email_verified_at' => now(),
            ]
        );

        // Seed data
        $this->call([
            ProjectSeeder::class,
            UnitSeeder::class,
            BlogSeeder::class,
            PortfolioSeeder::class,
            MediaSeeder::class,
            LeadSeeder::class,
        ]);
    }
}
