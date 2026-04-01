<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 🔒 Eğer yoksa ekle
        if (!Schema::hasColumn('stylists', 'image')) {
            Schema::table('stylists', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
        }
    }

    public function down(): void
    {
        // 🔒 Eğer varsa sil
        if (Schema::hasColumn('stylists', 'image')) {
            Schema::table('stylists', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
};
