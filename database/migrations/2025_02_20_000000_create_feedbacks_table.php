<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->enum('status', ['pending', 'resolved', 'rejected'])->default('pending');
            $table->enum('priority', ['low', 'normal', 'high'])->default('normal');
            $table->enum('feedback_type', ['suggestion', 'complaint', 'query', 'appreciation']);
            $table->foreignId('constituency_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('member_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};