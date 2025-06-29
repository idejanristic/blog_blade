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
        Schema::create(
            table: 'tags',
            callback: function (Blueprint $table): void {
                $table->id();
                $table->string(column: 'name');
                $table->string(column: 'slug')->unique(indexName: 'slug');
                $table->string(column: 'source');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(
            table: 'tags'
        );
    }
};
