<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Project;
use App\Models\User;
use App\Exports\LeadsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LeadsController extends Controller
{
    /**
     * Display a listing of leads.
     */
    public function index(Request $request)
    {
        $query = Lead::query();

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by priority
        if ($request->has('priority')) {
            $query->where('priority', $request->priority);
        }

        // Filter by source
        if ($request->has('source')) {
            $query->where('source', $request->source);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhere('message', 'LIKE', "%{$search}%");
            });
        }

        $leads = $query->latest()->paginate(15);

        return view('admin.leads.index', [
            'leads' => $leads,
            'pageTitle' => 'Leads'
        ]);
    }

    /**
     * Show the form for creating a new lead.
     */
    public function create()
    {
        return view('admin.leads.create', [
            'pageTitle' => 'Create Lead'
        ]);
    }

    /**
     * Store a newly created lead in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
            'source' => 'nullable|string|in:website,whatsapp,facebook,instagram,referral,other',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:new,contacted,qualified,closed,lost',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $lead = Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'source' => $request->source ?? 'website',
            'priority' => $request->priority,
            'status' => $request->status,
            'notes' => $request->notes,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()
            ->route('admin.leads.index')
            ->with('success', 'Lead created successfully!');
    }

    /**
     * Display the specified lead.
     */
    public function show(Lead $lead)
    {
        return view('admin.leads.show', [
            'lead' => $lead,
            'pageTitle' => 'Lead Details'
        ]);
    }

    /**
     * Show the form for editing the specified lead.
     */
    public function edit(Lead $lead)
    {
        return view('admin.leads.edit', [
            'lead' => $lead,
            'pageTitle' => 'Edit Lead'
        ]);
    }

    /**
     * Update the specified lead in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
            'source' => 'nullable|string|in:website,whatsapp,facebook,instagram,referral,other',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:new,contacted,qualified,closed,lost',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $lead->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'source' => $request->source ?? 'website',
            'priority' => $request->priority,
            'status' => $request->status,
            'notes' => $request->notes,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()
            ->route('admin.leads.index')
            ->with('success', 'Lead updated successfully!');
    }

    /**
     * Remove the specified lead from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()
            ->route('admin.leads.index')
            ->with('success', 'Lead deleted successfully!');
    }

    /**
     * Update lead status.
     */
    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,qualified,closed,lost',
        ]);

        $lead->update(['status' => $request->status]);

        return redirect()
            ->back()
            ->with('success', 'Lead status updated successfully!');
    }

    /**
     * Export leads to Excel.
     */
    public function export()
    {
        return Excel::download(new LeadsExport, 'leads-' . date('Y-m-d') . '.xlsx');
    }
}
