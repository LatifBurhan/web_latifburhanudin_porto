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
        $table->string('title');            // Judul Project
        $table->string('category');         // Kategori (website, mobile, design)
        $table->string('image');            // Foto Project
        $table->text('description');        // Deskripsi
        $table->json('tech_stack')->nullable(); // Array Tech (['Laravel', 'MySQL'])

        // Links (Boleh null jika tidak ada)
        $table->string('link_demo')->nullable();
        $table->string('link_github')->nullable();
        $table->string('link_figma')->nullable();

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
