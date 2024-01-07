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
        // Creates the 'messages' table for storing messages in chats
        Schema::create('im_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->constrained("im_chats")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('sender_id')->constrained('users')->onDelete("cascade")->onUpdate("cascade");
            $table->text('content');
            $table->timestamp('sent_at')->useCurrent();
            $table->timestamp('edited_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('im_messages');
    }
};
