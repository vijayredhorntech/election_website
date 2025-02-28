<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Insert default settings
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('group');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });

        DB::table('settings')->insert([
            [
                'group' => 'registration',
                'key' => 'allow_email_registration',
                'value' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group' => 'registration',
                'key' => 'allow_mobile_registration',
                'value' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::table('settings')
            ->where('group', 'registration')
            ->whereIn('key', ['allow_email_registration', 'allow_mobile_registration'])
            ->delete();
    }
};
