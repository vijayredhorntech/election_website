<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();

            // Office Information
            $table->string('name');
            $table->string('description');

            // Address Information
            $table->string('postcode');
            $table->string('house_name_number');
            $table->string('street');
            $table->string('town_city');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('county_id')->constrained('counties');
            $table->foreignId('constituency_id')->constrained('constituencies');
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offices');
    }
};
