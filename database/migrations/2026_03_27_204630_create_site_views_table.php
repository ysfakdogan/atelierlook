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
        // 🔒 Eğer tablo yoksa oluştur
        if (!Schema::hasTable('site_views')) {

            Schema::create('site_views', function (Blueprint $table) {
                $table->id();

                // 🔥 ZİYARET SAYISI
                $table->bigInteger('views')->default(0);

                $table->timestamps();
            });

        } else {
            // 🔒 Tablo varsa ama kolon yoksa ekle
            Schema::table('site_views', function (Blueprint $table) {

                if (!Schema::hasColumn('site_views', 'views')) {
                    $table->bigInteger('views')->default(0);
                }

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_views');
    }
};
