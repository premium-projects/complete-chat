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
        // Creates the 'media' table for storing media files associated with messages
        Schema::create('im_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->constrained("im_messages")->onDelete("cascade")->onUpdate("cascade");
            $table->enum('media_type', ['image', 'video', 'audio']);
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('im_media');
    }
};
