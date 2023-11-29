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
        Schema::create('user_emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained()->cascadeOnDelete();
            $table->string('email_id');
            $table->string('subject')->nullable();
            $table->string('bodyPreview')->nullable();
            $table->string('parentFolderId')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->boolean('isDraft')->nullable();
            $table->boolean('isRead')->nullable();
            $table->string('createdDateTime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_emails');
    }
};
