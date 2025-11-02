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
    Schema::create('data_submissions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->json('form_data'); // Encrypted data
        $table->string('blockchain_hash')->nullable();
        $table->string('transaction_id')->nullable();
        $table->enum('validation_status', ['pending', 'validated', 'rejected'])->default('pending');
        $table->decimal('ai_confidence_score', 5, 2)->nullable();
        $table->text('validation_notes')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_submissions');
    }
};
