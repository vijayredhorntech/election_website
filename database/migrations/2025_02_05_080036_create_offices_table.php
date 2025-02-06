<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('city');
            $table->string('code');
            $table->string('constituency');
            $table->string('country');
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offices');
    }
};
