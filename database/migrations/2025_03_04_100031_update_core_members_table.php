<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::dropIfExists('core_members');

        Schema::create('core_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('profession')->nullable();
            $table->string('employer')->nullable();
            $table->text('relevant_experience')->nullable();
            $table->json('skills_expertise')->nullable();
            $table->text('why_join')->nullable();
            $table->string('nationality')->nullable();
            $table->string('primary_mobile_number')->nullable();
            $table->boolean('experience_in_political_campaigns')->nullable();
            $table->text('experience_in_political_campaigns_details')->nullable();
            $table->json('key_areas')->nullable();
            $table->boolean('willing_to_travel')->nullable();
            $table->boolean('member_of_other_political_party')->nullable();
            $table->text('reference_1')->nullable();
            $table->text('reference_2')->nullable();
            $table->date('date_of_application')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->string('position_assigned')->nullable();
            $table->date('date_of_review')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('core_members');
    }
};
