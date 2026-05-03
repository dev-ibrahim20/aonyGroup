<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'project_id',
        'unit_id',
        'assigned_to',
        'source',
        'status',
        'priority',
        'notes',
    ];

    /**
     * Get the project that owns the lead.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the unit that belongs to the lead.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Get the user assigned to the lead.
     */
    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Get new leads.
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Get contacted leads.
     */
    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    /**
     * Get closed leads.
     */
    public function scopeClosed($query)
    {
        return $query->where('status', 'closed');
    }

    /**
     * Get leads by project.
     */
    public function scopeByProject($query, $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    /**
     * Get leads created today.
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Get leads created this week.
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    /**
     * Get leads created this month.
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);
    }

    /**
     * Get leads by source.
     */
    public function scopeBySource($query, $source)
    {
        return $query->where('source', $source);
    }

    /**
     * Get leads by priority.
     */
    public function scopeByPriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }

    /**
     * Get high priority leads.
     */
    public function scopeHighPriority($query)
    {
        return $query->where('priority', 'high');
    }

    /**
     * Get medium priority leads.
     */
    public function scopeMediumPriority($query)
    {
        return $query->where('priority', 'medium');
    }

    /**
     * Get low priority leads.
     */
    public function scopeLowPriority($query)
    {
        return $query->where('priority', 'low');
    }

    /**
     * Get website leads.
     */
    public function scopeWebsite($query)
    {
        return $query->where('source', 'website');
    }

    /**
     * Get social media leads.
     */
    public function scopeSocialMedia($query)
    {
        return $query->whereIn('source', ['facebook', 'instagram', 'twitter']);
    }

    /**
     * Mark lead as contacted.
     */
    public function markAsContacted()
    {
        $this->update(['status' => 'contacted']);
    }

    /**
     * Mark lead as closed.
     */
    public function markAsClosed()
    {
        $this->update(['status' => 'closed']);
    }

    /**
     * Check if lead is new.
     */
    public function isNew()
    {
        return $this->status === 'new';
    }

    /**
     * Check if lead is contacted.
     */
    public function isContacted()
    {
        return $this->status === 'contacted';
    }

    /**
     * Check if lead is closed.
     */
    public function isClosed()
    {
        return $this->status === 'closed';
    }

    /**
     * Check if lead has high priority.
     */
    public function isHighPriority()
    {
        return $this->priority === 'high';
    }

    /**
     * Check if lead has medium priority.
     */
    public function isMediumPriority()
    {
        return $this->priority === 'medium';
    }

    /**
     * Check if lead has low priority.
     */
    public function isLowPriority()
    {
        return $this->priority === 'low';
    }

    /**
     * Check if lead is from website.
     */
    public function isFromWebsite()
    {
        return $this->source === 'website';
    }

    /**
     * Check if lead is from social media.
     */
    public function isFromSocialMedia()
    {
        return in_array($this->source, ['facebook', 'instagram', 'twitter']);
    }

    /**
     * Check if lead is assigned.
     */
    public function isAssigned()
    {
        return !is_null($this->assigned_to);
    }

    /**
     * Get priority color for UI.
     */
    public function getPriorityColorAttribute()
    {
        return match($this->priority) {
            'high' => 'red',
            'medium' => 'yellow',
            'low' => 'green',
            default => 'gray'
        };
    }

    /**
     * Get source display name.
     */
    public function getSourceDisplayNameAttribute()
    {
        return match($this->source) {
            'website' => 'Website',
            'whatsapp' => 'WhatsApp',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'referral' => 'Referral',
            'other' => 'Other',
            default => 'Unknown'
        };
    }
}
