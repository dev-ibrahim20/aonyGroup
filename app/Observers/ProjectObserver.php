<?php

namespace App\Observers;

use App\Models\Project;
use App\Services\SEOService;

class ProjectObserver
{
    /**
     * Handle the Project "creating" event.
     */
    public function creating(Project $project): void
    {
        SEOService::autoGenerateSEO($project);
    }

    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        // Auto-generate SEO after creation to ensure we have the ID
        SEOService::autoGenerateSEO($project);
        $project->saveQuietly();
    }

    /**
     * Handle the Project "updating" event.
     */
    public function updating(Project $project): void
    {
        // Regenerate SEO if title or description changed
        if ($project->isDirty(['title_en', 'title_ar', 'description_en', 'description_ar', 'location'])) {
            SEOService::autoGenerateSEO($project);
        }
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        //
    }
}
