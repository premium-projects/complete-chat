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
        Schema::create('im_read_receipts', function (Blueprint $table) {
            $table->foreignId('message_id')->constrained("im_messages")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('reader_id')->constrained('users')->onDelete("cascade")->onUpdate("cascade");
            $table->timestamp('read_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('im_read_receipts');
    }
};
