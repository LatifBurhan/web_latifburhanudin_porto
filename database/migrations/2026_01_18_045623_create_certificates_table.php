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
    Schema::create('certificates', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('file'); // Path gambar/pdf
        $table->string('file_type'); // 'image' atau 'pdf'
        $table->string('issued_year'); // Contoh: "2024"
        $table->string('tags')->nullable(); // Contoh: "Seminar, Web, UI/UX"
        $table->boolean('is_pinned')->default(false); // Fitur Pin
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
