<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {

            if (!Schema::hasColumn('leads', 'temperature')) {
                $table->string('temperature')->default('cold');
            }

            if (!Schema::hasColumn('leads', 'status')) {
                $table->string('status')->default('new');
            }

        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {

            $table->dropColumn(['temperature', 'status']);

        });
    }
};
