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
            // Add SEO fields
            $table->string('canonical_url')->nullable()->after('meta_description');
            $table->foreignId('main_image_id')->nullable()->after('canonical_url')->constrained('media')->onDelete('set null');
            
            // Improve indexes for better SEO and performance
            $table->index(['status', 'featured'], 'projects_status_featured');
            $table->index(['status', 'location'], 'projects_status_location');
            $table->index(['featured', 'created_at'], 'projects_featured_date');
            
            // Add full-text index for project search
            if (config('database.default') === 'mysql') {
                $table->fullText(['title_en', 'title_ar', 'description_en', 'description_ar', 'location'], 'projects_search');
            }
            
            // Add index for canonical URL lookup
            $table->index('canonical_url', 'projects_canonical_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex('projects_status_featured');
            $table->dropIndex('projects_status_location');
            $table->dropIndex('projects_featured_date');
            
            if (config('database.default') === 'mysql') {
                $table->dropFullText('projects_search');
            }
            
            $table->dropIndex('projects_canonical_url');
            
            $table->dropForeign(['main_image_id']);
            $table->dropColumn(['canonical_url', 'main_image_id']);
        });
    }
};
