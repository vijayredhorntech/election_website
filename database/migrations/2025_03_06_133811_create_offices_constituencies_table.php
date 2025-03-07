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
        Schema::create('offices_constituencies', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('office_id')->constrained('offices')->onDelete('cascade');
            $table->foreignId('constituency_id')->constrained('constituencies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices_constituencies');
    }
};
