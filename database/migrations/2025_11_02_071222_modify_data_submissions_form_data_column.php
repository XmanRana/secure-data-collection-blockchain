<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_submissions', function (Blueprint $table) {
            // Change form_data from json to longText to handle encrypted data
            $table->longText('form_data')->change();
        });
    }

    public function down(): void
    {
        Schema::table('data_submissions', function (Blueprint $table) {
            $table->json('form_data')->change();
        });
    }
};
