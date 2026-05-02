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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('message');
            $table->foreignId('project_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', ['new', 'contacted', 'closed'])->default('new');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index('project_id');
            $table->index('status');
            $table->index('email');
            $table->index('phone');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
