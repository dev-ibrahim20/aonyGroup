<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'formatted_price' => $this->formatted_price,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'area' => $this->area,
            'status' => $this->status,
            'slug' => $this->slug,
            'url' => $this->url,
            'full_canonical_url' => $this->full_canonical_url,
            
            // Relationships
            'project' => [
                'id' => $this->project->id,
                'title' => $this->project->title,
                'location' => $this->project->location,
                'slug' => $this->project->slug,
                'url' => route('projects.show', $this->project->slug),
            ],
            
            // Media
            'display_image' => $this->when($this->display_image, [
                'url' => $this->display_image->url,
                'full_url' => $this->display_image->full_url,
                'alt' => $this->display_image->alt_text ?? $this->title,
            ]),
            
            // SEO data
            'seo' => [
                'title' => $this->seo_title,
                'description' => $this->seo_description,
                'canonical_url' => $this->full_canonical_url,
            ],
            
            // Timestamps
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
