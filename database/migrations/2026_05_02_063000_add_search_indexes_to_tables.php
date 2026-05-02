<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Full-text search indexes
            if (!Schema::hasIndex('projects', 'projects_title_search_index')) {
                $table->index(['title_en', 'title_ar'], 'projects_title_search_index');
            }
            if (!Schema::hasIndex('projects', 'projects_location_index')) {
                $table->index('location', 'projects_location_index');
            }
            if (!Schema::hasIndex('projects', 'projects_status_index')) {
                $table->index('status', 'projects_status_index');
            }
            if (!Schema::hasIndex('projects', 'projects_featured_index')) {
                $table->index('featured', 'projects_featured_index');
            }
            
            // Composite indexes for common filter combinations
            if (!Schema::hasIndex('projects', 'projects_status_featured_index')) {
                $table->index(['status', 'featured'], 'projects_status_featured_index');
            }
            if (!Schema::hasIndex('projects', 'projects_status_location_index')) {
                $table->index(['status', 'location'], 'projects_status_location_index');
            }
            
            // SEO indexes
            if (!Schema::hasIndex('projects', 'projects_slug_index')) {
                $table->index('slug', 'projects_slug_index');
            }
            if (!Schema::hasIndex('projects', 'projects_canonical_index')) {
                $table->index('canonical_url', 'projects_canonical_index');
            }
        });

        Schema::table('units', function (Blueprint $table) {
            // Full-text search indexes
            if (!Schema::hasIndex('units', 'units_title_search_index')) {
                $table->index(['title'], 'units_title_search_index');
            }
            
            // Filter indexes
            if (!Schema::hasIndex('units', 'units_project_id_index')) {
                $table->index('project_id', 'units_project_id_index');
            }
            if (!Schema::hasIndex('units', 'units_price_index')) {
                $table->index('price', 'units_price_index');
            }
            if (!Schema::hasIndex('units', 'units_area_index')) {
                $table->index('area', 'units_area_index');
            }
            if (!Schema::hasIndex('units', 'units_bedrooms_index')) {
                $table->index('bedrooms', 'units_bedrooms_index');
            }
            if (!Schema::hasIndex('units', 'units_bathrooms_index')) {
                $table->index('bathrooms', 'units_bathrooms_index');
            }
            if (!Schema::hasIndex('units', 'units_status_index')) {
                $table->index('status', 'units_status_index');
            }
            
            // Composite indexes for common filter combinations
            if (!Schema::hasIndex('units', 'units_project_status_index')) {
                $table->index(['project_id', 'status'], 'units_project_status_index');
            }
            if (!Schema::hasIndex('units', 'units_price_area_index')) {
                $table->index(['price', 'area'], 'units_price_area_index');
            }
            if (!Schema::hasIndex('units', 'units_rooms_index')) {
                $table->index(['bedrooms', 'bathrooms'], 'units_rooms_index');
            }
            if (!Schema::hasIndex('units', 'units_status_price_index')) {
                $table->index(['status', 'price'], 'units_status_price_index');
            }
            
            // SEO indexes
            if (!Schema::hasIndex('units', 'units_slug_index')) {
                $table->index('slug', 'units_slug_index');
            }
            
            // Range query optimization indexes
            if (!Schema::hasIndex('units', 'units_comprehensive_index')) {
                $table->index(['price', 'area', 'bedrooms'], 'units_comprehensive_index');
            }
        });

        Schema::table('media', function (Blueprint $table) {
            // Media search and filter indexes
            if (!Schema::hasIndex('media', 'media_polymorphic_index')) {
                $table->index(['mediable_type', 'mediable_id'], 'media_polymorphic_index');
            }
            if (!Schema::hasIndex('media', 'media_collection_index')) {
                $table->index('collection', 'media_collection_index');
            }
            if (!Schema::hasIndex('media', 'media_order_index')) {
                $table->index('order', 'media_order_index');
            }
            if (!Schema::hasIndex('media', 'media_type_collection_index')) {
                $table->index(['mediable_type', 'collection'], 'media_type_collection_index');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex('projects_title_search_index');
            $table->dropIndex('projects_location_index');
            $table->dropIndex('projects_status_index');
            $table->dropIndex('projects_featured_index');
            $table->dropIndex('projects_status_featured_index');
            $table->dropIndex('projects_status_location_index');
            $table->dropIndex('projects_slug_index');
            $table->dropIndex('projects_canonical_index');
        });

        Schema::table('units', function (Blueprint $table) {
            $table->dropIndex('units_title_search_index');
            $table->dropIndex('units_project_id_index');
            $table->dropIndex('units_price_index');
            $table->dropIndex('units_area_index');
            $table->dropIndex('units_bedrooms_index');
            $table->dropIndex('units_bathrooms_index');
            $table->dropIndex('units_status_index');
            $table->dropIndex('units_project_status_index');
            $table->dropIndex('units_price_area_index');
            $table->dropIndex('units_rooms_index');
            $table->dropIndex('units_status_price_index');
            $table->dropIndex('units_slug_index');
            $table->dropIndex('units_comprehensive_index');
        });

        Schema::table('media', function (Blueprint $table) {
            $table->dropIndex('media_polymorphic_index');
            $table->dropIndex('media_collection_index');
            $table->dropIndex('media_order_index');
            $table->dropIndex('media_type_collection_index');
        });
    }
};
