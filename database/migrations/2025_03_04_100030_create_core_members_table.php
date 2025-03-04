<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('core_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('annual_income');
            $table->boolean('any_business')->default(false);
            $table->boolean('any_criminal_record')->default(false);
            $table->boolean('participated_in_social_movement')->default(false);
            $table->boolean('comfortable_with_public_speaking')->default(false);
            $table->boolean('willing_to_relocate')->default(false);
            $table->string('how_much_time_for_party')->nullable();
            $table->longText('political_ideology')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('core_members');
    }
};
