<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {

            $table->string('brand_name')->nullable();
            $table->string('platform')->nullable();
            $table->string('profile_url')->nullable();
            $table->integer('followers')->nullable();

            $table->enum('temperature', ['hot', 'medium', 'cold'])->default('cold');
            $table->enum('status', ['new', 'contacted', 'converted'])->default('new');

        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {

            $table->dropColumn([
                'brand_name',
                'platform',
                'profile_url',
                'followers',
                'temperature',
                'status'
            ]);

        });
    }
};
