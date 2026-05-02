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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('mediable_type');
            $table->unsignedBigInteger('mediable_id');
            $table->enum('type', ['image', 'video', '360'])->default('image');
            $table->string('url');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            
            // Indexes
            $table->index(['mediable_type', 'mediable_id']);
            $table->index('type');
            $table->index('order');
            
            // Unique constraint for order per model
            $table->unique(['mediable_type', 'mediable_id', 'order'], 'media_order_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
