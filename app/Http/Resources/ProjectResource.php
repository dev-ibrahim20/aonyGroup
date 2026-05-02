<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'location' => $this->location,
            'status' => $this->status,
            'featured' => $this->featured,
            'slug' => $this->slug,
            'url' => route('projects.show', $this->slug),
            'full_canonical_url' => $this->full_canonical_url,
            
            // Units summary
            'units_summary' => [
                'total_units' => $this->units->count(),
                'available_units' => $this->units->where('status', 'available')->count(),
                'price_range' => [
                    'min' => $this->units->min('price'),
                    'max' => $this->units->max('price'),
                ],
                'area_range' => [
                    'min' => $this->units->min('area'),
                    'max' => $this->units->max('area'),
                ],
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
