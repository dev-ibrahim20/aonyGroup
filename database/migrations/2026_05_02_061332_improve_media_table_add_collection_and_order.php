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
        Schema::table('media', function (Blueprint $table) {
            // Add collection field for better media organization
            $table->enum('collection', ['gallery', 'thumbnail', 'video', '360', 'document', 'floor_plan'])->default('gallery')->after('type');
            
            // Improve polymorphic indexes
            $table->index(['mediable_type', 'mediable_id', 'collection'], 'media_polymorphic_collection');
            $table->index(['mediable_type', 'mediable_id', 'type', 'collection'], 'media_polymorphic_type_collection');
            $table->index(['mediable_type', 'mediable_id', 'order'], 'media_polymorphic_order');
            
            // Add composite index for collection + type
            $table->index(['collection', 'type'], 'media_collection_type');
            
            // Drop old unique constraint and create better one
            $table->dropUnique('media_order_unique');
            $table->unique(['mediable_type', 'mediable_id', 'collection', 'order'], 'media_collection_order_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropIndex('media_polymorphic_collection');
            $table->dropIndex('media_polymorphic_type_collection');
            $table->dropIndex('media_polymorphic_order');
            $table->dropIndex('media_collection_type');
            
            // Restore old unique constraint
            $table->dropUnique('media_collection_order_unique');
            $table->unique(['mediable_type', 'mediable_id', 'order'], 'media_order_unique');
            
            $table->dropColumn('collection');
        });
    }
};
