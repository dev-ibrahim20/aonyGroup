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
        Schema::table('leads', function (Blueprint $table) {
            // Add tracking fields
            $table->foreignId('assigned_to')->nullable()->after('project_id')->constrained('users')->onDelete('set null');
            $table->enum('source', ['website', 'whatsapp', 'facebook', 'instagram', 'twitter', 'referral', 'other'])->default('website')->after('email');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium')->after('status');
            
            // Improve indexes for lead management
            $table->index(['assigned_to', 'status'], 'leads_assigned_status');
            $table->index(['project_id', 'source'], 'leads_project_source');
            $table->index(['status', 'priority'], 'leads_status_priority');
            $table->index(['source', 'created_at'], 'leads_source_date');
            
            // Add full-text index for lead search
            if (config('database.default') === 'mysql') {
                $table->fullText(['name', 'email', 'message'], 'leads_search');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropIndex('leads_assigned_status');
            $table->dropIndex('leads_project_source');
            $table->dropIndex('leads_status_priority');
            $table->dropIndex('leads_source_date');
            
            if (config('database.default') === 'mysql') {
                $table->dropFullText('leads_search');
            }
            
            $table->dropForeign(['assigned_to']);
            $table->dropColumn(['assigned_to', 'source', 'priority']);
        });
    }
};
