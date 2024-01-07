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
        // Creates the 'read_receipts' table for storing read receipts of messages
        Schema::create('read_receipts', function (Blueprint $table) {
            $table->foreignId('message_id')->constrained();
            $table->foreignId('reader_id')->constrained('users');
            $table->timestamp('read_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('read_receipts');
    }
};
