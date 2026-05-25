<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('leads')->delete();

        $projects = Project::all();

        $leads = [
            [
                'name' => 'Ahmed Mohamed',
                'phone' => '+201234567890',
                'email' => 'ahmed.mohamed@example.com',
                'message' => 'I am interested in the Luxury Tower Cairo project. Please send me more information about available units and pricing.',
                'project_slug' => 'luxury-tower-cairo',
                'status' => 'new',
                'notes' => 'Interested in penthouse units',
            ],
            [
                'name' => 'Sara Ali',
                'phone' => '+201098765432',
                'email' => 'sara.ali@example.com',
                'message' => 'Looking for a 3-bedroom apartment in New Cairo. The Garden City Villas project looks perfect for my family.',
                'project_slug' => 'garden-city-villas',
                'status' => 'contacted',
                'notes' => 'Followed up via phone, interested in viewing',
            ],
            [
                'name' => 'Omar Hassan',
                'phone' => '+201555555555',
                'email' => 'omar.hassan@example.com',
                'message' => 'I would like to inquire about commercial office space in the Downtown Business Center.',
                'project_slug' => 'downtown-business-center',
                'status' => 'new',
                'notes' => 'Looking for office space for startup',
            ],
            [
                'name' => 'Fatima Mahmoud',
                'phone' => '+201111111111',
                'email' => 'fatima.mahmoud@example.com',
                'message' => 'Interested in beachfront property. Please provide details about the Alexandria Coastal Resort.',
                'project_slug' => 'alexandria-coastal-resort',
                'status' => 'contacted',
                'notes' => 'Requested brochure and floor plans',
            ],
            [
                'name' => 'Khaled Ibrahim',
                'phone' => '+201222222222',
                'email' => 'khaled.ibrahim@example.com',
                'message' => 'I am looking for investment opportunities. Please send information about upcoming projects.',
                'project_slug' => null,
                'status' => 'new',
                'notes' => 'Investor looking for multiple properties',
            ],
            [
                'name' => 'Nadia Ahmed',
                'phone' => '+201333333333',
                'email' => 'nadia.ahmed@example.com',
                'message' => 'Interested in the Marina Bay Apartments. When will the project be available for viewing?',
                'project_slug' => 'marina-bay-apartments',
                'status' => 'new',
                'notes' => 'Waiting for project completion',
            ],
            [
                'name' => 'Mohamed Salah',
                'phone' => '+201444444444',
                'email' => 'mohamed.salah@example.com',
                'message' => 'Looking for a townhouse in Palm Hills Compound. Please provide pricing and availability.',
                'project_slug' => 'palm-hills-compound',
                'status' => 'contacted',
                'notes' => 'Scheduled site visit for next week',
            ],
            [
                'name' => 'Layla Kamal',
                'phone' => '+201666666666',
                'email' => 'layla.kamal@example.com',
                'message' => 'I would like to schedule a consultation regarding property investment in Egypt.',
                'project_slug' => null,
                'status' => 'closed',
                'notes' => 'Purchased a unit in Luxury Tower',
            ],
            [
                'name' => 'Youssef Farouk',
                'phone' => '+201777777777',
                'email' => 'youssef.farouk@example.com',
                'message' => 'Interested in commercial property for my business. Need office space for 20 employees.',
                'project_slug' => 'downtown-business-center',
                'status' => 'new',
                'notes' => 'Looking for large office space',
            ],
            [
                'name' => 'Amira Tarek',
                'phone' => '+201888888888',
                'email' => 'amira.tarek@example.com',
                'message' => 'I am looking for a villa for my family. Please send information about available villas in your projects.',
                'project_slug' => 'garden-city-villas',
                'status' => 'contacted',
                'notes' => 'Interested in Type B villa',
            ],
        ];

        foreach ($leads as $leadData) {
            $project = null;
            if ($leadData['project_slug']) {
                $project = $projects->where('slug', $leadData['project_slug'])->first();
            }

            Lead::create([
                'name' => $leadData['name'],
                'phone' => $leadData['phone'],
                'email' => $leadData['email'],
                'message' => $leadData['message'],
                'project_id' => $project ? $project->id : null,
                'status' => $leadData['status'],
                'notes' => $leadData['notes'],
            ]);
        }
    }
}
