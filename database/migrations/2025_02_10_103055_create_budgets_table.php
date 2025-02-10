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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->constrained('offices');
            $table->foreignId('financial_year_id')->constrained('financial_years');
            $table->decimal('amount', 10, 2);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('type', ['Create', 'Update', 'Delete']);
            $table->enum('status', ['Pending', 'Approved', 'Rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
