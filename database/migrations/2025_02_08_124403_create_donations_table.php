<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        // 'name',
        // 'email',
        // 'amount',
        // 'payment_id',
        // 'status',
        // 'user_id',
        // 'payment_method',
        // 'message',
        // 'is_anonymous'
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('amount');
            $table->string('payment_id');
            $table->string('status');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('payment_method');
            $table->text('message')->nullable();
            $table->boolean('is_anonymous');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
