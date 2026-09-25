<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->string('category')->default('Core Technologies')->after('name');
            $table->string('subtitle')->nullable()->after('category');
            $table->unsignedTinyInteger('percentage')->default(0)->after('subtitle');
            $table->text('description')->nullable()->after('percentage');
            $table->string('icon_glyph')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn(['category', 'subtitle', 'percentage', 'description', 'icon_glyph']);
        });
    }
};