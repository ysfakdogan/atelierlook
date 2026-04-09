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
        Schema::table('campaigns', function (Blueprint $table) {

            // Eğer kolonlar yoksa ekler
            if (!Schema::hasColumn('campaigns', 'title')) {
                $table->string('title')->nullable();
            }

            if (!Schema::hasColumn('campaigns', 'description')) {
                $table->text('description')->nullable();
            }

            if (!Schema::hasColumn('campaigns', 'image')) {
                $table->string('image')->nullable();
            }

            if (!Schema::hasColumn('campaigns', 'link')) {
                $table->string('link')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {

            if (Schema::hasColumn('campaigns', 'title')) {
                $table->dropColumn('title');
            }

            if (Schema::hasColumn('campaigns', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('campaigns', 'image')) {
                $table->dropColumn('image');
            }

            if (Schema::hasColumn('campaigns', 'link')) {
                $table->dropColumn('link');
            }

        });
    }
};
