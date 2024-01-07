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
        // Creates the 'message_reactions' table for storing reactions to messages
        Schema::create('im_message_reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->constrained("im_messages")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('user_id')->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->string('reaction_type');
            $table->timestamp('reacted_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('im_message_reactions');
    }
};
