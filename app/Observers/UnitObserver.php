<?php

namespace App\Observers;

use App\Models\Unit;
use App\Services\SEOService;

class UnitObserver
{
    /**
     * Handle the Unit "creating" event.
     */
    public function creating(Unit $unit): void
    {
        SEOService::autoGenerateSEO($unit);
    }

    /**
     * Handle the Unit "created" event.
     */
    public function created(Unit $unit): void
    {
        // Auto-generate SEO after creation to ensure we have the ID
        SEOService::autoGenerateSEO($unit);
        $unit->saveQuietly();
    }

    /**
     * Handle the Unit "updating" event.
     */
    public function updating(Unit $unit): void
    {
        // Regenerate SEO if title or description changed
        if ($unit->isDirty(['title', 'description'])) {
            SEOService::autoGenerateSEO($unit);
        }
    }

    /**
     * Handle the Unit "updated" event.
     */
    public function updated(Unit $unit): void
    {
        //
    }

    /**
     * Handle the Unit "deleted" event.
     */
    public function deleted(Unit $unit): void
    {
        //
    }

    /**
     * Handle the Unit "restored" event.
     */
    public function restored(Unit $unit): void
    {
        //
    }

    /**
     * Handle the Unit "force deleted" event.
     */
    public function forceDeleted(Unit $unit): void
    {
        //
    }
}
