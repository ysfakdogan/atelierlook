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
        Schema::create('leads', function (Blueprint $table) {

            $table->id();

            // 🔥 TEMEL BİLGİLER
            $table->string('brand_name')->nullable(); // marka adı
            $table->string('platform'); // instagram / website
            $table->string('profile_url'); // profil veya site linki

            // 📊 VERİLER
            $table->integer('followers')->nullable(); // instagram için
            $table->boolean('has_shop')->default(false); // web sitesi satış yapıyor mu

            // 💰 SATIŞ SÜRECİ
            $table->string('status')->default('new');
            // new, contacted, replied, offered, closed

            // 📝 NOTLAR
            $table->text('notes')->nullable();

            // ⏰ TAKİP
            $table->timestamp('last_contacted_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
