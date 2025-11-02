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
    Schema::create('blockchain_transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('data_submission_id')->constrained()->onDelete('cascade');
        $table->string('block_hash');
        $table->string('transaction_hash')->unique();
        $table->timestamp('block_timestamp');
        $table->json('blockchain_data');
        $table->boolean('verified')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blockchain_transactions');
    }
};
