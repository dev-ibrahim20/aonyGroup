<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'q' => 'nullable|string|max:255',
            
            // Project filters
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|array',
            'status.*' => ['nullable', Rule::in(['available', 'sold_out', 'coming_soon', 'reserved'])],
            'featured' => 'nullable|boolean',
            
            // Unit filters
            'project_id' => 'nullable|integer|exists:projects,id',
            'project_slug' => 'nullable|string|exists:projects,slug',
            
            // Price range
            'price_min' => 'nullable|integer|min:0',
            'price_max' => 'nullable|integer|min:0|gt:price_min',
            'price_range' => 'nullable|string|in:0-100000,100000-200000,200000-300000,300000-500000,500000+',
            
            // Area range
            'area_min' => 'nullable|integer|min:0',
            'area_max' => 'nullable|integer|min:0|gt:area_min',
            'area_range' => 'nullable|string|in:0-50,50-100,100-150,150-200,200+',
            
            // Bedrooms and bathrooms
            'bedrooms' => 'nullable|array',
            'bedrooms.*' => 'nullable|integer|min:1|max:10',
            'bedrooms_exact' => 'nullable|integer|min:1|max:10',
            
            'bathrooms' => 'nullable|array',
            'bathrooms.*' => 'nullable|integer|min:1|max:10',
            'bathrooms_exact' => 'nullable|integer|min:1|max:10',
            
            // Sorting
            'sort' => 'nullable|string|in:price_asc,price_desc,area_asc,area_desc,bedrooms_asc,bedrooms_desc,newest,oldest',
            'per_page' => 'nullable|integer|min:1|max:100',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'price_max.gt' => 'The maximum price must be greater than the minimum price.',
            'area_max.gt' => 'The maximum area must be greater than the minimum area.',
            'sort.in' => 'The sort option is invalid.',
            'per_page.max' => 'You cannot request more than 100 items per page.',
        ];
    }

    /**
     * Get validated filters as array.
     */
    public function getFilters(): array
    {
        $filters = $this->validated();
        
        // Handle price range string
        if (isset($filters['price_range'])) {
            $priceRange = \App\Services\SearchService::parsePriceRange($filters['price_range']);
            $filters['price_min'] = $filters['price_min'] ?? $priceRange['min'];
            $filters['price_max'] = $filters['price_max'] ?? $priceRange['max'];
            unset($filters['price_range']);
        }
        
        // Handle area range string
        if (isset($filters['area_range'])) {
            $areaRange = \App\Services\SearchService::parseAreaRange($filters['area_range']);
            $filters['area_min'] = $filters['area_min'] ?? $areaRange['min'];
            $filters['area_max'] = $filters['area_max'] ?? $areaRange['max'];
            unset($filters['area_range']);
        }
        
        // Handle exact bedrooms/bathrooms
        if (isset($filters['bedrooms_exact'])) {
            $filters['bedrooms'] = $filters['bedrooms_exact'];
            unset($filters['bedrooms_exact']);
        }
        
        if (isset($filters['bathrooms_exact'])) {
            $filters['bathrooms'] = $filters['bathrooms_exact'];
            unset($filters['bathrooms_exact']);
        }
        
        // Remove empty values
        return array_filter($filters, function ($value) {
            if (is_array($value)) {
                return !empty($value);
            }
            return $value !== null && $value !== '';
        });
    }

    /**
     * Get search query.
     */
    public function getSearchQuery(): ?string
    {
        return $this->validated()['q'] ?? null;
    }
}
