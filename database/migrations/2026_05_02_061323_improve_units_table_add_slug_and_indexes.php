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
        Schema::table('units', function (Blueprint $table) {
            // Add slug for SEO
            $table->string('slug')->unique()->after('title');
            
            // Add composite index for project + slug (unique per project)
            $table->index(['project_id', 'slug'], 'units_project_slug_unique');
            
            // Add indexes for common search filters
            $table->index(['project_id', 'status'], 'units_project_status');
            $table->index(['project_id', 'price'], 'units_project_price');
            $table->index(['project_id', 'bedrooms', 'bathrooms'], 'units_project_specs');
            
            // Add full-text index for title search (if supported)
            if (config('database.default') === 'mysql') {
                $table->fullText(['title', 'description'], 'units_search');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropIndex('units_project_slug_unique');
            $table->dropIndex('units_project_status');
            $table->dropIndex('units_project_price');
            $table->dropIndex('units_project_specs');
            
            if (config('database.default') === 'mysql') {
                $table->dropFullText('units_search');
            }
            
            $table->dropColumn('slug');
        });
    }
};
