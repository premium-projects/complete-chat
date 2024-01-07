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
        Schema::create('im_archived_chats', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('chat_id')->constrained("im_chats")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamp('archived_at')->useCurrent();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('im_archived_chats');
    }
};
