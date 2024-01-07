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
        // Creates the 'group_admins' table for tracking administrators of a group
        Schema::create('group_admins', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained('group_details');
            $table->foreignId('admin_id')->constrained('users');
            $table->timestamp('assigned_at')->useCurrent();
            $table->primary(['group_id', 'admin_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_admins');
    }
};
