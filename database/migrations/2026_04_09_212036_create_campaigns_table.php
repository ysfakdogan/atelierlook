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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();

            // 🔥 Kampanya bilgileri
            $table->string('title')->nullable(); // kampanya adı
            $table->string('platform')->nullable(); // instagram, google vs
            $table->string('source')->nullable(); // trafik kaynağı

            // 📊 Performans verileri
            $table->integer('clicks')->default(0);
            $table->integer('leads')->default(0);

            // 💰 Bütçe
            $table->decimal('budget', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
