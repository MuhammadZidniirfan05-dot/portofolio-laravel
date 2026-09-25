<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // 🔧 BARU: kolom tambahan untuk layout baru
            $table->string('category')->default('Core Technologies');
            $table->string('subtitle')->nullable();
            $table->unsignedTinyInteger('percentage')->default(0);
            $table->text('description')->nullable();
            $table->string('icon_glyph')->nullable();

            // Kolom lama tetap dipertahankan
            $table->unsignedTinyInteger('level')->default(80);
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};