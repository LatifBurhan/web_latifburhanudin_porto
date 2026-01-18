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
    Schema::create('experiences', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // 'tech' atau 'professional'
        $table->string('role'); // Contoh: Junior Web Dev
        $table->string('company'); // Contoh: PT Phicos
        $table->string('period'); // Contoh: Jun 2024 - Present
        $table->text('description');
        $table->json('tech_stack')->nullable(); // Opsional (Laravel, MySQL)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
