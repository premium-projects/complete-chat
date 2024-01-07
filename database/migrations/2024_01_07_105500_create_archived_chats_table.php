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
        // Creates the 'archived_chats' table for managing archived chat sessions
        Schema::create('archived_chats', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('chat_id')->constrained();
            $table->timestamp('archived_at')->useCurrent();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_chats');
    }
};
