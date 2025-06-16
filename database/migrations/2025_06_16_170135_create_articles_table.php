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
        Schema::create(table: 'articles', callback: function (Blueprint $table): void {
            $table->id();
            $table->foreignId(column: 'user_id')
                ->nullable()
                ->constrained(table: 'users', column: 'id')
                ->nullOnDelete()
                ->nullOnUpdate();
            $table->string(column: 'title');
            $table->string(column: 'slug')->unique();
            $table->text(column: 'excerpt');
            $table->timestamp(column: 'published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
