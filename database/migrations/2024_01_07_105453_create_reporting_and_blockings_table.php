<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Creates the 'reporting_and_blocking' table for handling reports and blocks between users
        Schema::create('reporting_and_blocking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_id')->constrained('users');
            $table->foreignId('reported_user_id')->constrained('users');
            $table->text('reason');
            $table->timestamp('reported_at')->useCurrent();
            $table->text('action_taken')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporting_and_blockings');
    }
};
