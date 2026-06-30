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
         Schema::table('experiences', function (Blueprint $table) {
            $table->string('start_date')->nullable()->after('year'); // format: "2023-01"
            $table->string('end_date')->nullable()->after('start_date');   // format: "2024-06" atau null = Present
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn(['start_date', 'end_date']);
        });
    }
};
