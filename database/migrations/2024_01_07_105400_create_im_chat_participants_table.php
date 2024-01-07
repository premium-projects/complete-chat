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
        // Creates the 'chat_participants' table for tracking users in a chat
        Schema::create('im_chat_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->constrained("im_chats")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('user_id')->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->dateTime('joined_at');
            $table->dateTime('left_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('im_chat_participants');
    }
};
