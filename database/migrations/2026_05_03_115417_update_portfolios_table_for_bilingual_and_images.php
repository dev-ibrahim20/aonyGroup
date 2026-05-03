<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            // Add bilingual fields
            $table->string('title_en')->after('id');
            $table->string('title_ar')->after('title_en');
            $table->text('excerpt_en')->nullable()->after('title_ar');
            $table->text('excerpt_ar')->nullable()->after('excerpt_en');
            $table->longText('description_en')->after('excerpt_ar');
            $table->longText('description_ar')->after('description_en');
            
            // Add main image field
            $table->foreignId('main_image_id')->nullable()->after('project_url')->references('id')->on('media')->onDelete('set null');
            
            // Add indexes
            $table->index('title_en');
            $table->index('title_ar');
            $table->index('main_image_id');
        });
        
        // Migrate existing data
        DB::statement("UPDATE portfolios SET title_en = title, title_ar = title, excerpt_en = excerpt, excerpt_ar = excerpt, description_en = content, description_ar = content");
        
        // Drop old columns
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['title', 'excerpt', 'content']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            // Add back old columns
            $table->string('title')->after('id');
            $table->text('excerpt')->nullable()->after('title');
            $table->longText('content')->after('excerpt');
        });
        
        // Migrate data back
        DB::statement("UPDATE portfolios SET title = title_en, excerpt = excerpt_en, content = description_en");
        
        // Drop new columns
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'title_ar', 'excerpt_en', 'excerpt_ar', 'description_en', 'description_ar', 'main_image_id']);
        });
    }
};
