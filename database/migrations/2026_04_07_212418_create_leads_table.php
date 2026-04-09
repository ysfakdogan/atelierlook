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
            $table->string('brand_name')->nullable();
            $table->string('platform')->nullable(); // instagram, web vs
            $table->string('profile_url')->nullable();

            // 📊 METRİKLER
            $table->integer('followers')->nullable();

            // 🔥 SICAKLIK (AVCI SİSTEM)
            $table->enum('temperature', ['hot', 'medium', 'cold'])->default('cold');

            // 📌 DURUM TAKİBİ
            $table->enum('status', ['new', 'contacted', 'converted'])->default('new');

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
