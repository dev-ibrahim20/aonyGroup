<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Unit;
use App\Models\Lead;
use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Get statistics
        $stats = [
            'total_projects' => Project::count(),
            'total_units' => Unit::count(),
            'total_leads' => Lead::count(),
            'total_value' => Unit::sum('price'),
            'available_projects' => Project::where('status', 'available')->count(),
            'featured_projects' => Project::where('featured', true)->count(),
            'available_units' => Unit::where('status', 'available')->count(),
            'new_leads' => Lead::where('created_at', '>=', now()->subDays(7))->count(),
        ];

        // Get recent data
        $recentProjects = Project::with(['mainImage'])
            ->latest()
            ->take(5)
            ->get();

        $recentLeads = Lead::latest()
            ->take(5)
            ->get();

        $recentUnits = Unit::with(['project', 'displayImage'])
            ->latest()
            ->take(5)
            ->get();

        // Get chart data (last 6 months)
        $chartData = $this->getChartData();

        return view('admin.dashboard', compact(
            'stats',
            'recentProjects',
            'recentLeads',
            'recentUnits',
            'chartData'
        ));
    }

    /**
     * Get chart data for dashboard.
     */
    private function getChartData(): array
    {
        $months = [];
        $projectsData = [];
        $leadsData = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $months[] = $month->format('M Y');
            
            $projectsData[] = Project::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
                
            $leadsData[] = Lead::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        return [
            'months' => $months,
            'projects' => $projectsData,
            'leads' => $leadsData,
        ];
    }
}
