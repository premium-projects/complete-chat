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
        // Creates the 'group_invitations' table for managing invitations to groups
        Schema::create('im_group_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('im_group_details')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('invited_by')->constrained('users')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('invitee')->constrained('users')->onDelete("cascade")->onUpdate("cascade");
            $table->timestamp('sent_at')->useCurrent();
            $table->enum('status', ['pending', 'accepted', 'rejected']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('im_group_invitations');
    }
};
