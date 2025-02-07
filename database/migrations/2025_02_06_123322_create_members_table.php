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
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('primary_mobile_number');
            $table->string('alternate_mobile_number');
            $table->string('email');
            $table->string('postcode');
            $table->string('address');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('county_id')->constrained('counties');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('constituency_id')->constrained('constituencies');
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
