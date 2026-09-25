<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            if (!Schema::hasColumn('skills', 'category')) {
                $table->string('category')->default('Core Technologies')->after('name');
            }
            if (!Schema::hasColumn('skills', 'subtitle')) {
                $table->string('subtitle')->nullable()->after('category');
            }
            if (!Schema::hasColumn('skills', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->default(0)->after('subtitle');
            }
            if (!Schema::hasColumn('skills', 'description')) {
                $table->text('description')->nullable()->after('percentage');
            }
            if (!Schema::hasColumn('skills', 'icon_glyph')) {
                $table->string('icon_glyph')->nullable()->after('description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn(['category', 'subtitle', 'percentage', 'description', 'icon_glyph']);
        });
    }
};