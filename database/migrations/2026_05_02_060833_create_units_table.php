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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->decimal('price', 12, 2);
            $table->decimal('area', 8, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->enum('status', ['available', 'sold', 'reserved'])->default('available');
            $table->text('description')->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index('project_id');
            $table->index('status');
            $table->index('price');
            $table->index('bedrooms');
            $table->index('bathrooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
