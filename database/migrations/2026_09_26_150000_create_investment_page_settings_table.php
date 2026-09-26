<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('investment_page_settings', function (Blueprint $table) {
            $table->id();
            $table->json('hero_images');
            $table->string('services_heading');
            $table->json('services');
            $table->string('areas_heading');
            $table->json('investment_areas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investment_page_settings');
    }
};
