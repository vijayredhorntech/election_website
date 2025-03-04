<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('core_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('annual_income');
            $table->boolean('any_business')->default(false);
            $table->boolean('any_criminal_record')->default(false);
            $table->boolean('participated_in_social_movement')->default(false);
            $table->boolean('comfortable_with_public_speaking')->default(false);
            $table->boolean('willing_to_relocate')->default(false);
            $table->string('how_much_time_for_party')->nullable();
            $table->longText('political_ideology')->nullable();
            $table->json('political_issue_care')->nullable();
            $table->boolean('leadership_experience')->default(false);
            $table->boolean('experience_in_media_interaction')->default(false);
            $table->string('communication_skill')->nullable();
            $table->json('area_of_interest')->nullable();
            $table->longText('who_inspired')->nullable();
            $table->longText('expectations_from_party')->nullable();
            $table->longText('contribution_to_party')->nullable();
            $table->boolean('have_social_media_presence')->default(false);
            $table->boolean('have_network_of_volunteers')->default(false);
            $table->boolean('willing_to_fundraise')->default(false);
            $table->string('photo')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('other_document')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('core_members');
    }
};
