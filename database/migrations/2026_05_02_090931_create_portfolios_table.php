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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('category');
            $table->string('client_name')->nullable();
            $table->date('project_date')->nullable();
            $table->json('technologies')->nullable();
            $table->string('project_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->enum('status', ['active', 'inactive', 'archived'])->default('active');
            $table->boolean('featured')->default(false);
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('status');
            $table->index('featured');
            $table->index('category');
            $table->index('project_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
