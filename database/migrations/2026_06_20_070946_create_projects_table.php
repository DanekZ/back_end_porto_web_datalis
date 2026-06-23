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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->nullable(); // URL gambar utama
            $table->json('images')->nullable();       // Array max 5 URL gambar
            $table->json('tech_stack');               // ganti 'tags'
            $table->enum('category', ['web', 'data']);
            $table->string('github_url')->nullable(); // ganti 'github'
            $table->string('demo_url')->nullable();   // ganti 'demo'
            $table->enum('status', ['completed', 'in-progress', 'archived'])->default('completed');
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
