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
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('units', function (Blueprint $table) {
            // Drop indexes first
            $table->dropIndex(['title_en']);
            $table->dropIndex(['title_ar']);
            
            // Drop bilingual fields
            $table->dropColumn('title_en');
            $table->dropColumn('title_ar');
            $table->dropColumn('description_en');
            $table->dropColumn('description_ar');
        });
    }
};
