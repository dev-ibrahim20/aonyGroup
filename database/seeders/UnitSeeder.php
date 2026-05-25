<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('units')->delete();

        $projects = Project::all();

        $units = [
            // Luxury Tower Cairo Units
            [
                'project_slug' => 'luxury-tower-cairo',
                'title' => 'Penthouse Suite',
                'price' => 8500000.00,
                'area' => 350.50,
                'bedrooms' => 4,
                'bathrooms' => 4,
                'status' => 'available',
                'description' => 'Luxurious penthouse with panoramic city views and premium finishes.',
            ],
            [
                'project_slug' => 'luxury-tower-cairo',
                'title' => 'Deluxe Apartment',
                'price' => 4200000.00,
                'area' => 220.00,
                'bedrooms' => 3,
                'bathrooms' => 3,
                'status' => 'available',
                'description' => 'Spacious apartment with modern design and high-end amenities.',
            ],
            [
                'project_slug' => 'luxury-tower-cairo',
                'title' => 'Standard Apartment',
                'price' => 2800000.00,
                'area' => 150.00,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'status' => 'sold',
                'description' => 'Comfortable apartment perfect for small families.',
            ],

            // Alexandria Coastal Resort Units
            [
                'project_slug' => 'alexandria-coastal-resort',
                'title' => 'Beachfront Villa',
                'price' => 12500000.00,
                'area' => 450.00,
                'bedrooms' => 5,
                'bathrooms' => 5,
                'status' => 'available',
                'description' => 'Direct beach access with private pool and stunning sea views.',
            ],
            [
                'project_slug' => 'alexandria-coastal-resort',
                'title' => 'Sea View Apartment',
                'price' => 5500000.00,
                'area' => 280.00,
                'bedrooms' => 3,
                'bathrooms' => 3,
                'status' => 'available',
                'description' => 'Beautiful sea views from every room with spacious balconies.',
            ],

            // Garden City Villas Units
            [
                'project_slug' => 'garden-city-villas',
                'title' => 'Family Villa Type A',
                'price' => 9800000.00,
                'area' => 520.00,
                'bedrooms' => 5,
                'bathrooms' => 5,
                'status' => 'available',
                'description' => 'Large family villa with private garden and swimming pool.',
            ],
            [
                'project_slug' => 'garden-city-villas',
                'title' => 'Family Villa Type B',
                'price' => 7500000.00,
                'area' => 420.00,
                'bedrooms' => 4,
                'bathrooms' => 4,
                'status' => 'reserved',
                'description' => 'Elegant villa with landscaped garden and modern amenities.',
            ],

            // Downtown Business Center Units
            [
                'project_slug' => 'downtown-business-center',
                'title' => 'Executive Office Suite',
                'price' => 3200000.00,
                'area' => 180.00,
                'bedrooms' => 0,
                'bathrooms' => 2,
                'status' => 'available',
                'description' => 'Premium office space with meeting rooms and reception area.',
            ],
            [
                'project_slug' => 'downtown-business-center',
                'title' => 'Standard Office',
                'price' => 1800000.00,
                'area' => 100.00,
                'bedrooms' => 0,
                'bathrooms' => 1,
                'status' => 'available',
                'description' => 'Modern office space perfect for startups and small businesses.',
            ],

            // Marina Bay Apartments Units
            [
                'project_slug' => 'marina-bay-apartments',
                'title' => 'Marina View Apartment',
                'price' => 6800000.00,
                'area' => 320.00,
                'bedrooms' => 3,
                'bathrooms' => 3,
                'status' => 'available',
                'description' => 'Luxurious apartment with direct marina access and premium finishes.',
            ],
            [
                'project_slug' => 'marina-bay-apartments',
                'title' => 'Studio Apartment',
                'price' => 3200000.00,
                'area' => 85.00,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'status' => 'available',
                'description' => 'Cozy studio perfect for weekend getaways.',
            ],

            // Palm Hills Compound Units
            [
                'project_slug' => 'palm-hills-compound',
                'title' => 'Townhouse',
                'price' => 5900000.00,
                'area' => 380.00,
                'bedrooms' => 4,
                'bathrooms' => 4,
                'status' => 'available',
                'description' => 'Modern townhouse with private garden and community access.',
            ],
            [
                'project_slug' => 'palm-hills-compound',
                'title' => 'Twin House',
                'price' => 4800000.00,
                'area' => 300.00,
                'bedrooms' => 3,
                'bathrooms' => 3,
                'status' => 'available',
                'description' => 'Spacious twin house with shared garden and excellent amenities.',
            ],
        ];

        foreach ($units as $unitData) {
            $project = $projects->where('slug', $unitData['project_slug'])->first();
            if ($project) {
                Unit::create([
                    'project_id' => $project->id,
                    'title' => $unitData['title'],
                    'price' => $unitData['price'],
                    'area' => $unitData['area'],
                    'bedrooms' => $unitData['bedrooms'],
                    'bathrooms' => $unitData['bathrooms'],
                    'status' => $unitData['status'],
                    'description' => $unitData['description'],
                ]);
            }
        }
    }
}
