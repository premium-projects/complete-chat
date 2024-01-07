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
        // Creates the 'scheduled_messages' table for scheduling messages to be sent later
        Schema::create('im_scheduled_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->constrained("im_messages")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamp('scheduled_for');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('im_scheduled_messages');
    }
};
