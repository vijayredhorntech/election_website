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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('referrer_id')->nullable()->constrained('users');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->date('enrollment_date');
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('primary_mobile_number')->nullable();
            $table->string('alternate_mobile_number')->nullable();
            $table->string('email');
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->foreignId('county_id')->nullable()->constrained('counties');
            $table->string('city')->nullable();
            $table->foreignId('constituency_id')->nullable()->constrained('constituencies');
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('qualification')->nullable();
            $table->string('profession')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('profile_status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
